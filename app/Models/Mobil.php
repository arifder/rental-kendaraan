<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'merk',
        'thn_keluar',
        'biaya_sewa',
        'no_plat',
         'jenis',
         'gambar'
    ];
}
