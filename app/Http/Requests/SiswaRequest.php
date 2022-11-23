<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
                'nis' => ['required'],
                'nama' => ['required', 'max:35'],
                'kelas_id' => ['required'],
                'alamat' => ['required'],
                'no_telp' => ['required', 'max:13'],
                'spp_id' => ['required'],
        ];
    }
}
