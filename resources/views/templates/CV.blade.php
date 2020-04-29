@extends('layouts.app')
<!DOCTYPE html>
<html>

<head>
    <title>CV</title>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all">

</head>

<body>

    @section('content')
    <div class="bar-container">
        <form method="POST" class="export-bar" action="{{route('download', $style)}}">
            @csrf
            <input type="submit" class="export-bar-button" value="Download as PDF">
        </form>
        <form method="POST" class="export-bar" action="{{route('send', $style)}}">
            @csrf
            <input type="submit" class="export-bar-button" id="send" value="Send to your email">
        </form>
    </div>

    <div class="content-section">
        <link rel="stylesheet" href="{{ asset('css/'.$style.'.css') }}">
        <div id="doc2" class="yui-t7">
            <div id="inner">
                @if (!empty($profile))
                @foreach($profile as $profl)
                @if ($profl->picture != '')
                <img class="card-img-top" name='imagen' src="{{asset('images/'.$profl->picture)}}">
                @else
                <img class="card-img-top" name='imagen' src="{{asset('images/userIcon.png')}}">
                @endif
                <div id="hd">
                    <div class="yui-gc">
                        <div class="yui-u first">
                            <h1>{{$profl->complete_name}}</h1>

                        </div>

                        <div class="yui-u">
                            <div class="contact-info">
                                <h2>BIRTH DATE: <br> {{$profl->date_birth}}</h2>
                                <h2>PHONE NUMBER:<br> {{$profl->phone}}</h2>
                                <h2>SITIO WEB:<br> {{$profl->website}}</h2>
                                <h2>GIT ACCOUNT:<br> {{$profl->github}}</h2>

                            </div>
                            <!--// .contact-info -->
                        </div>
                    </div>
                    <!--// .yui-gc -->
                </div>
                <!--// hd -->

                <div id="bd">
                    <div id="yui-main">
                        <div class="yui-b">

                            <div class="yui-gf">
                                <div class="yui-u first">
                                    <h2>Description</h2>
                                </div>
                                <div class="yui-u">
                                    <div class="talent">
                                        <p>{{$profl->description}}</p>
                                    </div>
                                </div>
                            </div>
                            <!--// .yui-gf -->
                            @endforeach
                            @endif

                            @if (!empty($skills))

                            <div class="yui-gf">
                                <div class="yui-u first">
                                    <h2>Skills</h2>
                                </div>
                                <div class="yui-u">
                                    <div class="talent">
                                        @foreach($skills as $skill)
                                        <li>Name: {{$skill->name}}</li>
                                        <li>Level: {{$skill->level}}</li>
                                        <br>
                                        <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if (!empty($knowledges))
                            <div class="yui-gf">
                                <div class="yui-u first">
                                    <h2>Knowledge</h2>
                                </div>
                                <div class="yui-u">
                                    <div class="talent">
                                        @foreach($knowledges as $knowledge)
                                        <li>Description: {{$knowledge->description}}</li>
                                        <br>
                                        <br>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <!--// .yui-gf -->
                            @endif

                            @if (!empty($hobbies))

                            <div class="yui-gf">
                                <div class="yui-u first">
                                    <h2>Hobbies</h2>
                                </div>
                                <div class="yui-u">
                                    <div class="talent">
                                        @foreach($hobbies as $hobbie)
                                        <li>Name: {{$hobbie->name}}</li>
                                        <li>Description: {{$hobbie->description}}</li>
                                        <br>
                                        <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!--// .yui-gf-->

                            @if (!empty($experiences))

                            <div class="yui-gf">
                                <div class="yui-u first">
                                    <h2>Experience</h2>
                                </div>
                                <div class="yui-u">
                                    <div class="talent">
                                        @foreach($experiences as $experience)
                                        <li>Company: {{$experience->company}}</li>
                                        <li>Position: {{$experience->position}}</li>
                                        <li>Period: {{$experience->period}}</li>
                                        <li>Description: {{$experience->description}}</li>
                                        <li>Web Site: {{$experience->website}}</li>
                                        <br>
                                        <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!--// .yui-gf -->




                            @if (!empty($projects))

                            <div class="yui-gf">
                                <div class="yui-u first">
                                    <h2>Projects</h2>
                                </div>
                                <div class="yui-u">
                                    <div class="talent">
                                        @foreach($projects as $project)
                                        <li>Name: {{$project->name}}</li>
                                        <li>Platform: {{$project->platform}}</li>
                                        <li>Description: {{$project->description}}</li>
                                        <li>URL: {{$project->url}}</li>
                                        <br>
                                        <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif




                            @if (!empty($contributions))

                            <div class="yui-gf">
                                <div class="yui-u first">
                                    <h2>Contributions</h2>
                                </div>
                                <div class="yui-u">
                                    <div class="talent">
                                        @foreach($contributions as $contribution)
                                        <li>Name: {{$contribution->name}}</li>
                                        <li>Description: {{$contribution->description}}</li>
                                        <li>URL: {{$contribution->url}}</li>
                                        <br>
                                        <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if (!empty($educations))

                            <div class="yui-gf last">
                                <div class="yui-u first">
                                    <h2>Education</h2>
                                </div>
                                <div class="yui-u">
                                    <div class="talent">
                                        @foreach($educations as $education)
                                        <li>Title: {{$education->title}}</li>
                                        <li>Period: {{$education->period}}</li>
                                        <li>Description: {{$education->description}}</li>
                                        <li>Web Site: {{$education->website}}</li>
                                        <br>
                                        <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif


                            <!--// .yui-gf -->
                        </div>
                        <!--// .yui-b -->
                    </div>
                    <!--// yui-main -->
                </div>
                <!--// bd -->
            </div><!-- // inner -->
        </div>
    </div>
    @endsection
</body>

</html>