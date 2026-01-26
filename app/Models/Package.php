<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    public function facilities()
    {
        // A package has many facilities
        return $this->hasMany(PackageFacility::class);
    }

    public function tickets()
    {
        // Each package has multiple tickets
        return $this->hasMany(Ticket::class);
    }
}
