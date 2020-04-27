<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Knowledge;

class KnowledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $knowledges = Knowledge::where('user_id', $id)->get();

        if (count($knowledges)) {
            return view('knowledges', compact('knowledges'));
        }
        return view('knowledges');
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
                'description' => 'required',
            ]
        );

        $id = auth()->user()->id;
        $model = new Knowledge;
        $model->user_id = $id;
        $model->description = $request->description;
        $model->save();
        return redirect()->route('knowledges.index');
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
        $model = Knowledge::where('id', $id)->get()[0];

        $request->validate(
            [
                'description' => 'required',
            ]
        );
        $model->description = $request->description;
        $model->update();
        return redirect()->route('knowledges.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Knowledge::where('id', $id)->get()[0];
        $model->delete();
        return redirect()->route('knowledges.index');
    }
}
