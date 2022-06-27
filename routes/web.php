<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Skinseg;
use App\Http\Controllers\Cvlib;
use App\Http\Controllers\Yolo;
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

Route::get('/Industry', function () {
    return view('Industry');
});

Route::get('/Medical', function () {
    return view('Medical');
});

Route::get('/Retail', function () {
    return view('Retail');
});

Route::get('/object-detection', function () {
    return view('objectdetection');
});

Route::get('/face-and-gender-detection', function () {
    return view('faceandgenderdetection');
});

Route::post('/skin-segmentation', 'App\Http\Controllers\Skinseg@treat')->name('skinseg');

Route::get('/object-detection', 'App\Http\Controllers\Yolo@index')->name('Objectdetect');
Route::post('/object-detection', 'App\Http\Controllers\Yolo@create')->name('Objectdetect');

Route::get('/face-and-gender-detection', 'App\Http\Controllers\Cvlib@index')->name('face&gender');
Route::post('/face-and-gender-detection', 'App\Http\Controllers\Cvlib@create')->name('face&gender');