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


Auth::routes();

Route::get('/', 'HomeController@index')->name('index');

Route::group(['middleware' => ['auth', 'web']], function(){

    Route::get('/app/{any?}', 'HomeController@app')->name('app');

    Route::get('settings', 'Settings\SettingsController@index')->name('settings');
    Route::post('settings', 'Settings\SettingsController@update');

    // Route::get('projects', 'Projects\ProjectController@index')->name('projects');
    // Route::post('projects', 'Projects\AddNewProjectController@addNew');

    // Route::get('timecards', 'Timecards\TimecardController@index')->name('timecards');
    // Route::post('timecards/{id}/edit', 'Timecards\TimecardController@edit');
    // Route::post('timecards/{id}/delete', 'Timecards\TimecardController@delete');

    // Route::get('project/{id}/show', 'Projects\ShowProjectController@showProject');
    // Route::get('project/{id}/edit', 'Projects\EditProjectController@showProject');
    // Route::post('project/{id}/edit', 'Projects\EditProjectController@editProject');

    // Route::get('project/{id}/addProjectDeveloper', 'Projects\EditProjectController@addDeveloper');
    // Route::post('project/{id}/addProjectDeveloper', 'Projects\ProjectController@addNewDeveloper');

    // Route::get('developer/{id}/show', 'Developers\ShowDeveloperController@showDev');

});

// Route::group([
//     'prefix' => 'api',
//     'namespace' => 'API'
// ], function(){
    
//     Route::resource('projectDueDates', 'DueDatesCalendarController');
//     Route::resource('developerSchedules', 'CalendarController@developerSchedules');

//     Route::resource('developers', 'DevelopersController');
    
//     Route::resource('projects', 'ProjectsController');
    
//     Route::resource('users', 'UserController');

//     Route::resource('roles', 'RoleController');
    
//     Route::resource('timecards', 'TimeCardController');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
