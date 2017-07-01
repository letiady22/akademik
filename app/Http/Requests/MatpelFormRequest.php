<?php

namespace Letiady\Http\Requests;

use Letiady\Http\Requests\Request;

class MatpelFormRequest extends Request
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
            'mata_pelajaran' => 'required',
        ];
    }
}
