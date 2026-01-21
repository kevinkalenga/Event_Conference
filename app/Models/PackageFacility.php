<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageFacility extends Model
{
    // Each packagefacility must belong to a package 
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
