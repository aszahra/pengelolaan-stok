<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::paginate(5);
        return view('page.supplier.index')->with([
            'supplier' => $supplier,
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
            'nama_supplier' => $request->input('nama_supplier'),
            'alamat' => $request->input('alamat'),
        ];

        Supplier::create($data);

        return redirect()
            ->route('supplier.index')
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
            'nama_supplier' => $request->input('nama_supplier'),
            'alamat' => $request->input('alamat'),
        ];

        $datas = Supplier::findOrFail($id);
        $datas->update($data);

        // return back()->with('message_delete', 'Data Jabatan Sudah di update');

        return redirect()
            ->route('barang.index')
            ->with('message_update', 'Data Barang Sudah di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Supplier::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Barang Sudah dihapus');
    }
}
