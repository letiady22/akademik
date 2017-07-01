<?php

namespace Letiady\Http\Requests;

use Letiady\Http\Requests\Request;

class KelasFormRequest extends Request
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
            'nama_kelas' => 'required',
            'wali_kelas' => 'required',
            'tahun_ajaran' => 'required|integer',
        ];
    }
}