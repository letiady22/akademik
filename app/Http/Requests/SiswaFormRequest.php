<?php

namespace Letiady\Http\Requests;

use Letiady\Http\Requests\Request;

class SiswaFormRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'NIS' => 'required',
            'nama' => 'required',
            'tanggal_pendidikan' => 'required|date_format:Y-m-d',
            'tanggal_lahir' => 'required|date_format:Y-m-d',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'email' => 'email',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nama_wali' => 'required',
        ];
    }
}
