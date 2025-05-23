<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori',
    ];

    protected $table = 'kategori_barang';

    public function barang()
    {
        return $this->hasMany(Barang::class, 'kd_kategori');
    }
}
