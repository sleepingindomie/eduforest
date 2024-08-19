<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'course_id', 'score'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

