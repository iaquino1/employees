<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployee extends FormRequest
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
            'postal_code' => 'required',
            'municipality' => 'required',
            'colony' => 'required',
            'state' => 'required',
            'country' => 'required',
            'street' => 'required',
            'number' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees',
            'job' => 'required',
            'birthday' => 'required|date',
            'skillNames.*' => 'required',
        ];
    }
}
