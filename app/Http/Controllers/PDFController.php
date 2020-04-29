<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Mail;

class PDFController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * 
     */
    public function download($style)
    {
        $id = auth()->user()->id;
        $pdf = app('dompdf.wrapper');
        $profile = App\Profile::where('user_id', $id)->get();
        $contributions = App\Contribution::where('user_id', $id)->get();
        $educations = App\Education::where('user_id', $id)->get();
        $experiences = App\Experience::where('user_id', $id)->get();
        $hobbies = App\Hobbie::where('user_id', $id)->get();
        $knowledges = App\Knowledge::where('user_id', $id)->get();
        $projects = App\Project::where('user_id', $id)->get();
        $skills = App\Skill::where('user_id', $id)->get();
        $pdf->loadView('templates.pdfCV', compact('style', 'profile', 'contributions', 'educations', 'experiences', 'hobbies', 'knowledges', 'projects', 'skills'));

        return $pdf->download('MyCV.pdf');
    }
    public function sendMail($style)
    {

        $id = auth()->user()->id;
        $email = auth()->user()->email;
        $pdf = app('dompdf.wrapper');
        $profile = App\Profile::where('user_id', $id)->get();
        $contributions = App\Contribution::where('user_id', $id)->get();
        $educations = App\Education::where('user_id', $id)->get();
        $experiences = App\Experience::where('user_id', $id)->get();
        $hobbies = App\Hobbie::where('user_id', $id)->get();
        $knowledges = App\Knowledge::where('user_id', $id)->get();
        $projects = App\Project::where('user_id', $id)->get();
        $skills = App\Skill::where('user_id', $id)->get();
        $pdf->loadView('templates.pdfCV', compact('style', 'profile', 'contributions', 'educations', 'experiences', 'hobbies', 'knowledges', 'projects', 'skills'));

        Mail::send('templates.mail', compact('style'), function ($mail) use ($pdf, $email) {
            $mail->from('lsegurab@est.utn.ac.cr');
            $mail->to($email);
            $mail->subject('Your Resume');
            $mail->attachData($pdf->output(), 'test.pdf');
        });
        return view('templates.CV', compact('style', 'profile', 'contributions', 'educations', 'experiences', 'hobbies', 'knowledges', 'projects', 'skills'));
    }
}
