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
Route::group(['middleware'=>['web']],function () {
    Route::get('/member', 'CoderController@member');

    Route::get('/personal_info', 'CoderController@personal_info');

    Route::get('/project', 'CoderController@project');

    Route::get('/message_board', 'CoderController@message_board');
    Route::get('/milestones', 'CoderController@milestones');
    Route::get('/introduce', 'CoderController@introduce');

    Route::get('/form', function () {
        return view('form');
    });

    Route::post('/form', 'CoderController@form');
});
    Route::group(['middleware'=>['auth'], 'prefix'=>'manager'],function () {
         Route::get('/','ManagerController@index');

        Route::get('/home','ManagerController@index');

        Route::get('/message_board', 'ManagerController@message');

        Route::get('/team','ManagerController@team');

        Route::get('/delete_np/{table}/{id}', 'ManagerController@delete_np');

        Route::get('/delete/{table}/{id}', 'ManagerController@delete');

        Route::get('/update_team/{id}', 'ManagerController@update_team');

        Route::get('/update_member/{id}', 'ManagerController@update_member');

        Route::get('/add/{table}', 'ManagerController@add_view');

        Route::post('/add/{table}', 'ManagerController@add');

        Route::post('/add_np/{table}', 'ManagerController@add_np');

        Route::get('/member', 'ManagerController@member');

        Route::get('/update/{table}/{id}', 'ManagerController@update_view');

        Route::post('/update/{table}/{id}', 'ManagerController@update');

        Route::get('/milestones', 'ManagerController@milestones');

        Route::get('/projects', 'ManagerController@projects');

        Route::get('/Aregister', 'RegisterController@register');

        Auth::routes();
    });

