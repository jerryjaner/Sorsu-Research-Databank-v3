<?php

namespace App\Concerns;

use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

trait SendMailNotifier
{
    public function SendMailNotifier($data, $plainPassword)
    {
        $subject = 'Account Credentials';
        $body = "Your account has been created successfully. Your login credentials are as follows:\n\n";
        $body .= "Email: {$data->email}\n";
        $body .= "Password: $plainPassword\n";

        // Send the email with the credentials for the new student
        $mailData = [
            'title' => '',
            'subject' => $subject,
            'body' => $body,
        ];

        Mail::to($data->email)->send(new SendEmail($mailData));
    }
}
