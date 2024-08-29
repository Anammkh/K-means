<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarHadir extends Model
{
    use HasFactory;

    protected $table = 'daftar_hadir';

    protected $fillable = [
        'lansia_id',
        'tanggal_kehadiran',
        'status_kehadiran',
    ];

    public function lansia()
    {
        return $this->belongsTo(DataLansia::class, 'lansia_id');
    }
}
