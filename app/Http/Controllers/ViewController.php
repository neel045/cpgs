<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    function login()
    {
        return view('login');
    }
    function signup()
    {
        return view('signup');
    }
    function dashboard()
    {
        return view('dashboard');
    }
    function viewPaper($id)
    {
        $paper = DB::table('papers')->where('paper_id', $id)->get();
        if ($paper[0]->teacher_id != session('user')[0]->id) {
            return response()->json(['status' => 'error', "message" => "You cant access this paper"], 400);
        }
        $path = storage_path("app/papers/" . $paper[0]->paper);
        return response()->file($path);
    }

    function getAllTeachers()
    {
        $teachers = DB::table('teachers')->where('org_id', session('user')[0]->id)->get();
        return view('allteachers', ['teachers' => $teachers]);
    }
    function getAllPapers()
    {
        $papers = DB::table('papers')->where('teacher_id', session('user')[0]->id)->get();
        return view('viewpapers', ['papers' => $papers]);
    }
    function profile()
    {
        return view('profile');
    }
}
