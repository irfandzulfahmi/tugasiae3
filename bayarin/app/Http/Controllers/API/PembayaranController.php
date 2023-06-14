<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PembayaranRequest;
use App\Models\Nasabah;
use App\Models\Tagihan;

class PembayaranController extends Controller
{
    public function bayar(PembayaranRequest $request, $id)
    {
        $nasabah = Nasabah::find($id);

        if (!$nasabah) {
            return response()->json([
                'message' => 'Akun nasabah tidak ditemukan'
            ], 404);
        }

        $tagihan = Tagihan::find($request->input('tagihan_id'));

        if (!$tagihan) {
            return response()->json([
                'message' => 'Tagihan tidak ditemukan'
            ], 404);
        }

        $pembayaran = Pembayaran::create([
            'nasabah_id' => $nasabah->id,
            'tagihan_id' => $tagihan->id,
            'jumlah' => $request->input('jumlah'),
            'keterangan' => $request->input('keterangan')
        ]);

        $tagihan->update([
            'status' => 'Lunas'
        ]);

        return response()->json([
            'message' => 'Pembayaran berhasil',
            'pembayaran' => $pembayaran
        ], 201);
    }

    public function tagihan($id)
    {
        $nasabah = Nasabah::find($id);

        if (!$nasabah) {
            return response()->json([
                'message' => 'Akun nasabah tidak ditemukan'
            ], 404);
        }

        $tagihan = $nasabah->tagihan;

        return response()->json([
            'tagihan' => $tagihan
        ], 200);
    }
}
