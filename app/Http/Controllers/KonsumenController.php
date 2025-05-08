<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konsumen = Konsumen::paginate(5);
        return view('page.konsumen.index')->with([
            'konsumen' => $konsumen,
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
            'nama_konsumen' => $request->input('nama_konsumen'),
            'no_telp' => $request->input('no_telp'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
        ];

        Konsumen::create($data);

        return redirect()
            ->route('konsumen.index')
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
