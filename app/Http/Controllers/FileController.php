<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/21
 * Time: 13:06
 */

namespace App\Http\Controllers;
use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Mockery\Exception;
class FileController extends Controller
{
    public function file_upload($id,Request $request)
    {
        if ($request->file('upload') != null) {
            if ($request->isMethod('POST')) {
                $file = $request->file('upload');
                if ($file->isValid()) {
                    $ext = $file->getClientOriginalExtension();
                    $realpath = $file->getRealPath();
                    $originfile=DB::table('files')->value('pic');
                    $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                    $bool=Storage::disk('public')->put($filename, file_get_contents($realpath));
                    if ($bool)
                    {
                        Storage::disk('public')->delete($originfile);
                    }
                    $path='/storage/app/public/'.$filename;
                    DB::table('file')->where('id', $id)
                        ->update(['pic' => $path]);
                    return redirect('/manager/activities');
                }
            } else abort('哎呀呀，文件上传出错啦，请再试一次吧');
            return redirect(url('/manager/update/activities/').urldecode($id));
        }
    }
    public function file_add(Request $request){

    }

}