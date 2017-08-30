<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Milestone extends Model
{
    protected  $table='Milestones';
    public $timestamps=false;
    public function events()
    {
        return $this->hasMany('App\Events','Tid');
    }
}