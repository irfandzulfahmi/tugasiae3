<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\NasabahRequest;
use App\Models\Nasabah;

class NasabahController extends Controller
{
    public function index()
    {
        $nasabahs = Nasabah::all();

        return response()->json([
            'nasabahs' => $nasabahs
        ], 200);
    }

    public function store(NasabahRequest $request)
    {
        $nasabah = Nasabah::create($request->validated());

        return response()->json([
            'message' => 'Akun nasabah berhasil dibuat',
            'nasabah' => $nasabah
        ], 201);
    }

    public function show($id)
    {
        $nasabah = Nasabah::find($id);

        if (!$nasabah) {
            return response()->json([
                'message' => 'Akun nasabah tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'nasabah' => $nasabah
        ], 200);
    }

    public function update(NasabahRequest $request, $id)
    {
        $nasabah = Nasabah::find($id);

        if (!$nasabah) {
            return response()->json([
                'message' => 'Akun nasabah tidak ditemukan'
            ], 404);
        }

        $nasabah->update($request->validated());

        return response()->json([
            'message' => 'Akun nasabah berhasil diperbarui',
            'nasabah' => $nasabah
        ], 200);
    }

    public function destroy($id)
    {
        $nasabah = Nasabah::find($id);

        if (!$nasabah) {
            return response()->json([
                'message' => 'Akun nasabah tidak ditemukan'
            ], 404);
        }

        $nasabah->delete();

        return response()->json([
            'message' => 'Akun nasabah berhasil dihapus'
        ], 200);
    }
}
