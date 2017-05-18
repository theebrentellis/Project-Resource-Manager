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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['web']], function(){
    Route::get('home', 'HomeController@index');

    Route::get('settings', 'Settings\SettingsController@index');

    Route::get('projects', 'Projects\ProjectController@index');

    Route::post('projects', 'Projects\AddNewProjectController@addNew');

    Route::get('timecards', 'Timecards\TimecardController@index');

    Route::post('timecards/{id}/edit', 'Timecards\TimecardController@edit');

    Route::get('project/{id}/show', 'Projects\ShowProjectController@showProject');

    Route::get('project/{id}/edit', 'Projects\EditProjectController@showProject');

    Route::post('project/edit', 'Projects\EditProjectController@editProject');

    Route::get('project/{id}/addProjectDeveloper', 'Projects\EditProjectController@addDeveloper');

    Route::post('project/{id}/addProjectDeveloper', 'Projects\ProjectController@addNewDeveloper');

    Route::get('developer/{id}/show', 'Developers\ShowDeveloperController@showDev');

    Route::post('assignTask', 'Projects\AssignTaskController@addTask');

});

Route::group([
    'prefix' => 'api',
    'namespace' => 'API'
], function(){
    Route::resource('projectDueDates', 'DueDatesCalendarController');
    Route::resource('developerSchedules', 'CalendarController@developerSchedules');

    Route::resource('developers', 'DevelopersController');
    
    Route::resource('projects', 'ProjectsController');
    
    Route::resource('users', 'UserController');

    Route::resource('roles', 'RoleController');
    
    Route::resource('timecards', 'TimeCardController');
});


