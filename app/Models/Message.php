<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //  each message must belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //  each message must belongs to an admin
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    
}
