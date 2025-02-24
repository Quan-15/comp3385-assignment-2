<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function create()
{
    return view('feedback-form');
}
public function send(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'comment' => 'required|string',
    ]);

    Mail::to('comp3385@uwi.edu', 'COMP3385 Course Admin')
        ->send(new Feedback($request->input('name'), $request->input('email'), $request->input('comment')));

    return redirect('/feedback/success')->with('message', 'Feedback sent successfully!');
}

}

