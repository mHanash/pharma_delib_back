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
        
        if ($user->save()) {
            return [
                'saved' => true
            ];
        }
    }
}
