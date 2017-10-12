<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome', compact('posts'));
    }

    public function getContact() {
        return view('pages.contact');
    }

    public function postContact(Request $request) {
        $this->validate($request, array(
            'email' => 'required|email',
            'message' => 'min:5',
            'subject' => 'min:3'
        ));

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::send('emails.contact', $data, function ($message) use ($data){
            $message->from($data['email']);
            $message->to('vitalifilipchuk@mail.com');
            $message->subject($data['subject']);
        });

        session()->flash('success', 'Your Email was sent!');

        return redirect('/');
    }

    public function getAbout() {
        $first = 'Vitali';
        $last = 'Filipchuk';

        $fullname = $first . " " . $last;
        $email = 'vitalifilipchuk@mail.com';
        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $fullname;
        return view('pages.about', compact('data'));
    }

}
