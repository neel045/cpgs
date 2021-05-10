<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class TeachersController extends Controller
{
    function addQuestion(Request $request)
    {

        $question = DB::table('questions')->select(['question'])->where('question', $request->question)->get();
        if (count($question) > 0) {
            return response()->json('You can not enter same question again', 400);
        }

        DB::table('questions')->insert([
            'question' => $request->question,
            'subject_code' => $request->subject_code,
            'module' => $request->module,
            'marks' => $request->marks,
            'difficulty' => $request->difficulty
        ]);

        return response()->json('Questions has been added', 200);
    }

    function getAllQuestions()
    {
        $questions = DB::table('questions')->get();
        // return response()->json($questions, 200);
        return view('questions', ['questions' => $questions]);
    }


    function generatePaper(Request $request)
    {
        $subject_code = $request->subject_code;
        $difficulty = $request->difficulty;

        switch ($difficulty) {
            case '1':
                $difficulty = [1, 1, 2];
                break;
            case '2':
                $difficulty = [1, 2, 2];
                break;
            case '3':
                $difficulty = [2, 2, 3];
                break;
        }

        switch ($subject_code) {
            case '3140709':
                $subject = "Computer Networks";
                $quePerModule3 = [2, 1, 3, 2, 0];
                $quePerModule4 = [1, 1, 2, 2, 2];
                $quePerModule7 = [1, 2, 2, 2, 2];
                break;

            case '3150703':
                $subject = "Analysis and desigin Of Algorithm";
                $quePerModule3 = [1, 2, 1, 0, 2, 1, 0, 0, 1];
                $quePerModule4 = [0, 1, 2, 1, 1, 0, 2, 0, 1];
                $quePerModule7 = [0, 2, 1, 2, 1, 1, 0, 1, 1];
                break;

            case '3130702':
                $subject = "Data Structures";
                $quePerModule3 = [0, 3, 2, 2, 1];
                $quePerModule4 = [1, 2, 2, 3, 0];
                $quePerModule7 = [1, 3, 3, 0, 2];
                break;

            case '3350704':
                $subject = "Cryptography and Network Security";
                $quePerModule3 = [1, 1, 2, 1, 3];
                $quePerModule4 = [1, 1, 3, 1, 2];
                $quePerModule7 = [2, 2, 3, 2, 0];
                break;
        }

        $questionsMark3 = [];
        $questionsMark4 = [];
        $questionsMark7 = [];


        $queno = 0;
        for ($i = 0; $i < count($quePerModule3); $i++) {
            $question = DB::table('questions')
                ->where('module', $i + 1)
                ->where('subject_code', $subject_code)
                ->where('marks', 3)
                ->where(function ($query) use ($difficulty) {
                    $query->where('difficulty', '<=', $difficulty[0])
                        ->orWhere('difficulty', '<=', 3);
                })
                ->inRandomOrder()
                ->limit($quePerModule3[$i])
                ->get();

            for ($j = 0; $j < count($question); $j++) {
                $questionsMark3[$queno] = $question[$j];
                $queno++;
            }
        }

        $queno = 0;
        for ($i = 0; $i < count($quePerModule4); $i++) {
            $question = DB::table('questions')
                ->where('module', $i + 1)
                ->where('subject_code', $subject_code)
                ->where('marks', 4)
                ->where(function ($query) use ($difficulty) {
                    $query->where('difficulty', '<=', $difficulty[1])
                        ->orWhere('difficulty', '<=', 3);
                })
                ->inRandomOrder()
                ->limit($quePerModule4[$i])
                ->get();

            for ($j = 0; $j < count($question); $j++) {
                $questionsMark4[$queno] = $question[$j];
                $queno++;
            }
        }

        $queno = 0;

        for ($i = 0; $i < count($quePerModule7); $i++) {
            $question = DB::table('questions')
                ->where('module', $i + 1)
                ->where('subject_code', $subject_code)
                ->where('marks', 7)
                ->where(function ($query) use ($difficulty) {
                    $query->where('difficulty', '<=', $difficulty[2])
                        ->orWhere('difficulty', '<=', 3);
                })->inRandomOrder()
                ->limit($quePerModule7[$i])
                ->get();

            for ($j = 0; $j < count($question); $j++) {
                $questionsMark7[$queno] = $question[$j];
                $queno++;
            }
        }

        $questions = [$questionsMark3, $questionsMark4, $questionsMark7, $subject];
        $paper_name = $subject_code . "_" . Str::random(10) . "_" . time() . ".pdf";

        $pdf = PDF::loadView('paper', compact('questions'));
        Storage::put("papers/" . $paper_name, $pdf->output());

        DB::table('papers')->insert([
            'teacher_id' => session('user')[0]->id,
            'org_id' => session('user')[0]->org_id,
            'paper' => $paper_name,
            'subject_code' => $subject_code

        ]);

        $details = [
            'title' => 'Question Papers has been Generated',
            'body' => "Your Paper Has been Generated"
        ];

        try {
            Mail::send('emails.sendmail', $details, function ($message) use ($pdf, $paper_name) {
                $message->to(session('user')[0]->email, session('user')[0]->name)
                    ->subject('Paper Has Been generated')
                    ->attachData($pdf->output(),  $paper_name);
            });
        } catch (\Throwable $th) {
            return response()->json(["status" => "error",  "message" => "Something Went Wrong\n$th->message"], 500);
        }
        return response()->json(["status" => "sucess",  "message" => "Check Your Email Paper Has Been Sent"], 200);
        // return $questions;
    }

    function getAllPapers()
    {
        $user = session('user')[0];
        $papers = DB::table('papers')->where('teacher_id', $user->id)->get();
        return response(['status' => 'Success', "data" => $papers], 200);
    }

    function deletePaper($id)
    {
        $paper = DB::table('papers')->where('paper_id', $id)->get();
        if (count($paper) == 0) {
            return response()->json(['status' => "error", "message" => "Paper not found"], 404);
        }
        $path = "papers/" . $paper[0]->paper;
        Storage::delete($path);
        DB::table('papers')->where('paper_id', $id)->delete();
        return response()->json(['status' => "sucess", "message" => "Paper has been deleted$path"], 200);
    }
}
