<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class LaporanBarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.laporan.barangmasuk');
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
        $dari = request('dari', 'all');
        $sampai = request('sampai', 'all');

        $dari = ($dari === 'all') ? null : $dari;
        $sampai = ($sampai === 'all') ? null : $sampai;

        $data = BarangMasuk::whereBetween('tgl_pembelian', [$dari, $sampai])
            ->get();
        return view('page.laporan.printBarangMasuk')->with([
            'data' => $data
        ]);
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
