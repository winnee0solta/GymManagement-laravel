<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
}); 
Route::get('/login', 'AuthController@loginView')->name('login');
Route::post('/login', 'AuthController@loginUser');
Route::get('/logout', 'AuthController@logout')->middleware(['auth']);
/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'checkifadmin'])->group(function () {

    Route::get('/dashboard', 'Dashboard\HomeController@index');

    Route::get('/dashboard/members', 'Dashboard\MembersController@index');
    Route::post('/dashboard/members/add', 'Dashboard\MembersController@store');
    Route::get('/dashboard/members/{member_id}/view', 'Dashboard\MembersController@view');
    Route::post('/dashboard/members/{member_id}/edit', 'Dashboard\MembersController@update');
    Route::get('/dashboard/members/{member_id}/remove', 'Dashboard\MembersController@destroy');
    Route::post('/dashboard/update-membership/{member_id}', 'Dashboard\MemberShipsController@update');
    Route::post('/dashboard/update-body-status/{member_id}', 'Dashboard\MembersController@updateBodyStatus');
    Route::get('/dashboard/remove-body-status/{member_id}/{bs_id}', 'Dashboard\MembersController@removeBodyStatus');
    Route::post('/dashboard/add-account-bill/{member_id}', 'Dashboard\AccountsController@addTransaction');


    //plans
    Route::post('/dashboard/members/{member_id}/nutritionplan-add', 'Dashboard\NutritionPlansController@store');
    Route::post('/dashboard/members/{member_id}/workoutplan-add', 'Dashboard\WorkoutPlansController@store');


    //attendance
    Route::get('/dashboard/attendance', 'Dashboard\AttendanceController@index');
    Route::get('/dashboard/attendance/{member_id}/present', 'Dashboard\AttendanceController@setP');
    Route::get('/dashboard/attendance/{member_id}/absent', 'Dashboard\AttendanceController@setA');

    //account
    Route::get('/dashboard/accounts', 'Dashboard\AccountsController@index');
    //profile
    Route::get('/dashboard/profile', 'Dashboard\ProfilesController@index');
    Route::post('/dashboard/profile/update', 'Dashboard\ProfilesController@update');
    
    //feedbacks
    Route::get('/dashboard/feedbacks', 'Dashboard\FeedbackController@index');
});



/*
|--------------------------------------------------------------------------
| Site Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'checkifpublic'])->group(function () { 
    Route::get('/site', 'Site\HomeController@index');
    Route::get('/contact', 'Site\HomeController@contactView');
    Route::get('/profile', 'Site\HomeController@profileView');
    Route::post('/feedback/add', 'Site\HomeController@addFeedback');
});
