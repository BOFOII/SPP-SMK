<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PembayaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nisn' => ['required', 'max:10'],
            'tahun_bayar' => ['required', 'max:4'],
            'bulan_bayar.*' => ['required'],
            'tgl_bayar' => ['required', 'date'],
        ];
    }
}
