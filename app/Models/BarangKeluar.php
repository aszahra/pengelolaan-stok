<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_konsumen',
        'tanggal',
        'keterangan',
        'kd_user',
    ];

    protected $table = 'barang_keluar';

    public function konsumen()
    {
        return $this->belongsTo(Konsumen::class, 'kd_konsumen', 'id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kd_barang', 'id');
    }
}
