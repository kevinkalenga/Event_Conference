<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    public function schedules() 
    {
        // schedules belongs to many
        return $this->belongsToMany(Schedule::class, 'schedule_speaker'); //schedule_speaker pivote table name
    }
}
