<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'matakuliah',
        'sks',
        'dosen',
        'hari',
        'pukul',
        'kelas',
        'ruang',
        'jurusan',
        'keterangan'
    ];
}
