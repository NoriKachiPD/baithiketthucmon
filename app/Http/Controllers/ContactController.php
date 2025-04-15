<?php

namespace App\Http\Controllers;

use App\Mail\ContactConfirmationMail;
use App\Mail\ContactReplyMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    // Gửi liên hệ từ form người dùng
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::create($validated);

        // Gửi email xác nhận
        Mail::to($contact->email)->send(new ContactConfirmationMail($contact));

        return back()->with('success', 'Gửi liên hệ thành công! Vui lòng kiểm tra email của bạn.');
    }

    // Hiển thị danh sách liên hệ
    public function index()
    {
        $contacts = Contact::oldest()->get();
        /** @var \App\Models\User $user */
        $user = Auth::user();
        return view('admin.contact.contact-list', compact('contacts'));
    }

    // Hiển thị form phản hồi
    public function replyForm($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact.contact-reply', compact('contact'));
    }

    // Gửi phản hồi
    // public function sendReply(Request $request, $id)
    // {
    //     /** @var \App\Models\Contact $contact */
    //     $contact = Contact::findOrFail($id);
    
    //     $request->validate([
    //         'reply' => 'required|string',
    //     ]);
    
    //     Mail::to($contact->email)->send(new ContactReplyMail($contact, $request->reply));
    
    //     return redirect()->route('admin.contact.list')->with('success', 'Đã gửi phản hồi cho người dùng.');
    // }

    public function sendReply(Request $request, $id)
    {
        /** @var \App\Models\Contact $contact */
        $contact = Contact::findOrFail($id);

        $request->validate([
            'reply' => 'required|string',
        ]);

        // Gửi phản hồi qua email
        Mail::to($contact->email)->send(new ContactReplyMail($contact, $request->input('reply')));

        // Xoá liên hệ sau khi gửi mail
        $contact->delete();

        return redirect()->route('admin.contact.list')->with('success', 'Đã gửi phản hồi và xoá liên hệ.');
    }

    // Xoá liên hệ
    public function destroy($id)
    {
        Contact::destroy($id);
        return back()->with('success', 'Đã xoá liên hệ.');
    }
}