@extends('layouts.app')
<!DOCTYPE html>
<html>

<head>
    <title>Skills</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/CRUD.css') }}">
</head>

<body>
    @section('content')


    <div class="container-fluid">
        <h1 class="mt-4">SKILLS</h1>
        <div id="separator"></div>
        <h5>What are you skilled at?</h5>
        <div class="container">
            <div class="row justify-content-center pt-5 mt-5 mr-1">
                <div class="col-md-12">
                    <div class="from-group mx-sm-4">
                        <h2>New Skill</h2>
                    </div>
                    <form method="POST" class="form-agregar" action="{{route('skills.store')}}">
                        @csrf

                        <div class="from-group mx-sm-4">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" value="" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="level">Level:</label>
                            <input type="text" class="form-control" name="level" id="level" value="" required>
                        </div>

                        <div class="form-group mx-sm-4">
                            <input type="submit" class="agregar" name="agregar" value="ADD">
                        </div>
                    </form>
                    @if (!empty($skills))
                    <div class="from-group mx-sm-4">
                        <h2>Your Skills</h2>
                    </div>
                    @foreach($skills as $skill)
                    <form method="POST" class="form-card" action="{{route('skills.update', $skill->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="from-group mx-sm-4">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$skill->name}}" required>
                        </div>
                        <div class="from-group mx-sm-4">
                            <label for="level">Level:</label>
                            <input type="text" class="form-control" name="level" id="level" value="{{$skill->level}}" required>
                        </div>
                        <div class="form-group mx-sm-4">
                            <input type="submit" class="guardar" name="guardar" value="SAVE">
                        </div>
                    </form>
                    <form method="POST" class="form-delete" action="{{route('skills.destroy',$skill->id)}}">
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