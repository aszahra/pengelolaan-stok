<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_supplier',
        'tgl_pembelian',
        // 'status',
    ];

    protected $table = 'barang_masuk';

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'kd_supplier', 'id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kd_barang', 'id');
    }

    public function barangMasuk()
    {
        return $this->hasMany(DetailBarangMasuk::class, 'kd_barang_masuk');
    }

    public function detailbarangmasuk()
    {
        return $this->hasMany(DetailBarangMasuk::class, 'kd_barang_masuk');
    }
}
