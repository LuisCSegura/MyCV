<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PDFController extends Controller
{
    /**
     * 
     */
    public function download($style)
    {
        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML('<h1>Styde.net</h1>');

        return $pdf->download('mi-archivo.pdf');
    }


    // $id = auth()->user()->id;
    //     $profile = App\Profile::where('user_id', $id)->get();
    //     $contributions = App\Contribution::where('user_id', $id)->get();
    //     $educations = App\Education::where('user_id', $id)->get();
    //     $experiences = App\Experience::where('user_id', $id)->get();
    //     $hobbies = App\Hobbie::where('user_id', $id)->get();
    //     $knowledges = App\Knowledge::where('user_id', $id)->get();
    //     $projects = App\Project::where('user_id', $id)->get();
    //     $skills = App\Skill::where('user_id', $id)->get();
    //     $pdf = app('dompdf.wrapper');
    //     $pdf->loadView('templates.CV', compact('style', 'profile', 'contributions', 'educations', 'experiences', 'hobbies', 'knowledges', 'projects', 'skills'));

    //     return $pdf->download('archivo.pdf');
}
