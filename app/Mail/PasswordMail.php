<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $newPassword;
    public $email;

    public function __construct($email, $newPassword)
    {
        $this->email = $email;
        $this->newPassword = $newPassword;
    }

    public function build()
    {
        return $this->subject('Gửi lại mật khẩu - Store')
                    ->markdown('emails.password');
    }
}