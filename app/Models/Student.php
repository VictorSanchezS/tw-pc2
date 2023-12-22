<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_persona',
        'carrier',
        'faculty'
    ];

    public function products()
    {
        return $this->hasMany(Enrollment::class);
    }
}
