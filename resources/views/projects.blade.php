@extends('layouts.app')
<!DOCTYPE html>
<html>

<head>
    <title>Projects</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/CRUD.css') }}">
</head>

<body>
    @section('content')


    <div class="container-fluid">
        <h1 class="mt-4">PROJECTS</h1>
        <div id="separator"></div>
        <h5>Any interesting project?</h5>
        <div class="container">
            <div class="row justify-content-center pt-5 mt-5 mr-1">
                <div class="col-md-12">
                    <div class="from-group mx-sm-4">
                        <h2>New Project</h2>
                    </div>
                    <form method="POST" class="form-agregar" action="{{route('projects.store')}}">
                        @csrf

                        <div class="from-group mx-sm-4">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" value="" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="platform">Platform:</label>
                            <input type="text" class="form-control" name="platform" id="platform" value="" required>
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
                    @if (!empty($projects))
                    <div class="from-group mx-sm-4">
                        <h2>Your Projects</h2>
                    </div>
                    @foreach($projects as $project)
                    <form method="POST" class="form-card" action="{{route('projects.update', $project->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="from-group mx-sm-4">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$project->name}}" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="platform">Platform:</label>
                            <input type="text" class="form-control" name="platform" id="platform" value="{{$project->platform}}" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="descripcion">Description:</label>
                            <input type="text" class="form-control" name="description" id="descripcion" value="{{$project->description}}" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="url">URL:</label>
                            <input type="text" class="form-control" name="url" id="url" value="{{$project->url}}">
                        </div>
                        <div class="form-group mx-sm-4">
                            <input type="submit" class="guardar" name="guardar" value="SAVE">
                        </div>
                    </form>
                    <form method="POST" class="form-delete" action="{{route('projects.destroy', $project->id)}}">
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