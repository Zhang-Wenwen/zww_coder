<?php
use App\Http\Middleware\Core;
use Illuminate\Support\Facades\DB;
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

    Route::get('/activity','CoderController@activity');

    Route::get('/activity_detail/{id}','CoderController@activity_detail');

    Route::get('/',function(){
        return 'welcome';
    });


});
Route::group(['middleware'=>['auth'], 'prefix'=>'manager'],function () {
    Route::get('/','ManagerController@index');

    Route::get('/home','ManagerController@index');

    Route::get('/message_board/{type}', 'ManagerController@message');

    Route::get('/pass/message_board/{id}', 'ManagerController@message_pass');

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

    Route::get('/Aregister', function (){
        return view('auth.register');
    });

    Route::post('/Aregister', 'RegisterController@register');

    Route::get('/add_Qrcode', function (){
        return view('Manager.add_Qrcode');
    });

    Route::post('/add_Qrcode', 'ManagerController@add_Qrcode');

    Route::get('/Qrcode', 'ManagerController@Qrcode');

    Route::get('/delete_Qrcode/{id}', 'ManagerController@delete_Qrcode');

    Route::get('/advertise', 'ManagerController@advertise');
    Route::get('/add_advertise', function (){
        return view('Manager.add_advertise');
    });
    Route::get('/activities', function (){
        $activities=DB::table('activities')->paginate(4);
        return view('Manager.activities',[
            'activities'=>$activities
        ]);
    });
    Route::get('/add_activities', function (){
        return view('Manager.add_activities');
    });
    Route::get('/update_activities/{id}', function ($id){
        $activities=DB::table('activities')->where('id',$id)->first();
        return view('Manager.update_activities',[
            'activities'=>$activities
        ]);
    });
    Route::post('/file_update/{id}','FileController@file_update');

    Route::post('/file_add','FileController@file_add');

});

Auth::routes();