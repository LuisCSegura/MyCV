<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('home', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/download/{style}', 'PDFController@download')->name('download');
Route::post('/send/{style}', 'PDFController@sendMail')->name('send');

Route::resources([
    'profiles' => 'ProfileController',
    'experiences' => 'ExperienceController',
    'contributions' => 'ContributionController',
    'educations' => 'EducationController',
    'hobbies' => 'HobbieController',
    'knowledges' => 'KnowledgeController',
    'projects' => 'ProjectController',
    'skills' => 'SkillController',
    'templates' => 'TemplateController',
]);
