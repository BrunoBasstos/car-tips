<?php

namespace App\Models;

use App\Traits\ScopeActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    use HasFactory;
    use ScopeActive;

    protected $guarded = [];

    public function models()
    {
        return $this->hasMany(\App\Models\Model::class);
    }
}
