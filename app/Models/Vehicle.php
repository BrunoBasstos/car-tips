<?php

namespace App\Models;

use App\Traits\ScopeActive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    use HasFactory;
    use ScopeActive;

    protected $guarded = [];

    protected $appends = ['name', 'vehicleArray'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Model::class);
    }

    public function trim(): BelongsTo
    {
        return $this->belongsTo(Trim::class);
    }

    public function tips(): HasMany
    {
        return $this->hasMany(Tip::class);
    }

    public function getNameAttribute()
    {
        return $this->type->name . ' '
            . $this->model->make->name . ' '
            . $this->model->name . ' '
            . $this->trim?->name . ' ';
    }

    public function getVehicleArrayAttribute()
    {
        return [
            'type'  => $this->type->name,
            'make'  => $this->model->make->name,
            'model' => $this->model->name,
            'trim'  => $this->trim?->name ?: null
        ];
    }
}
