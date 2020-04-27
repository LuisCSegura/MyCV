<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $skills = Skill::where('user_id', $id)->get();

        if (count($skills)) {
            return view('skills', compact('skills'));
        }
        return view('skills');
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
                'level' => 'required',
            ]
        );

        $id = auth()->user()->id;
        $model = new Skill;
        $model->user_id = $id;
        $model->name = $request->name;
        $model->level = $request->level;
        $model->save();
        return redirect()->route('skills.index');
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
        $model = Skill::where('id', $id)->get()[0];

        $request->validate(
            [
                'name' => 'required',
                'level' => 'required',
            ]
        );

        $model->name = $request->name;
        $model->level = $request->level;

        $model->update();
        return redirect()->route('skills.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model =   Skill::where('id', $id)->get()[0];
        $model->delete();
        return redirect()->route('skills.index');
    }
}
