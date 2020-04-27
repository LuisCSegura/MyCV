@extends('layouts.app')
<!DOCTYPE html>
<html>

<head>
    <title>Education</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/CRUD.css') }}">
</head>

<body>
    @section('content')


    <div class="container-fluid">
        <h1 class="mt-4">EDUCATION</h1>
        <div id="separator"></div>
        <h5>Which are your studies?</h5>
        <div class="container">
            <div class="row justify-content-center pt-5 mt-5 mr-1">
                <div class="col-md-12">
                    <div class="from-group mx-sm-4">
                        <h2>New Education</h2>
                    </div>
                    <form method="POST" class="form-agregar" action="{{route('educations.store')}}">
                        @csrf

                        <div class="from-group mx-sm-4">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" id="title" value="" required>
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
                    @if (!empty($educations))
                    <div class="from-group mx-sm-4">
                        <h2>Your Education</h2>
                    </div>
                    @foreach($educations as $education)
                    <form method="POST" class="form-card" action="{{route('educations.update', $education->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="from-group mx-sm-4">
                            <label for="compannia">Title:</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$education->title}}" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="periodo">Period:</label>
                            <input type="text" class="form-control" name="period" id="periodo" value="{{$education->period}}" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="descripcion">Description:</label>
                            <input type="text" class="form-control" name="description" id="descripcion" value="{{$education->description}}" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="web">Web Site:</label>
                            <input type="text" class="form-control" name="website" id="web" value="{{$education->website}}">
                        </div>
                        <div class="form-group mx-sm-4">
                            <input type="submit" class="guardar" name="guardar" value="SAVE">
                        </div>
                    </form>
                    <form method="POST" class="form-delete" action="{{route('educations.destroy', $education->id)}}">
                        @csrf
                        @method('DELETE')
                        <div class="del-group mx-sm-4">
                            <input type="submit" class="eliminar" name="eliminar" value=" X ">
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