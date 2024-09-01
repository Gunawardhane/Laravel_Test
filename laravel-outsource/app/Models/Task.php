<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'section_id'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
