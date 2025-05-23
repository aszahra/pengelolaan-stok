<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailBarangKeluar;
use App\Models\DetailBarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.laporan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dari = $request->input('dari', 'all');
        $sampai = $request->input('sampai', 'all');

        $dari = ($dari === 'all') ? null : $dari;
        $sampai = ($sampai === 'all') ? now()->toDateString() : $sampai;

        $barangs = Barang::all();

        $laporan = [];

        foreach ($barangs as $barang) {
            $stokAwalMasuk = DetailBarangMasuk::where('kd_barang', $barang->id)
                ->when($dari, function ($query, $dari) {
                    $query->whereHas('barangMasuk', function ($q) use ($dari) {
                        $q->where('tgl_pembelian', '<', $dari);
                    });
                })
                ->sum('jumlah');

            $stokAwalKeluar = DetailBarangKeluar::where('kd_barang', $barang->id)
                ->when($dari, function ($query, $dari) {
                    $query->whereHas('barangKeluar', function ($q) use ($dari) {
                        $q->where('tanggal', '<', $dari);
                    });
                })
                ->sum('jumlah');

            $stokAwal = $stokAwalMasuk - $stokAwalKeluar;

            $masuk = DetailBarangMasuk::where('kd_barang', $barang->id)
                ->when($dari, function ($query, $dari) {
                    $query->whereHas('barangMasuk', function ($q) use ($dari) {
                        $q->where('tgl_pembelian', '>=', $dari);
                    });
                })
                ->whereHas('barangMasuk', function ($q) use ($sampai) {
                    $q->where('tgl_pembelian', '<=', $sampai);
                })
                ->sum('jumlah');

            $keluar = DetailBarangKeluar::where('kd_barang', $barang->id)
                ->when($dari, function ($query, $dari) {
                    $query->whereHas('barangKeluar', function ($q) use ($dari) {
                        $q->where('tanggal', '>=', $dari);
                    });
                })
                ->whereHas('barangKeluar', function ($q) use ($sampai) {
                    $q->where('tanggal', '<=', $sampai);
                })
                ->sum('jumlah');

            $stokAkhir = $stokAwal + $masuk - $keluar;

            $laporan[] = [
                'nama_barang' => $barang->nama_barang,
                'stok_awal' => $stokAwal,
                'barang_masuk' => $masuk,
                'barang_keluar' => $keluar,
                'stok_akhir' => $stokAkhir,
            ];
        }

        return view('page.laporan.print', compact('laporan'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
