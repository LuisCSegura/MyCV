<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class TemplateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($style)
    {
        $id = auth()->user()->id;
        $profile = App\Profile::where('user_id', $id)->get();
        $contributions = App\Contribution::where('user_id', $id)->get();
        $educations = App\Education::where('user_id', $id)->get();
        $experiences = App\Experience::where('user_id', $id)->get();
        $hobbies = App\Hobbie::where('user_id', $id)->get();
        $knowledges = App\Knowledge::where('user_id', $id)->get();
        $projects = App\Project::where('user_id', $id)->get();
        $skills = App\Skill::where('user_id', $id)->get();
        return view('templates.CV', compact('style', 'profile', 'contributions', 'educations', 'experiences', 'hobbies', 'knowledges', 'projects', 'skills'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
