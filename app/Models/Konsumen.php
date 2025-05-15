<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_konsumen',
        'alamat',
        'no_telp',
        'email',
    ];

    protected $table = 'konsumen';

    public function barangkeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'kd_konsumen');
    }
}
