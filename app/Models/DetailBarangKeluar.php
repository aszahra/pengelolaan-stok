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
        'status',
    ];

    protected $table = 'detail_barang_masuk';
}
