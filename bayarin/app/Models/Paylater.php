<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paylater extends Model
{
    protected $table = 'paylater';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_nasabahs',
        'NIK',
    ];

    public function nasabahs()
    {
        return $this->belongsTo(Nasabah::class, 'id_nasabahs');
    }
}
