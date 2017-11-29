<?php

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

// Route::get('/', function() {
//     return view('home');
// });


//Route::get('ajax', function() {
//    return view('ajax');
//});

// Route::get('/login', function() {
//     return view('home');
// });

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/{page}Page', 'userController@viewPage');

//Route::get('userController', array('user_data'=>'userController@viewProfile'));

// Route::get('/homes', function () {
//     return view('homes');
// });

Route::get('/', 'userController@loginPage');
Route::get('/login', 'userController@loginPage');

Route::post('process', 'userController@login');
Route::post('signup', 'userController@signup');
Route::get('/logout', 'logoutController@logout');
Route::post('/update_profile_info', 'userController@updateProfile');
Route::post('/feedback', 'userController@feedback');
Route::post('/skills_update', 'userController@updateSkills');
Route::post('/search_query', 'userController@searchUsers');
Route::post('/help_request', 'userController@helpRequest');
Route::post('/load_notification', 'userController@loadNotification');
Route::post('/get_request_data', 'userController@getRequestData');
Route::post('/help_request_status_update', 'userController@updateRequestStatus');
Route::post('/get_cities', 'userController@getCities');
Route::post('/search_helpers', 'searchController@searchHelpers');

Route::POST('image_upload', 'userController@profileImageUpload');

Route::get('{username}', 'userController@viewProfileThroughUrl');

Route::get('search/jobs', 'userController@searchAutocomplete');


Route::get('home', function () {
    return view('search');
});



Route::get('form', function () {
    return view('form');
});
