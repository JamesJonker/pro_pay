@extends('layout')
@section('content')
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="<?php echo asset('css/common.css')?>" type="text/css"> 
        <title>index</title>
    </head>

</html>
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Manage People <a style="float: right;" href="{{ route('people.create') }}">Add</a></div>
                     <div class="card-body">
                      <table class="table table-bordered gridview">
                          <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Id Nummber</th>
                            <th>Contact Number</th>
                            <th>Email Address</th>
                            <th>Date of Birth</th>
                            <th>Language</th>
                            <th>Interests</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($people as $person)
                        <tr>
                            <td>{{$person->id}}</td>
                            <td>{{$person->name}}</td>
                            <td>{{$person->surname}}</td>
                            <td>{{$person->id_number}}</td>
                            <td>{{$person->contact_number}}</td>
                            <td>{{$person->email}}</td>
                            <td>{{$person->dob}}</td>
                            <td>{{$person->language}}</td>
                            <td>{{$person->interests}}</td>
                            <td>
                                <a href="{{route('people.edit',['person' => $person])}}">Edit</a>
                            </td>
                            <td>
                                <form method="post" action="{{route('people.delete', ['person' => $person])}}">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete"/>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>

@endsection