<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoribarang = KategoriBarang::paginate(5);
        $kd_kategori = KategoriBarang::createCode();
        return view('page.kategoribarang.index', compact('kd_kategori'))->with([
            'kategoribarang' => $kategoribarang,
            'kd_kategori' => $kd_kategori,
        ]);
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
        $data = [
            'kd_kategori' => $request->input('kd_kategori'),
            'nama_kategori' => $request->input('nama_kategori'),
        ];

        KategoriBarang::create($data);

        return redirect()
            ->route('kategoribarang.index')
            ->with('message_insert', 'Data Departemen Sudah ditambahkan');
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
    public function update(Request $request, string $kd_kategori)
    {
        $data = [
            'kd_kategori' => $request->input('kd_kategori'),
            'nama_kategori' => $request->input('nama_kategori')
        ];

        $datas = KategoriBarang::findOrFail($kd_kategori);
        $datas->update($data);

        return redirect()
            ->route('kategoribarang.index')
            ->with('message_update', 'Data kategori barang sudah di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kd_kategori)
    {
        $data = KategoriBarang::findOrFail($kd_kategori);
        $data->delete();
        return back()->with('message_delete', 'Data Kategori Barang Sudah dihapus');
    }
}
