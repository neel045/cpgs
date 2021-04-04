<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Storage;
use PDF;

class AdminController extends Controller
{
    //
    function addTeacher(Request $request)
    {
        $user = DB::table('teachers')->where('email', $request->email)->get();
        // echo $user;
        if (count($user) > 0) {
            return response()->json(['status' => 'error', 'message' => 'user already exists'], 400);
        }

        $rules = array(
            'name' => 'required',
            'email' => "required",
            "password" => "required | min:8"
        );

        $validator = validator($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()], 400);
        }

        DB::table('teachers')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'org_id' => session('user')[0]->id,
            // 'org_id' => $request->org_id,
            'phone' => $request->phone,
            'role' => 'teacher'
        ]);

        return response()->json(['status' => 'sucess', 'message' => 'Teacher Has Been Added'], 200);
    }

    function getAllTeachers()
    {
        $teachers = DB::table('teachers')->get();
        return response()->json($teachers, 200);
    }

    function getTeacher($id)
    {
        $teacher = DB::table('teachers')
            ->where('id', $id)
            ->get();

        return $teacher;
    }

    function deleteTeacher($id)
    {
        DB::table('teachers')->delete($id);
        return null;
    }
}
