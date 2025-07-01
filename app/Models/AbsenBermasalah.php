<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenBermasalah extends Model
{
    use HasFactory;

    protected $table = 'absen_bermasalah';

    protected $fillable = [
        'no_keterangan',
        'keterangan',
        'lokasi_kampus',
        'tanggal_awal',
        'tanggal_akhir',
        'shift_kerja',
        'kondisi',
        'petugas_input',
    ];

    protected $casts = [
        'kondisi' => 'array',
        'tanggal_awal' => 'date',
        'tanggal_akhir' => 'date',
    ];
} 