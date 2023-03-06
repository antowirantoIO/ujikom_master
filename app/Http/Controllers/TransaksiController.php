<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Konsumen;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\StatusPesanan;
use App\Models\JenisPembayaran;
use Illuminate\Support\Facades\Auth;
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
    public function store(Request $request)
    {
        Transaksi::create([
            'konsumen_id' => $request->konsumen_id,
            'petugas_id' => Auth::user()->id,
            'layanan_id' => $request->layanan_id,
            'jenis_pembayaran_id' => $request->jenis_pembayaran_id,
            'status_pesanan_id' => StatusPesanan::where('nama', 'BARU')->first()->id,
            'no_invoice' => $request->no_invoice,
            'berat' => $request->berat,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
            'status_bayar' => $request->status_bayar,
            'diskon' => $request->diskon,
            'total_bayar' => $request->total_bayar,
            'keterangan' => json_encode([
                'hutang' => $request->hutang,
            ])
        ]);

        return redirect(route('transaksi.index'));
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
    public function update(Request $request, Transaksi $transaksi)
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
