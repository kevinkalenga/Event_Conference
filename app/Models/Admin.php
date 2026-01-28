<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Admin extends  Authenticatable
{
    protected $fillable = [
        'token',    // ← AJOUT IMPORTANT
    ];

    public function messages()
    {
       // A user can have multiple message 
       return $this->hasMany(Message::class);
    }
}
