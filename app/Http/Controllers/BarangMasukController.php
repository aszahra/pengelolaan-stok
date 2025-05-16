<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\DetailBarangMasuk;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BarangMasuk::paginate(10);
        return view('page.barangmasuk.index')->with([
            'data' => $data,
        ]);
        return view('page.barangmasuk.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('page.barangmasuk.create')->with([
            'supplier' => $supplier,
            'barang' => $barang,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $barangMasuk = BarangMasuk::create([
            'kd_supplier' => $request->input('kd_supplier'),
            'tgl_pembelian' => $request->input('tgl_pembelian'),
            'kd_user' => $request->input('kd_user')
        ]);

        $kd_barang = $request->input('kd_barang');
        $jumlah = $request->input('jumlah');
        $satuan = $request->input('satuan');
        $stok = $request->input('stok'); 

        for ($i = 0; $i < count($kd_barang); $i++) {
            DetailBarangMasuk::create([
                'id_barang_masuk' => $barangMasuk->id,
                'kd_barang' => $kd_barang[$i],
                'jumlah' => $jumlah[$i],
                'satuan' => $satuan[$i],
                'stok' => $stok[$i] 
            ]);

            $barang = Barang::find($kd_barang[$i]);
            if ($barang) {
                $barang->stok += $jumlah[$i];
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
