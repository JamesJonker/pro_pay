@extends('layout')
@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create person</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="<?php echo asset('css/common.css')?>" type="text/css"> 
</head>

</html>
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Add New person</div>
                     <div class="card-body">
                        <form method="post" action="{{route('people.saveperson')}}">
                            @csrf
                            @method('post')
                            <div>
                                <label for="name">First Name</label>
                                <input type="text" id="name" name="name" value="" placeholder="First Name">
                                @error('name')
                                    <span class="text-dange" role="alert">
                                        <strong style="color:red;">{{ $message }}</strong>
                                    </span><br>
                                @enderror
                            </div>
                            <div>
                                <label for="surname">Last Name</label>
                                <input type="text" id="surname" name="surname" value="" placeholder="Last Name">
                                @error('surname')
                                    <span class="text-dange" role="alert">
                                        <strong style="color:red;">{{ $message }}</strong>
                                    </span><br>
                                @enderror
                            </div>
                            <div>
                            <label for="id_number">Id Number</label>
                            <input type="text" id="id_number" name="id_number" value="" placeholder="Id Number">
                            @error('id_number')
                                    <span class="text-dange" role="alert">
                                        <strong style="color:red;">{{ $message }}</strong>
                                    </span><br>
                                @enderror
                            </div>
                            <div>
                                <label for="contact_number">Contact number</label>
                                <input type="text" id="contact_number" name="contact_number" value="" placeholder="Contact Number">
                                @error('contact_number')
                                        <span class="text-dange" role="alert">
                                            <strong style="color:red;">{{ $message }}</strong>
                                        </span><br>
                                @enderror
                            </div>
                            <div>
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" value="" placeholder="Email Address">
                                @error('email')
                                        <span class="text-dange" role="alert">
                                            <strong style="color:red;">{{ $message }}</strong>
                                        </span><br>
                                @enderror
                            </div>
                            <div>
                                <label for="dob">Date of Birth</label>
                                <input type="datetime-local" id="dob" name="dob" value="" placeholder="Date of Birth">
                                @error('dob')
                                        <span class="text-dange" role="alert">
                                            <strong style="color:red;">{{ $message }}</strong>
                                        </span><br>
                                @enderror
                            </div>
                            <div>
                                <label for="language">Language</label>  
                                <select id="language" name="language">
                                    <option value="english">English</option>
                                        <option value="afrikaans">Afrikaans</option>
                                        <option value="xhosa">Xhosa</option>
                                        <option value="venda">Venda</option>
                                        <option value="zulu">Zulu</option>
                                        <option value="other">Other</option>
                                </select>
                                @error('language')
                                        <span class="text-dange" role="alert">
                                            <strong style="color:red;">{{ $message }}</strong>
                                        </span><br>
                                @enderror
                            </div>
                            <div>
 
                            <label for="interests">Select Interests</label><br>
                                <select class="selectpicker" id="interests" multiple data-live-search="true" name="interests[]">
                                    <option value="hunting">Hunting</option>
                                    <option value="fishing">Fishing</option>
                                    <option value="tracking">Tracking</option>
                                    <option value="cooking">Cooking</option>
                                    <option value="cars">Cars</option>
                                    <option value="other">Other</option>
                                </select>
                                @error('interests')
                                        <span class="text-dange" role="alert">
                                            <strong style="color:red;">{{ $message }}</strong>
                                        </span><br>
                                @enderror
                            </div>
                            

                            <!--<input type="text" id="interests" name="interests" value="" placeholder="Interests">-->
                            <button type="submit" class="button">Submit</button>
                        </form>
                     </div>
              </div>
          </div>
      </div>
  </div>
</main>
<script type="text/javascript">
    $(document).ready(function() {
        $('#interests').selectpicker();
    });
</script>
@endsection