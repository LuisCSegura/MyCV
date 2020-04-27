<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $profile = Profile::where('user_id', $id)->get();

        if (count($profile)) {
            return view('profiles', compact('profile'));
        }
        return view('profiles');
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
        $id = auth()->user()->id;
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $pic_name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/' . $id, $pic_name);
            $pic_route = $id . '/' . $pic_name;
        } else {
            $pic_route = '';
        }
        $model = new Profile();
        $model->user_id = $id;
        $model->complete_name = $request->complete_name;
        $model->description = $request->description;
        $model->phone = $request->phone;
        $model->date_birth = $request->date_birth;
        $model->website = $request->website;
        $model->github = $request->github;
        $model->picture = $pic_route;
        $model->save();
        return redirect()->route('profiles.index');
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
        $model = Profile::where('id', $id)->get()[0];
        $request->validate(
            [
                'complete_name' => 'required',
                'description' => 'required',
                'phone' => 'required',
                'website' => 'required',
                'github' => 'required',
                'date_birth' => 'required',
            ]
        );

        if ($request->hasFile('picture')) {
            $id = auth()->user()->id;
            $file = $request->file('picture');
            $pic_name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/' . $id, $pic_name);
            $pic_route = $id . '/' . $pic_name;
        } else {
            $pic_route = $request->pic_path;
        }
        $model->user_id = $id;
        $model->complete_name = $request->complete_name;
        $model->description = $request->description;
        $model->phone = $request->phone;
        $model->date_birth = $request->date_birth;
        $model->website = $request->website;
        $model->github = $request->github;
        $model->picture = $pic_route;
        $model->update();
        return redirect()->route('profiles.index');
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
