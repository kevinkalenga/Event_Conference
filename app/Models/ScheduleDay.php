<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleDay extends Model
{
    //each schedule days has many schedule 
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
