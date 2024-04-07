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
<h1>Create User Information</h1>

    <div class="centerForm">
        <form method="post" action="{{route('people.saveperson')}}">
            @csrf
            @method('post')
            <label for="name">First Name</label>
            <input type="text" id="name" name="name" value="" placeholder="First Name">
            <label for="surname">Last Name</label>
            <input type="text" id="surname" name="surname" value="" placeholder="Last Name">
            <label for="id_number">Id Number</label>
            <input type="text" id="id_number" name="id_number" value="" placeholder="Id Number">
            <label for="contact_number">Contact number</label>
            <input type="text" id="contact_number" name="contact_number" value="" placeholder="Contact Number">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="" placeholder="Email Address">
            <label for="dob">Date of Birth</label>
            <input type="datetime-local" id="dob" name="dob" value="" placeholder="Date of Birth">
            <label for="language">Language</label>
            <input type="text" id="language" name="language" value="" placeholder="Language">
            <label for="interests">Interests</label>
            <input type="text" id="interests" name="interests" value="" placeholder="Interests">
            <button type="submit" class="button">Submit</button>
        </form>
    </div>
</body>
</html>