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
            'status',
            'completedPercentage',
            'estimatedFinishTime',
        ];

        // In Car.php model
        public function services()
        {
            return $this->hasMany(Service::class);
        }

        public function customer(): BelongsTo
        {
            return $this->belongsTo(Customer::class);
        }

        // In Car.php model
       // In Car.php model
public function getCompletedPercentageAttribute()
{
    if ($this->services) {
        $totalServices = $this->services->count();
        $completedServices = $this->services->where('status', 'completed')->count();
        $completedPercentage = ($completedServices / $totalServices) * 100;
        return round($completedPercentage, 2); // Round to 2 decimal places
    } else {
        return 0; // or some default value
    }
}

public function getEstimatedFinishTimeAttribute()
{
    if ($this->services) {
        $remainingServices = $this->services->where('status', 'pending')->count();
        $averageServiceTime = 2; // Assume an average service time of 2 hours
        $estimatedFinishTime = now()->addHours($remainingServices * $averageServiceTime);
        return $estimatedFinishTime->format('Y-m-d H:i:s'); // Format as a datetime string
    } else {
        return null; // or some default value
    }
}

}
