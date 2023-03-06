<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanan = Layanan::all();

        return view('layanan.index', compact('layanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Layanan::create([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'lama_hari' => $request->lama_hari,
            'satuan' => $request->satuan,
        ]);

        return redirect(route('layanan.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Layanan $layanan)
    {
        return response()->json($layanan, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layanan $layanan)
    {
        $layanan->update([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'lama_hari' => $request->lama_hari,
            'satuan' => $request->satuan,
        ]);

        return redirect(route('layanan.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layanan $layanan)
    {
        foreach($layanan->transaksi as $transaksi)
        {
            $transaksi->delete();
        }

        $layanan->delete();

        return redirect(route('layanan.index'));
    }
}
