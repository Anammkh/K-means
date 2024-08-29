<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLansia extends Model
{
    use HasFactory;

    protected $table = 'data_lansia';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'nama',
        'umur',
        'kemampuan_berjalan',
        'riwayat_penyakit',
        'jumlah_anggota_keluarga',
        'status_pekerjaan',
        'penghasilan_perbulan',
    ];
    public function dataPosyandu()
    {
        return $this->hasMany(DataPosyandu::class, 'lansia_id');
    }
}
