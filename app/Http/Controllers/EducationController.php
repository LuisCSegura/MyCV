<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Education;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $educations = Education::where('user_id', $id)->get();

        if (count($educations)) {
            return view('educations', compact('educations'));
        }
        return view('educations');
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
                'title' => 'required',
                'period' => 'required',
                'description' => 'required',
                'website' => 'required'

            ]
        );

        $id = auth()->user()->id;
        $model = new Education;
        $model->user_id = $id;
        $model->title = $request->title;
        $model->period = $request->period;
        $model->description = $request->description;
        $model->website = $request->website;
        $model->save();
        return redirect()->route('educations.index');
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
        $model = Education::where('id', $id)->get()[0];

        $request->validate(
            [
                'title' => 'required',
                'period' => 'required',
                'description' => 'required',
                'website' => 'required'

            ]
        );

        $model->title = $request->title;
        $model->period = $request->period;
        $model->description = $request->description;
        $model->website = $request->website;

        $model->update();
        return redirect()->route('educations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Education::where('id', $id)->get()[0];
        $model->delete();
        return redirect()->route('educations.index');
    }
}
