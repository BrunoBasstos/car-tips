<?php

namespace App\Models;

use App\Traits\ScopeActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trim extends Model
{
    use HasFactory;
    use ScopeActive;

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
