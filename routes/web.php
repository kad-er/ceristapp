<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Skinseg;
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
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/skin-segmentation', function () {
    return view('skinsegmentation');
});

Route::get('/object-detection', function () {
    return view('objectdetection');
});

Route::get('/face-and-gender-detection', function () {
    return view('faceandgenderdetection');
});

Route::post('/skin-segmentation', 'App\Http\Controllers\Skinseg@treat')->name('skinseg');