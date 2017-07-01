<?php

namespace Letiady\Http\Requests;

use Letiady\Http\Requests\Request;

class JadwalFormRequest extends Request
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
            'hari' => 'required',
            'semester' => 'required',
            'jam_mulai' => 'required',
            'jam_akhir' => 'required',
            'pengajar' => 'required',
            'kelas' => 'required',
            'tahun_ajaran' => 'required|integer',
            'matpel' => 'required',
        ];
    }
}
