@extends('layouts.app')

@section('content')
<h2>Feedback Form</h2>
<form method="POST" action="/feedback/send">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" required>
    
    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Comment:</label>
    <textarea name="comment" required></textarea>

    <button type="submit">Send Feedback</button>
</form>
@endsection
