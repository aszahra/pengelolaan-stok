<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBarangKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_barang_keluar',
        'kd_barang',
        'jumlah',
        'satuan',
        'stok',
    ];

    protected $table = 'detail_barang_keluar';

    public function barangKeluar()
    {
        return $this->belongsTo(BarangKeluar::class, 'kd_barang_keluar', 'id');
    }
}
