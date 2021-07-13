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
        'user_id',
        'nama_pemohon',
        'jawatan_pemohon',
        'gred_pemohon',
        'jabatan_pemohon',
        'jenis_tablet',
        'harga_belian',
        'tarikh_belian'
    ];

    // Dapatkan data nama_pemohon dan paparkan semua dalam HURUF BESAR
    public function getNamaPemohonAttribute($value)
    {
        return strtoupper($value);
    }

    public function setJawatanPemohonAttribute($value)
    {
        $this->attributes['jawatan_pemohon'] = strtoupper($value);
    }

    public function user()
    {
        // return $this->belongsTo(User::class, 'user_id', 'id');
        return $this->belongsTo(User::class);
    }
}
