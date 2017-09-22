<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/22
 * Time: 8:56
 */

namespace App;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected  $table='files';
    public $timestamps=false;
}