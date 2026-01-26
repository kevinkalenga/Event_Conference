<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function package()
    {
        // Each ticket belongs to any package 
        return $this->belongsTo(Package::class);
    }
    public function user()
    {
        //  Ticket belongs to a user
        return $this->belongsTo(User::class);
    }
}
