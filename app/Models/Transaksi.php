<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $guarded = ['id'];

    public function konsumen(): BelongsTo
    {
        return $this->belongsTo(Konsumen::class);
    }

    public function petugas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class);
    }

    public function jenis_pembayaran(): BelongsTo
    {
        return $this->belongsTo(JenisPembayaran::class);
    }

    public function status_pesanan(): BelongsTo
    {
        return $this->belongsTo(StatusPesanan::class);
    }
}
