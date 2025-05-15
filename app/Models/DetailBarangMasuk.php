<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBarangMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'jenis',
        'satuan',
        'jumlah',
    ];

    protected $table = 'detail_barang_masuk';
}
