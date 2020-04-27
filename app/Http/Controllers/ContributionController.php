<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contribution;

class ContributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $contributions = Contribution::where('user_id', $id)->get();

        if (count($contributions)) {
            return view('contributions', compact('contributions'));
        }
        return view('contributions');
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
                'url' => 'required',
                'description' => 'required',

            ]
        );

        $id = auth()->user()->id;
        $model = new Contribution;
        $model->user_id = $id;
        $model->name = $request->name;
        $model->description = $request->description;
        $model->url = $request->url;
        $model->save();
        return redirect()->route('contributions.index');
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
        $model = Contribution::where('id', $id)->get()[0];

        $request->validate(
            [
                'name' => 'required',
                'url' => 'required',
                'description' => 'required',

            ]
        );

        $model->name = $request->name;
        $model->description = $request->description;
        $model->url = $request->url;

        $model->update();
        return redirect()->route('contributions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model =  Contribution::where('id', $id)->get()[0];
        $model->delete();
        return redirect()->route('contributions.index');
    }
}
