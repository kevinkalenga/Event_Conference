<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
      //each schedule belongs to a scheduleDay 
    public function schedule_day()
    {
        return $this->belongsTo(ScheduleDay::class);
    }

    public function speakers()
    {
        return $this->belongsToMany(Speaker::class, 'schedule_speaker');
    }
}
