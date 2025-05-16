<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBarangKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_barang',
        'jumlah',
        'satuan',
        'stok',
    ];

    protected $table = 'detail_barang_keluar';
}
