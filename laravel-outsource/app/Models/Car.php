<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_number',
        'model',
        'fuel_type',
        'transmission',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
        public function jobs()
    {
        return $this->belongsToMany(Job::class, 'car_job');
    }

    public function serviceRequests(): HasMany
    {
        return $this->hasMany(ServiceRequest::class);
    }

}
