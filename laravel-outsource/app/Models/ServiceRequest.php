<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class ServiceRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_id',

    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function jobs(): BelongsToMany
    {
        return $this->belongsToMany(Job::class);
    }

}
