<?php

namespace App\Http\Controllers;

use App\Models\JenisPembayaran;
use Illuminate\Http\Request;

class JenisPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = JenisPembayaran::all();

        return view('pembayaran.index', compact('pembayaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        JenisPembayaran::create([
            'nama' => $request->nama,
            'no_rekening' => $request->no_rekening,
            'nama_pemilik' => $request->nama_pemilik, 
        ]);

        return redirect(route('pembayaran.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisPembayaran $jenisPembayaran)
    {
        return response()->json($jenisPembayaran, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisPembayaran $jenisPembayaran)
    {
        $jenisPembayaran->update([
            'nama' => $request->nama,
            'no_rekening' => $request->no_rekening,
            'nama_pemilik' => $request->nama_pemilik, 
        ]);

        return redirect(route('pembayaran.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPembayaran $jenisPembayaran)
    {
        foreach($jenisPembayaran->transaksi as $transaksi){
            $transaksi->delete();
        }

        $jenisPembayaran->delete();

        return redirect(route('pembayaran.index'));
    }
}
