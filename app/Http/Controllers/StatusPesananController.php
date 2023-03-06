<?php

namespace App\Http\Controllers;

use App\Models\StatusPesanan;
use Illuminate\Http\Request;

class StatusPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = StatusPesanan::all();

        return view('status.index', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        StatusPesanan::create([
            'nama' => $request->nama,
        ]);

        return redirect(route('status.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(StatusPesanan $statusPesanan)
    {
        return response()->json($statusPesanan, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StatusPesanan $statusPesanan)
    {
        $statusPesanan->update([
            'nama' => $request->nama,
        ]);

        return redirect(route('status.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatusPesanan $statusPesanan)
    {
        foreach($statusPesanan->transaksi as $transaksi){
            $transaksi->delete();
        }

        $statusPesanan->delete();

        return redirect(route('status.index'));
    }
}
