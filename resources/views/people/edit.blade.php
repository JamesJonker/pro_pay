<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create person</title>

    <link rel="stylesheet" href="<?php echo asset('css/common.css')?>" type="text/css"> 
</head>
<body>
<h1>Edit User Information</h1>

    <div class="centerForm">
        <form method="post" action="{{route('people.update', ['person' =>$person])}}">
            @csrf
            @method('PUT')
            <label for="name">First Name</label>
            <input type="text" id="name" name="name" value="{{$person->name}}" placeholder="First Name">
            <label for="surname">Last Name</label>
            <input type="text" id="surname" name="surname" value="{{$person->surname}}">
            <label for="id_number">Id Number</label>
            <input type="text" id="id_number" name="id_number" value="{{$person->id_number}}">
            <label for="contact_number">Contact number</label>
            <input type="text" id="contact_number" name="contact_number" value="{{$person->contact_number}}">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="{{$person->email}}">
            <label for="dob">Date of Birth</label>
            <input type="datetime-local" id="dob" name="dob" value="{{$person->dob}}">
            <label for="language">Language</label>
            <input type="text" id="language" name="language" value="{{$person->language}}">
            <label for="interests">Interests</label>
            <input type="text" id="interests" name="interests" value="{{$person->interests}}">
            <button type="submit" class="button">Update</button>
        </form>
    </div>
</body>
</html>