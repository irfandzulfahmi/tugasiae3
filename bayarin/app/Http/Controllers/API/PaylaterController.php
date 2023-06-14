<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Paylater;
use App\Models\Nasabahs;
use Exception;
use Illuminate\Http\Request;

class PaylaterController extends Controller
{
    /**
     * Menyimpan Paylater baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_nasabahs' => 'required',
            'NIK' => 'required',
        ]);

        $paylater = new \App\Models\Paylater;
        $paylater->id_nasabahs = $request->id_nasabahs;
        $paylater->NIK = $request->NIK;
        $paylater->save();

        return response()->json(['message' => 'paylater berhasil disimpan'], 201);
    }

    /**
     * Menampilkan rating, id_pembeli, dan nama_pembeli.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $paylaters = \App\Models\Paylater::select('NIK', 'id_nasabahs')
                ->with('nasabahs:id,nama')
                ->get();

            return response()->json(['paylaters' => $paylaters], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat mengambil data'], 500);
        }
    }
}
