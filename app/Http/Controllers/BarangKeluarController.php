<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\DetailBarangKeluar;
use App\Models\Konsumen;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BarangKeluar::paginate(5);
        return view('page.barangkeluar.index')->with([
            'data' => $data,
        ]);
        return view('page.barangkeluar.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        $konsumen = Konsumen::all();
        return view('page.barangkeluar.create')->with([
            'barang' => $barang,
            'konsumen' => $konsumen
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $barangKeluar = BarangKeluar::create([
            'kd_konsumen' => $request->input('kd_konsumen'),
            'tanggal' => $request->input('tanggal'),
            'keterangan' => $request->input('keterangan'),
            'id_user' => $request->input('id_user')
        ]);

        $kd_barang = $request->input('kd_barang');
        $jumlah = $request->input('jumlah');
        $satuan = $request->input('satuan');
        $stok = $request->input('stok');

        for ($i = 0; $i < count($kd_barang); $i++) {
            DetailBarangKeluar::create([
                'kd_barang_keluar' => $barangKeluar->id,
                'kd_barang' => $kd_barang[$i],
                'jumlah' => $jumlah[$i],
                'satuan' => $satuan[$i],
                'stok' => $stok[$i]
            ]);

            $barang = Barang::find($kd_barang[$i]);
            if ($barang) {
                $barang->stok -= $jumlah[$i];
                $barang->save();
            }
        }

        return redirect()->route('barangmasuk.index')->with('message', 'Data sudah ditambahkan dan stok barang diperbarui');
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
