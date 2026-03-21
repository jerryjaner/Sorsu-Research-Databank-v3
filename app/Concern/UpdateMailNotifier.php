<?php
namespace App\Concerns;

use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

trait UpdateMailNotifier
{
    public function UpdateMailNotifier($dataRequest, $plainPassword, $emailChanged, $passwordChanged)
    {
        // Assuming the updated email is in $dataRequest['email']
        $subject = 'Account Credentials Update';
        $body = "Your account has been updated successfully. The following changes were made:\n\n";

        // If email has changed, use the updated email from $dataRequest['email']
        $updatedEmail = $dataRequest['email'];
        if ($emailChanged) {
            $body .= "Email: {$updatedEmail}\n";
        }

        // If password has changed, include the new password
        if ($passwordChanged) {
            $body .= "Password: $plainPassword\n";
        }

        // Send the email only if there's a change
        if ($emailChanged || $passwordChanged) {
            $mailData = [
                'title' => '',
                'subject' => $subject,
                'body' => $body,
            ];

            // Send the email to the updated email
            Mail::to($updatedEmail)->send(new SendEmail($mailData));
        }
    }
}
