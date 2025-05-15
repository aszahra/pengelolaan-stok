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
        $data = BarangMasuk::paginate(5);
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
        $request->validate([
            'kd_supplier' => 'required',
            'tgl_pembelian' => 'required|date',
            'kd_user' => 'required',
            'barang_id' => 'required|array',
            'barang_id.*' => 'required|exists:barang,id',
            'jumlah' => 'required|array',
            'jumlah.*' => 'required|numeric|min:1',
            'satuan' => 'required|array',
            'satuan.*' => 'required|string',
        ]);

        $barangMasuk = BarangMasuk::create([
            'kd_supplier' => $request->kd_supplier,
            'tgl_pembelian' => $request->tgl_pembelian,
            'status' => $request->status,
            'kd_user' => $request->kd_user,
        ]);

        foreach ($request->barang_id as $index => $barangId) {
            DetailBarangMasuk::create([
                'kd_supplier' => $request->kd_supplier,
                'kd_barang' => $barangId,
                'jumlah' => $request->jumlah[$index],
                'satuan' => $request->satuan[$index],
            ]);
        }

        return redirect()
            ->route('barangmasuk.index')
            ->with('message', 'Data sudah ditambahkan');
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
