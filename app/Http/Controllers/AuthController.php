<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    function signup(Request $request)
    {
        $user = DB::table('organizations')->where('email', $request->email)->get();
        // echo $user;
        if (count($user) > 0) {
            return response()->json('user already exists', 400);
        }

        $rules = array(
            'name' => 'required',
            'email' => "required",
            "password" => "required | min:8"
        );

        $validator = validator($request->all(), $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }

        $token = Str::random(30);

        try {
            DB::table('organizations')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'phone' => $request->phone,
                'admin_name' => $request->admin_name,
                'status' => 'active',
                'role' => 'admin',
                'token' => $token,
                'is_verified' => 0
            ]);
        } catch (\Throwable $th) {
            return response()->json(["status" => "error",  "message" => "Something Went Wrong $th"], 500);
        }

        $details = [
            'title' => 'Your Account has been created',
            'body' => "click link below to verify your email account\n
            <a href='http://127.0.0.1:8000/api/users/verifyemail/token/$token'>Activate</a>"
        ];

        try {
            Mail::send('emails.sendmail', $details, function ($message) use ($request) {
                $message->to($request->email, $request->name)
                    ->subject('Verify Your email address');
            });
        } catch (\Throwable $th) {
            return response()->json(["status" => "error",  "message" => "Something Went Wrong"], 500);
        }

        return response()->json(['status' => 'sucess', 'message' =>  'Your Account Has Been Created and email has been sent'], 200);
    }


    function login(Request $request)
    {
        $rules = array(
            'email' => "required",
            'password' => 'required | min:8'
        );
        $validator = validator($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' =>  $validator->errors()], 400);
        }
        $user = DB::table('organizations')
            ->select(['*'])
            ->where('email', $request->email)
            ->get();

        if (!$user[0]->is_verified) {
            return response()->json(['status' => 'error', 'message' =>  'Please verify your email first to access services'], 400);
        }

        if (!$user[0] || !Hash::check($request->password, $user[0]->password)) {
            return response()->json(['status' => 'error', 'message' =>  'invalid password or email'], 400);
        }
        unset($user[0]->password);
        $request->session()->put('user', $user);
        return response()->json(['status' => 'sucess', 'message' => 'login Sucessful'], 200);
    }

    function updatePassword(Request $request, $id)
    {
        $user = DB::table('organizations')->where('id', $id)->get();

        if (!Hash::check($request->currentPassword, $user[0]->password)) {
            return response()->json('current password is wrong', 401);
        }

        DB::table('organizations')
            ->where('id', $id)
            ->update([
                'password' => Hash::make($request->newPassword)
            ]);
        return response()->json('password updated..', 200);
    }

    function loginTeacher(Request $request)
    {
        $rules = array(
            'email' => "required",
            'password' => 'required | min:8'
        );
        $validator = validator($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' =>  $validator->errors()], 400);
        }
        $user = DB::table('teachers')
            ->select(['*'])
            ->where('email', $request->email)
            ->get();

        if (!$user[0] || !Hash::check($request->password, $user[0]->password)) {
            return response('invalid password or email', 400);
        }
        unset($user[0]->password);
        $request->session()->put('user', $user);
        return response()->json(['status' => 'sucess', 'message' => 'login Sucessful'], 200);
    }

    function verifyEmail($token)
    {
        $user = DB::table('organizations')->where('token', $token)->get();
        if (count($user) == 0) {
            return response()->json(['status' => 'error', 'message' =>  "Invalid token"], 400);
        }
        DB::table('organizations')->where('id', $user[0]->id)->update(['is_verified' => 1]);
        return response()->json(['status' => 'sucess', 'message' =>  "Your email has been verified please enjoy the services"], 200);
    }

    function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
