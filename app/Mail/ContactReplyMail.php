<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    public $reply;

    public function __construct(Contact $contact, $reply)
    {
        $this->contact = $contact;
        $this->reply = $reply;
    }

    public function build()
    {
        return $this->subject('Phản hồi từ Store: ' . ($this->contact->subject ?? 'Không có chủ đề'))
                    ->markdown('emails.contact.reply');
    }
}