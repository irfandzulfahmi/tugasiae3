<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $fillable = ['nasabah_id', 'nomor_tagihan', 'jumlah_tagihan', 'status_pembayaran'];

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class);
    }
}
