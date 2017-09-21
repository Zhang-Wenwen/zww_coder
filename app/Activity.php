<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/19
 * Time: 22:36
 */

namespace App;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected  $table='activities';
    public $timestamps=true;
}