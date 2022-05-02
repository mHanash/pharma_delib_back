<?php

namespace App\Http\Controllers;

use App\Models\LoginAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit_credentials (Request $request) {
        $link = $request->link;
        $email = $request->email;
        $pass = Hash::make($request->password);

        $userLoginAcesses = LoginAccess::where('link', $link)->first();

        $userLoginAcesses->is_used = true;
        $userLoginAcesses->save();

        $user = $userLoginAcesses->user;
        $user->email = $email;
        $user->password = $pass;

        $name = "";

        if ($user->professor !== null) {
            $name = $user->professor->firstname . " " . $user->professor->lastname;
        } else if ($user->student !== null) {
            $name = $user->student->firstname . " " . $user->student->lastname;
        }
        
        if ($user->save()) {

            MailController::mail($name, $user->email);

            return [
                'saved' => true
            ];
        }
    }
}
