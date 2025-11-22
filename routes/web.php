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




Route::get('/PHP_Cookies', function () {
    return view('PHP_Cookies');
});




Route::get('/PHP_session_start', function () {
    return view('PHP_session_start');
});



Route::get('/PHP_Session_Get', function () {
    return view('PHP_Session_Get');
});




Route::get('/PHP_Session_Modify', function () {
    return view('PHP_Session_Modify');
});





Route::get('/PHP_Session_Destroy', function () {
    return view('PHP_Session_Destroy');
});






Route::get('/PHP_Filters', function () {
    return view('PHP_Filters');
});



Route::get('/PHP_filter_list', function () {
    return view('PHP_filter_list');
});




Route::get('/PHP_filter_var()_Function', function () {
    return view('PHP_filter_var()_Function');
});




Route::get('/PHP_Validate_an_Integer', function () {
    return view('PHP_Validate_an_Integer');
});



Route::get('/PHP_Tip_filter_var()_and_Problem_With_0', function () {
    return view('PHP_Tip_filter_var()_and_Problem_With_0');
});





Route::get('/PHP_Validate_an_IP_Address', function () {
    return view('PHP_Validate_an_IP_Address');
});





Route::get('/PHP_Sanitize_and_Validate_Email', function () {
    return view('PHP_Sanitize_and_Validate_Email');
});




Route::get('/PHP_Sanitize_and_Validate_URL', function () {
    return view('PHP_Sanitize_and_Validate_URL');
});


Route::get('/PHP_Filters_Advance_Validate_Integer_With_Range', function () {
    return view('PHP_Filters_Advance_Validate_Integer_With_Range');
});




Route::get('/PHP_Filters_Advanced_Validate_IPv6_Address', function () {
    return view('PHP_Filters_Advanced_Validate_IPv6_Address');
});






Route::get('/PHP_Filters_Advanced_Validate_URL', function () {
    return view('PHP_Filters_Advanced_Validate_URL');
});





Route::get('/PHP_Filters_Advanced_Remove_Characters_With_ASCII', function () {
    return view('PHP_Filters_Advanced_Remove_Characters_With_ASCII');
});





Route::get('/PHP_Callback_Functions', function () {
    return view('PHP_Callback_Functions');
});






Route::get('/PHP_and_JSON', function () {
    return view('PHP_and_JSON');
});




Route::get('/PHP_Exceptions', function () {
    return view('PHP_Exceptions');
});




Route::get('/PHP_try_catch', function () {
    return view('PHP_try_catch');
});




Route::get('/PHP_try_catch_finally', function () {
    return view('PHP_try_catch_finally');
});




Route::get('/PHP_Exception_Object', function () {
    return view('PHP_Exception_Object');
});




Route::get('/PHP_upload_test', function () {
    return view('PHP_upload_test');
});



Route::get('/PHP_Form_Handling', function () {
    return view('PHP_Form_Handling');
});



Route::get('/PHP_Form_Validation', function () {
    return view('PHP_Form_Validation');
});



Route::get('/PHP_Validate_Name_E_mailand_URL', function () {
    return view('PHP_Validate_Name_E_mailand_URL');
});



Route::get('/PHP_Classes_and_Objects', function () {
    return view('PHP_Classes_and_Objects');
});




Route::get('/PHP_Constructor', function () {
    return view('PHP_Constructor');
});




Route::get('/PHP_Destructor', function () {
    return view('PHP_Destructor');
});





Route::get('/PHP_Access_Modifiers', function () {
    return view('PHP_Access_Modifiers');
});




Route::get('/PHP_Inheritance', function () {
    return view('PHP_Inheritance');
});




Route::get('/PHP_Class_Constants', function () {
    return view('PHP_Class_Constants');
});




Route::get('/PHP_Abstract_Classes', function () {
    return view('PHP_Abstract_Classes');
});





Route::get('/PHP_Interfaces', function () {
    return view('PHP_Interfaces');
});





Route::get('/PHP_Traits', function () {
    return view('PHP_Traits');
});




Route::get('/PHP_Static_Methods', function () {
    return view('PHP_Static_Methods');
});





Route::get('/PHP_Static_Properties', function () {
    return view('PHP_Static_Properties');
});



Route::get('/PHP_Namespaces', function () {
    return view('PHP_Namespaces');
});




Route::get('/PHP_Iterables', function () {
    return view('PHP_Iterables');
});

