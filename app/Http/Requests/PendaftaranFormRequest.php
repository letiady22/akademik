<?php

namespace Letiady\Http\Requests;

use Letiady\Http\Requests\Request;

class PendaftaranFormRequest extends Request
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
            'no_reg' => 'required',
            'nama' => 'required',
            'asal_sekolah' => 'required',
            'no_ijazah' => 'required',
            'nem' => 'required',
            'nilai_un' => 'required',
            'tahun_lulus' => 'required|integer',
            'tahun_ajar' => 'required|integer'
        ];
    }
}
