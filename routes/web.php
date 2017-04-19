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
    return redirect('login');
});

Auth::routes();

Route::group(['middleware' => ['web']], function(){
    Route::get('/home', 'HomeController@index');

    Route::get('projects', 'Projects\ProjectController@index');

    Route::post('projects', 'Projects\AddNewProjectController@addNew');

    Route::get('project/{id}/show', 'Projects\ShowProjectController@showProject');

    Route::get('project/{id}/edit', 'Projects\EditProjectController@showProject');

    Route::post('project/edit', 'Projects\EditProjectController@editProject');

    Route::get('project/{id}/addProjectDeveloper', 'Projects\EditProjectController@addDeveloper');

    Route::post('project/{id}/addProjectDeveloper', 'Projects\ProjectController@addNewDeveloper');

    Route::get('developer/{id}/show', 'Developers\ShowDeveloperController@showDev');

    Route::post('assignTask', 'Projects\AssignTaskController@addTask');

    // Route::get('calendar', 'CalendarController@index');
});

Route::group([
    'prefix' => 'api',
    'namespace' => 'API'
], function(){
    Route::resource('projectDueDates', 'DueDatesCalendarController');
    Route::resource('developerSchedules', 'CalendarController@developerSchedules');
    Route::resource('allProjects', 'ProjectsController');
    Route::resource('allDevelopers', 'DevelopersController');
    Route::resource('assignTask', 'ProjectsController@addTask');
});


