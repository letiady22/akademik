<?php

namespace Letiady\Http\Requests;

use Letiady\Http\Requests\Request;

class GuruFormRequest extends Request
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
            'NIP' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required|date_format:Y-m-d',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'email' => 'email',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'jabatan' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        $req = 'wajib di isi.';
        return [
            'NIP.required' => 'NIP '.$req,
            'nama.required' => 'Nama '.$req,
            'tanggal_lahir' => 'Tanggal lahir '.$req,
            'tanggal_lahir.date_format' => 'Format tahun harus yyyy-mm-dd',
        ];
    }
}
