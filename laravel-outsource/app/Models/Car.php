<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

        protected $fillable = [
            'registration_number',
            'model',
            'fuel_type',
            'transmission',
            'customer_id',
        ];

        public function customer(): BelongsTo
        {
            return $this->belongsTo(Customer::class);
        }

}
