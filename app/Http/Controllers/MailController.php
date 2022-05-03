<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    protected static $to_email;

    public static function mail($name, $email, $password) {    
        $data = ['name' => $name, 'password' => $password, 'email' => $email];
        self::$to_email = $email;

        Mail::send('mail', $data, function ($message) {
            $message->to(self::$to_email)->subject("Lien de connexion");
            $message->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));
        });
    }
}
