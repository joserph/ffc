<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddFarmRequest extends FormRequest
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
            'name'      => 'required|unique:farms,name',
            'phone'     => 'required',
            'address'   => 'required',
            'parish'    => 'required',
            'city'      => 'required',
            'country'   => 'required'
        ];
    }
}
