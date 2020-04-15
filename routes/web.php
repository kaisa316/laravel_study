<?php

use App\Services\StudyService;
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

//study
Route::get('/study', function (StudyService $study) {
    $echo_name = $study->echoName();
    return $echo_name;
});
Route::get('/study_param/{id}/{name}', function ($id,$name) {

    return $id.$name;
});

//命名route
Route::get('/study_named', function () {
    return 'named profile';
})->name('profile');


//重定向到命名
Route::get('/profile_test', function () {
    return redirect()->route('profile');
});

