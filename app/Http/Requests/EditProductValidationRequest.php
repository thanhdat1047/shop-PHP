<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductValidationRequest extends FormRequest
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
            //
            'name'=> 'required',
            'values' => 'required|numeric|min:0|max:100000',
            'image'=> 'mimes:jpg,png,jpe,jpeg|max:5048',
            'operating_system' => 'required'
    
        ];
    }
}
