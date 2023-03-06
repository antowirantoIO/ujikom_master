<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Konsumen;
use App\Models\Transaksi;
use App\Models\StatusPesanan;
use App\Models\JenisPembayaran;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::all();

        return view('transaksi.index',compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $konsumen = Konsumen::where('is_active', 1)->get();
        $layanan = Layanan::all();
        $status = StatusPesanan::all();
        $pembayaran = JenisPembayaran::all();

        return view('transaksi.create', compact('konsumen', 'layanan', 'status', 'pembayaran'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
