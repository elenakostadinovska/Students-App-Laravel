<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'detail',
        'image_upload',
        'university_id', // Add university_id to the fillable array
    ];

    /**
     * Get the university that owns the student.
     */
    public function university()
    {
        return $this->belongsTo(University::class); // Define the relationship with the University model
    }
}
