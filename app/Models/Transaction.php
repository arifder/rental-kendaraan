<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
            'merk_mobil',
            'tgl_peminjaman',
            'tgl_kembalian',
            'penanggung_jawab',
            'no_tlp',
            'jmlh_hari',
            'total'
            
    ];
}
