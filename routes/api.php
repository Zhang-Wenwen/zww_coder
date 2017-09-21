<?php

use Illuminate\Http\Request;
use App\Http\Middleware\Core;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>['Core']],function () {
    Route::get('/member', 'CoderController@member');

    Route::get('/personal_info', 'CoderController@personal_info');

    Route::get('/project', 'CoderController@project');

    Route::get('/message_board', 'CoderController@message_board');
    Route::get('/milestones', 'CoderController@milestones');
    Route::get('/introduce', 'CoderController@introduce');
    Route::get('/Qrcode', 'CoderController@Qrcode');
    Route::get('/advertise', 'CoderController@advertise');
    Route::get('/form', function () {
        return view('form');
    });

    Route::post('/form', 'CoderController@form');
});