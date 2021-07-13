<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    // Declare nama table yang digunakan dan bukan mengikut ejaan plural
    // protected $table = 'permohonan';

    protected $fillable = [
        'nama_pemohon',
        'jawatan_pemohon',
        'gred_pemohon',
        'jabatan_pemohon',
        'jenis_tablet',
        'harga_belian',
        'tarikh_belian'
    ];
}
