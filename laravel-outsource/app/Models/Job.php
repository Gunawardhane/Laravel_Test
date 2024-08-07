<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'car_job');
    }

    public function serviceRequests(): BelongsToMany{
        return $this->belongsToMany(ServiceRequest::class);
    }
}
