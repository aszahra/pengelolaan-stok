<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_konsumen',
        'kd_barang',
        'tanggal',
        'keterangan',
        'id_user',
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

    public function barangKeluar()
    {
        return $this->hasMany(DetailBarangKeluar::class, 'kd_barang_keluar');
    }

    public function detailbarangkeluar()
    {
        return $this->hasMany(DetailBarangKeluar::class, 'kd_barang_keluar');
    }
}
