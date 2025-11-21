<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/basic_php', function () {
    return view('basic_php');
});



Route::get('/PHP_Installation', function () {
    return view('PHP_Installation');
});


Route::get('/PHP_Casting', function () {
    return view('PHP_Casting');
});


Route::get('/PHP_Math_Functions', function () {
    return view('PHP_Math_Functions');
});


Route::get('/PHP_Constants', function () {
    return view('PHP_Constants');
});


Route::get('/PHP_Operators', function () {
    return view('PHP_Operators');
});


Route::get('/PHP_switch_Statement', function () {
    return view('PHP_switch_Statement');
});


Route::get('/PHP_Loops', function () {
    return view('PHP_Loops');
});