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

Route::get('/php_call_function', function () {
    return view('php_call_function');
});

Route::get('/php_function_parameter', function () {
    return view('php_function_parameter');
});


Route::get('/php_function_defualt_parameter', function () {
    return view('php_function_defualt_parameter');
});


Route::get('/php_function_return', function () {
    return view('php_function_return');
});

Route::get('/php_Pass_by_Reference', function () {
    return view('php_Pass_by_Reference');
});


Route::get('/php_Variadic_Functions', function () {
    return view('php_Variadic_Functions');
});


Route::get('/PHP_Type_Declarations', function () {
    return view('PHP_Type_Declarations');
});



Route::get('/PHP_example_function', function () {
    return view('PHP_example_function');
});


Route::get('/PHP_Indexed_Arrays', function () {
    return view('PHP_Indexed_Arrays');
});


Route::get('/PHP_Associative_Arrays', function () {
    return view('PHP_Associative_Arrays');
});



Route::get('/PHP_Array_add_data', function () {
    return view('PHP_Array_add_data');
});


Route::get('/PHP_Array_remove_data', function () {
    return view('PHP_Array_remove_data');
});


Route::get('/PHP_Array_sort', function () {
    return view('PHP_Array_sort');
});

Route::get('/PHP_Array_Multidimensional_Arrays', function () {
    return view('PHP_Array_Multidimensional_Arrays');
});



Route::get('/PHP_Arrays_Example_2', function () {
    return view('PHP_Arrays_Example_2');
});



Route::get('/PHP_Superglobals', function () {
    return view('PHP_Superglobals');
});




Route::get('/PHP_Regular_Expressions', function () {
    return view('PHP_Regular_Expressions');
});



Route::get('/PHP_Regex_Patterns', function () {
    return view('PHP_Regex_Patterns');
});



Route::get('/PHP_Superglobals_Regex', function () {
    return view('PHP_Superglobals_Regex');
});




Route::get('/PHP_A_Simple_HTML_Form', function () {
    return view('PHP_A_Simple_HTML_Form');
});





Route::get('/php_fourm_validate', function () {
    return view('php_fourm_validate');
});




Route::match(['get', 'post'], '/PHP_Required_Fields', function () {
    return view('PHP_Required_Fields');
});





Route::get('/PHP_fourm__validate_mark2', function () {
    return view('PHP_fourm__validate_mark2');
});



Route::get('/PHP_Date_Function', function () {
    return view('PHP_Date_Function');
});




Route::get('/PHP_Include_Require', function () {
    return view('PHP_Include_Require');
});



Route::get('/PHP_File_Handling', function () {
    return view('PHP_File_Handling');
});




Route::get('/PHP_File_Open_Read_Close', function () {
    return view('PHP_File_Open_Read_Close');
});




Route::get('/PHP_File_Create_Write', function () {
    return view('PHP_File_Create_Write');
});



Route::get('/PHP_File_Upload', function () {
    return view('PHP_File_Upload');
});

