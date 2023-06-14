<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NasabahRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama' => 'required',
            'tahun_lahir' => 'required|numeric',
            'no_telp' => 'required',
            'email' => 'required|email|unique:nasabahs,email'
        ];
    }
}
