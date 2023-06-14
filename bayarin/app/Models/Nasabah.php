<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    protected $table = 'nasabahs'; // Nama tabel di database

    protected $fillable = [
        'nama',
        'tahun_lahir', 
        'no_telp', 
        'email'
        // Kolom-kolom lain yang dapat diisi
    ];

    // Definisikan relasi atau method lain jika diperlukan
}
