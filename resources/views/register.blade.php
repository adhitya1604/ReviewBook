@extends('layouts.master')
@section('title')
Register
@endsection
@section('content')
    <h1>Buat Account Baru</h1>

    <h3>Sign Up Form</h3>
    
    <form action="/welcome" method="POST">
    @csrf
        <label >First Name:</label><br>
        <input type="text"  name="first_name"><br><br>

        <label >Last Name:</label><br>
        <input type="text"  name="last_name"><br><br>

        <label>Gender:</label><br>
        <input type="radio" name="gender" value="Male">
        <label>Man</label><br>

        <input type="radio"  name="gender" value="Female">
        <label >Woman</label><br>

        <input type="radio" name="gender" value="Other">
        <label>Other</label><br><br>

        <label for="nationality">Nationality:</label><br>
        <select id="nationality" name="nationality">
            <option value="indonesia">Indonesia</option>
            <option value="singapore">Singapore</option>
            <option value="malaysia">Malaysia</option>
            <option value="australia">Australia</option>
        </select><br><br>

        <label>Language Spoken:</label><br>
        <input type="checkbox" id="bahasa" name="language[]" value="Bahasa Indonesia">
        <label for="bahasa">Bahasa Indonesia</label><br>

        <input type="checkbox" id="english" name="language[]" value="English">
        <label for="english">English</label><br>

        <input type="checkbox" id="arabic" name="language[]" value="Arabic">
        <label for="arabic">Arabic</label><br>

        <input type="checkbox" id="japanese" name="language[]" value="Japanese">
        <label for="japanese">Japanese</label><br><br>

        <label for="bio">Bio:</label><br>
        <textarea id="bio" name="bio" rows="5" cols="30"></textarea><br><br>

        <input type="submit" value="Sign Up">
    </form>
@endsection