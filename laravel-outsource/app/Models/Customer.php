<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

// In your Customer model
protected $table = 'customers';
    protected $fillable = [
        'nic', 'name', 'email', 'phone', 'address', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
