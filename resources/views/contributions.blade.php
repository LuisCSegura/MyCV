@extends('layouts.app')
<!DOCTYPE html>
<html>

<head>
    <title>Contributions</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/CRUD.css') }}">
</head>

<body>
    @section('content')


    <div class="container-fluid">
        <h1 class="mt-4">CONTRIBUTIONS</h1>
        <div id="separator"></div>
        <h5>Are you contributed to any project?</h5>
        <div class="container">
            <div class="row justify-content-center pt-5 mt-5 mr-1">
                <div class="col-md-12">
                    <div class="from-group mx-sm-4">
                        <h2>New Contribution</h2>
                    </div>
                    <form method="POST" class="form-agregar" action="{{route('contributions.store')}}">
                        @csrf

                        <div class="from-group mx-sm-4">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" value="" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="descripcion">Description:</label>
                            <input type="text" class="form-control" name="description" id="descripcion" value="" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="url">URL:</label>
                            <input type="text" class="form-control" name="url" id="url" value="">
                        </div>
                        <div class="form-group mx-sm-4">
                            <input type="submit" class="agregar" name="agregar" value="ADD">
                        </div>
                    </form>
                    @if (!empty($contributions))
                    <div class="from-group mx-sm-4">
                        <h2>Your Contributions</h2>
                    </div>
                    @foreach($contributions as $contribution)
                    <form method="POST" class="form-card" action="{{route('contributions.update', $contribution->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="from-group mx-sm-4">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$contribution->name}}" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="descripcion">Description:</label>
                            <input type="text" class="form-control" name="description" id="descripcion" value="{{$contribution->description}}" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="url">URL:</label>
                            <input type="text" class="form-control" name="url" id="url" value="{{$contribution->url}}">
                        </div>
                        <div class="form-group mx-sm-4">
                            <input type="submit" class="guardar" name="guardar" value="SAVE">
                        </div>
                    </form>
                    <form method="POST" class="form-delete" action="{{route('contributions.destroy', $contribution->id)}}">
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