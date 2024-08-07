<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
