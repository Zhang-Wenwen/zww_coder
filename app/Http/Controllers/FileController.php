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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;
class FileController extends Controller
{
    public function file_update($id,Request $request)
    {
        if ($request->file('upload') != null) {
            if ($request->isMethod('POST')) {
                $file = $request->file('upload');
                if ($file->isValid()) {
                    $this->validate($request,[
                        'file'=>'max:557*342',
                    ]);
                    $ext = $file->getClientOriginalExtension();
                    $realpath = $file->getRealPath();
                    $originfile=DB::table('files')->value('pic');
                    $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                    $bool=Storage::disk('public')->put($filename, file_get_contents($realpath));
                    if ($bool)
                    {
                        Storage::disk('public')->delete($originfile);
                    }
                    $path='/storage/'.$filename;
                    DB::table('files')->where('id', $id)
                        ->update(['pic' => $path]);
                }
            }
            return response()->json([
                'success' => true,
                'file' =>$path,
                'info' => $file,
            ]);
        }
    }
    public function file_add(Request $request){
        if ($request->file('upload') != null) {
            if ($request->isMethod('POST')) {
                $file = $request->file('upload');
                if ($file->isValid()) {
                    $this->validate($request,[
                        'file'=>'max:557*342',
                    ]);
                    $ext = $file->getClientOriginalExtension();
                    $realpath = $file->getRealPath();
                    $originfile=DB::table('files')->value('pic');
                    $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                    $bool=Storage::disk('public')->put($filename, file_get_contents($realpath));
                    if ($bool)
                    {
                        Storage::disk('public')->delete($originfile);
                    }
                    $path='/storage/'.$filename;
                    DB::table('files')
                        ->insert(['pic' => $path]);
                }
            }
            return response()->json([
                'success' => true,
                'file' =>$path,
                'info' => $file,
            ]);
        }
    }

}