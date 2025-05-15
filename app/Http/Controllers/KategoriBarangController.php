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
        return view('page.kategoribarang.index')->with([
            'kategoribarang' => $kategoribarang,
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
    public function update(Request $request, string $id)
    {
        $data = [
            'nama_kategori' => $request->input('nama_kategori'),
        ];

        $datas = KategoriBarang::findOrFail($id);
        $datas->update($data);

        // return back()->with('message_delete', 'Data Jabatan Sudah di update');

        return redirect()
            ->route('kategoribarang.index')
            ->with('message_update', 'Data Barang Sudah di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = KategoriBarang::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Barang Sudah dihapus');
    }
}
