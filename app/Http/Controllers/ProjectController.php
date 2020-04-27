<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
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
        $id = auth()->user()->id;
        $projects = Project::where('user_id', $id)->get();

        if (count($projects)) {
            return view('projects', compact('projects'));
        }
        return view('projects');
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
        $request->validate(
            [
                'name' => 'required',
                'platform' => 'required',
                'description' => 'required',
                'url' => 'required'

            ]
        );

        $id = auth()->user()->id;
        $model = new Project;
        $model->user_id = $id;
        $model->name = $request->name;
        $model->platform = $request->platform;
        $model->description = $request->description;
        $model->url = $request->url;
        $model->save();
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $model = Project::where('id', $id)->get()[0];

        $request->validate(
            [
                'name' => 'required',
                'platform' => 'required',
                'description' => 'required',
                'url' => 'required'

            ]
        );

        $model->name = $request->name;
        $model->platform = $request->platform;
        $model->description = $request->description;
        $model->url = $request->url;

        $model->update();
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Project::where('id', $id)->get()[0];
        $model->delete();
        return redirect()->route('projects.index');
    }
}
