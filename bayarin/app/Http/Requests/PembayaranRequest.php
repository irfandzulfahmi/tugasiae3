<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PembayaranRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nasabah_id' => 'required|exists:nasabahs,id',
            'nomor_tagihan' => 'required|string',
            'jumlah_tagihan' => 'required|numeric',
            'status_pembayaran' => 'required|string'
        ];
    }
}
