<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBarangMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_barang_masuk',
        'kd_barang',
        'jumlah',
        'satuan',
        'stok',
    ];

    protected $table = 'detail_barang_masuk';

    public function barangMasuk()
    {
        return $this->belongsTo(BarangMasuk::class, 'kd_barang_masuk', 'id');
    }
}
