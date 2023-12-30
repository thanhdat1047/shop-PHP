<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateColorValidationRequest extends FormRequest
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
        $id = $this->route('color')->id; // Lấy ID của đối tượng đang được chỉnh sửa
        return [
            'name' => [
                'required',
                Rule::unique('colors', 'name')->ignore($id)
            ],
            'encode'  => 'required|regex:/^#[0-9a-fA-F]{6}$/'
        ];
    }
}
