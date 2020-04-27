<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Experience;

class ExperienceController extends Controller
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
        $experiences = Experience::where('user_id', $id)->get();

        if (count($experiences)) {
            return view('experiences', compact('experiences'));
        }
        return view('experiences');
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
                'company' => 'required',
                'position' => 'required',
                'period' => 'required',
                'description' => 'required',
                'website' => 'required'

            ]
        );

        $id = auth()->user()->id;
        $model = new Experience;
        $model->user_id = $id;
        $model->company = $request->company;
        $model->position = $request->position;
        $model->period = $request->period;
        $model->description = $request->description;
        $model->website = $request->website;
        $model->save();
        return redirect()->route('experiences.index');
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
        $model = Experience::where('id', $id)->get()[0];

        $request->validate(
            [

                'company' => 'required',
                'position' => 'required',
                'period' => 'required',
                'description' => 'required',
                'website' => 'required'

            ]
        );

        $model->company = $request->company;
        $model->position = $request->position;
        $model->period = $request->period;
        $model->description = $request->description;
        $model->website = $request->website;

        $model->update();
        return redirect()->route('experiences.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Experience::where('id', $id)->get()[0];
        $model->delete();
        return redirect()->route('experiences.index');
    }
}
