<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nim',
        'nama',
        'prodi',
        'email',
        'nohp',
    ];
}
