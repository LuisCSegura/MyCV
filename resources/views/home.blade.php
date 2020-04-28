@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>

</head>

<body>
    @section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/CRUD.css') }}">
    <h1 class="mt-4">CREATE</h1>
    <div id="separator"></div>
    <h5>Make sure you have completed your information and choose a template to create your resume: </h5>

    <div class="img-container">
        <a class="opt-img" href="{{ route('templates.show', 'CV1') }}"><img class="card-img-top" src="{{ asset('images/CV1.png') }}"></a>
        <a class="opt-img" href="{{ route('templates.show', 'CV2') }}"><img class="card-img-top" src="{{ asset('images/CV2.png') }}"></a>
        <a class="opt-img" href="{{ route('templates.show', 'CV3') }}"><img class="card-img-top" src="{{ asset('images/CV3.png') }}"></a>
        <a class="opt-img" href="{{ route('templates.show', 'CV4') }}"><img class="card-img-top" src="{{ asset('images/CV4.png') }}"></a>
        <a class="opt-img" href="{{ route('templates.show', 'CV5') }}"><img class="card-img-top" src="{{ asset('images/CV5.png') }}"></a>
        <a class="opt-img" href="{{ route('templates.show', 'CV6') }}"><img class="card-img-top" src="{{ asset('images/CV6.png') }}"></a>
        <a class="opt-img" href="{{ route('templates.show', 'CV7') }}"><img class="card-img-top" src="{{ asset('images/CV7.png') }}"></a>
        <a class="opt-img" href="{{ route('templates.show', 'CV8') }}"><img class="card-img-top" src="{{ asset('images/CV8.png') }}"></a>


    </div>
    @endsection

</body>

</html>