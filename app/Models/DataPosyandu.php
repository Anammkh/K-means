<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DataLansia;

class DataPosyandu extends Model
{
    use HasFactory;

    protected $table = 'data_posyandu';

    protected $fillable = [
        'lansia_id',
        'tinggi_badan',
        'berat_badan',
        'lingkar_pinggang',
        'tekanan_darah',
        'gula_darah',
        'keluhan',
    ];

    public function lansia()
    {
        return $this->belongsTo(DataLansia::class,'lansia_id');
    }
}

