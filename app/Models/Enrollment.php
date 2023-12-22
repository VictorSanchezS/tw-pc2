<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'level',
        'semester'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    
}
