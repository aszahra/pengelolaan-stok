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
            'kd_user' => $request->input('kd_user')
        ]);

        $kd_barang = $request->input('kd_barang');
        $jumlah = $request->input('jumlah');
        $satuan = $request->input('satuan');

        for ($i = 0; $i < count($kd_barang); $i++) {
            DetailBarangKeluar::create([
                'id_barang_keluar' => $barangKeluar->id,
                'kd_barang' => $kd_barang[$i],
                'jumlah' => $jumlah[$i],
                'satuan' => $satuan[$i],
            ]);
        }

        return redirect()->route('barangkeluar.index')->with('message', 'Data sudah ditambahkan');
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
