<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $konsumen = Konsumen::where('is_active', 1)->count();

        $status = [
            'BARU' => 0,
            'DIPROSES' => 0,
            'SELESAI' => 0,
        ];

        $transaksi_baru = Transaksi::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->get();

        $income_month = Transaksi::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->sum('total_bayar');

        $income_today = Transaksi::whereDate('created_at', date('Y-m-d'))
            ->sum('total_bayar');

        $chart_data = Transaksi::selectRaw('MONTH(created_at) - 1 as month, SUM(total_bayar) as total')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->get();

        foreach ($transaksi_baru as $transaksi) {
            if ($transaksi->status_pesanan->nama == 'BARU') {
                $status['BARU']++;
            } elseif ($transaksi->status_pesanan->nama == 'DIPROSES') {
                $status['DIPROSES']++;
            } elseif ($transaksi->status_pesanan->nama == 'SELESAI') {
                $status['SELESAI']++;
            }
        }
        
        return view('dashboard', compact('konsumen', 'status', 'income_month', 'income_today', 'chart_data'));
    }
}
