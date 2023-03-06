<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function transaksi()
    {
        return view('laporan.transaksi');
    }

    public function transaksi_ajax(Request $request)
    {
        $transaksi = Transaksi::whereBetween('tanggal_masuk', [$request->start_date, $request->end_date])->get();

        $data = [];
        foreach ($transaksi as $key => $value) {
            $data[$key]['no'] = $key + 1;
            $data[$key]['no_invoice'] = $value->no_invoice;
            $data[$key]['konsumen'] = $value->konsumen->nama;
            $data[$key]['layanan'] = $value->layanan->nama;
            $data[$key]['tanggal_masuk'] = $value->tanggal_masuk;
            $data[$key]['status_bayar'] = $value->status_bayar ? 'Lunas' : 'Belum Lunas';
            $data[$key]['diskon'] = $value->diskon;
            $data[$key]['total_bayar'] = $value->total_bayar;
        }

        return response()->json($data);
    }
}
