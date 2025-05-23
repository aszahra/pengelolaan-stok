<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_kategori',
        'nama_barang',
        'kd_kategori',
        'stok',
        'satuan',
    ];

    protected $table = 'barang';

    public function kategoribarang()
    {
        return $this->belongsTo(KategoriBarang::class, 'kd_kategori', 'id');
    }

    public function barangmasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'kd_barang');
    }

    public function barangkeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'kd_barang');
    }

    public function barangmasukDet()
    {
        return $this->hasMany(DetailBarangMasuk::class, 'kd_barang', 'id');
    }

    public function barangkeluarDet()
    {
        return $this->hasMany(DetailBarangKeluar::class, 'kd_barang', 'id');
    }
}
