<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'courses';

    // Kolom yang dapat diisi
    protected $fillable = [
        'user_id',
        'subject_id',
        'isApproved',
    ];

    // Relasi dengan Subject
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
