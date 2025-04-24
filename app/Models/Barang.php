<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_barang',
        'kd_kategori',
        'nama_barang',
        'stok',
    ];

    protected $table = 'barang';
}
