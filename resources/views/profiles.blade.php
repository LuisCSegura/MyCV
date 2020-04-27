@extends('layouts.app')


<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/CRUD.css') }}">
</head>

<body>
    @section('content')

    <h1 class="mt-4">PROFILE</h1>
    <div id="separator"></div>
    <h5>Complete your personal information</h5>
    </div>
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 mr-1">
            <div class="col-md-12">

                @if (empty($profile))


                <form method="POST" action="{{route('profiles.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div id="photo-container">
                        <img id="usr-photo" src="{{ asset('images/userIcon.png') }}">
                    </div>

                    <div class="from-group mx-sm-4">
                        <label for="imagen">Select your picture:</label>
                        <input type="file" class="form-control" name="picture" id="imagen">
                    </div>
                    <div class="from-group mx-sm-4">

                        <label for="nombre">Complete Name:</label>
                        <input type="text" class="form-control" name="complete_name" id="nombre" value="" required>
                    </div>
                    <div class="from-group mx-sm-4">
                        <label for="fechanacimiento">Birth Date:</label>
                        <input type="date" class="form-control" name="date_birth" id="fechanacimiento" value="" required>
                    </div>
                    <div class="from-group mx-sm-4">
                        <label for="descripcion">Description:</label>
                        <textarea id="descripcion" name="description" class="form-control"></textarea>
                    </div>
                    <div class="from-group mx-sm-4">
                        <label for="telefono">Phone Number:</label>
                        <input type="number" class="form-control" name="phone" id="telefono" value="">
                    </div>
                    <div class="from-group mx-sm-4">
                        <label for="web">Web Site:</label>
                        <input type="text" class="form-control" name="website" id="web" value="">
                    </div>
                    <div class="from-group mx-sm-4">
                        <label for="git">Git Account:</label>
                        <input type="text" class="form-control" name="github" id="git" value="">
                    </div>
                    <div class="form-group mx-sm-4">
                        <input type="submit" class="ingresar" name="guardar" value="SAVE">
                    </div>

                </form>




                @else
                @foreach($profile as $profl)
                <form method="POST" action="{{route('profiles.update', $profl->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div id="photo-container">
                        @if ($profl->picture != '')
                        <img id="usr-photo" src="{{ asset('images/'.$profl->picture) }}">
                        @else
                        <img id="usr-photo" src="{{ asset('images/userIcon.png') }}">
                        @endif
                    </div>
                    <input type="hidden" name="pic_path" value="{{$profl->picture}}">
                    <div class="from-group mx-sm-4">
                        <label for="imagen">Select your picture:</label>
                        <input type="file" class="form-control" name="picture" id="imagen">
                    </div>
                    <div class="from-group mx-sm-4">

                        <label for="nombre">Complete Name:</label>
                        <input type="text" class="form-control" name="complete_name" id="nombre" value="{{$profl->complete_name}}" required>
                    </div>
                    <div class="from-group mx-sm-4">
                        <label for="fechanacimiento">Birth Date:</label>
                        <input type="date" class="form-control" name="date_birth" id="fechanacimiento" value="{{$profl->date_birth}}" required>
                    </div>
                    <div class="from-group mx-sm-4">
                        <label for="descripcion">Description:</label>
                        <textarea id="descripcion" name="description" class="form-control">{{$profl->description}}</textarea>
                    </div>
                    <div class="from-group mx-sm-4">
                        <label for="telefono">Phone Number:</label>
                        <input type="number" class="form-control" name="phone" id="telefono" value="{{$profl->phone}}">
                    </div>
                    <div class="from-group mx-sm-4">
                        <label for="web">Web Site:</label>
                        <input type="text" class="form-control" name="website" id="web" value="{{$profl->website}}">
                    </div>
                    <div class="from-group mx-sm-4">
                        <label for="git">Git Account:</label>
                        <input type="text" class="form-control" name="github" id="git" value="{{$profl->github}}">
                    </div>
                    <div class="form-group mx-sm-4">
                        <input type="submit" class="ingresar" name="guardar" value="SAVE">
                    </div>

                </form>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    @endsection
</body>

</html>