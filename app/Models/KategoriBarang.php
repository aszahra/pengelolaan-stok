<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'kd_kategori',
        'nama_kategori',
    ];

    protected $table = 'kategoribarang';

    // protected $primaryKey = 'kd_kategori';
    // public $incrementing = false; // kalau kd_kategori bukan auto-increment
    // protected $keyType = 'string'; // kalau kd_kategori berupa string seperti 'KTGR00001'

    // public static function createCode()
    // {
    //     $latestCode = self::orderBy('kd_kategori', 'desc')->value('kd_kategori');
    //     $latestCodeNumber = intval(substr($latestCode, 4));
    //     $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
    //     $formattedCodeNumber = sprintf("%03d", $nextCodeNumber);
    //     return 'KTGR' . $formattedCodeNumber;
    // }

    public function barang()
    {
        return $this->hasMany(Barang::class, 'kd_kategori');
    }
}
