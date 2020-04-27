@extends('layouts.app')
<!DOCTYPE html>
<html>

<head>
    <title>Experience</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/CRUD.css') }}">
</head>

<body>
    @section('content')


    <div class="container-fluid">
        <h1 class="mt-4">EXPERIENCE</h1>
        <div id="separator"></div>
        <h5>Tell us where have you worked</h5>
        <div class="container">
            <div class="row justify-content-center pt-5 mt-5 mr-1">
                <div class="col-md-12">
                    <div class="from-group mx-sm-4">
                        <h2>New Experience</h2>
                    </div>
                    <form method="POST" class="form-agregar" action="{{route('experiences.store')}}">
                        @csrf

                        <div class="from-group mx-sm-4">
                            <label for="compannia">Company:</label>
                            <input type="text" class="form-control" name="company" id="compannia" value="" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="cargo">Position:</label>
                            <input type="text" class="form-control" name="position" id="cargo" value="" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="periodo">Period:</label>
                            <input type="text" class="form-control" name="period" id="periodo" value="" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="descripcion">Description:</label>
                            <input type="text" class="form-control" name="description" id="descripcion" value="" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="web">Web Site:</label>
                            <input type="text" class="form-control" name="website" id="web" value="">
                        </div>
                        <div class="form-group mx-sm-4">
                            <input type="submit" class="agregar" name="agregar" value="ADD">
                        </div>
                    </form>
                    @if (!empty($experiences))
                    <div class="from-group mx-sm-4">
                        <h2>Your Experience</h2>
                    </div>
                    @foreach($experiences as $experience)
                    <form method="POST" class="form-card" action="{{route('experiences.update', $experience->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="from-group mx-sm-4">
                            <label for="compannia">Company:</label>
                            <input type="text" class="form-control" name="company" id="compannia" value="{{$experience->company}}" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="cargo">Position:</label>
                            <input type="text" class="form-control" name="position" id="cargo" value="{{$experience->position}}" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="periodo">Period:</label>
                            <input type="text" class="form-control" name="period" id="periodo" value="{{$experience->period}}" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="descripcion">Description:</label>
                            <input type="text" class="form-control" name="description" id="descripcion" value="{{$experience->description}}" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="web">Web Site:</label>
                            <input type="text" class="form-control" name="website" id="web" value="{{$experience->website}}">
                        </div>
                        <div class="form-group mx-sm-4">
                            <input type="submit" class="guardar" name="guardar" value="SAVE">
                        </div>
                    </form>
                    <form method="POST" class="form-delete" action="{{route('experiences.destroy', $experience->id)}}">
                        @csrf
                        @method('DELETE')
                        <div class="del-group mx-sm-4">
                            <input type="submit" class="eliminar" name="eliminar" value=" ✖ ">
                        </div>
                    </form>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>



    </div>
    @endsection
</body>

</html>