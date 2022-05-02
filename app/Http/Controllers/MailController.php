<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function mail($name, $email) {    
        $data = ['name' => $name];

        Mail::send('mail', $data, function ($message) {
            $message->to($message->email)->subject("Lien de connexion");
            $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));
        });
    }
}
