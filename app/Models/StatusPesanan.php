<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatusPesanan extends Model
{
    use HasFactory;

    protected $table = 'status_pesanan';
    protected $guarded = ['id'];

    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class);
    }
}
