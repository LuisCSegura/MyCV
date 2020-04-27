@extends('layouts.app')
<!DOCTYPE html>
<html>

<head>
    <title>Hobbies</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/CRUD.css') }}">
</head>

<body>
    @section('content')


    <div class="container-fluid">
        <h1 class="mt-4">HOBBIES</h1>
        <div id="separator"></div>
        <h5>What do you enjoy doing?</h5>
        <div class="container">
            <div class="row justify-content-center pt-5 mt-5 mr-1">
                <div class="col-md-12">
                    <div class="from-group mx-sm-4">
                        <h2>New Hobbie</h2>
                    </div>
                    <form method="POST" class="form-agregar" action="{{route('hobbies.store')}}">
                        @csrf

                        <div class="from-group mx-sm-4">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" value="" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="descripcion">Description:</label>
                            <input type="text" class="form-control" name="description" id="descripcion" value="" required>
                        </div>
                        <div class="form-group mx-sm-4">
                            <input type="submit" class="agregar" name="agregar" value="ADD">
                        </div>
                    </form>
                    @if (!empty($hobbies))
                    <div class="from-group mx-sm-4">
                        <h2>Your Hobbies</h2>
                    </div>
                    @foreach($hobbies as $hobbie)
                    <form method="POST" class="form-card" action="{{route('hobbies.update', $hobbie->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="from-group mx-sm-4">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$hobbie->name}}" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="descripcion">Description:</label>
                            <input type="text" class="form-control" name="description" id="descripcion" value="{{$hobbie->description}}" required>
                        </div>
                        <div class="form-group mx-sm-4">
                            <input type="submit" class="guardar" name="guardar" value="SAVE">
                        </div>
                    </form>
                    <form method="POST" class="form-delete" action="{{route('hobbies.destroy', $hobbie->id)}}">
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