<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerAddRequest extends FormRequest
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
            'name' => 'required', 
            'email'=>'required|email|unique:customer',
            'address'=> 'required',
            'password'=>'required', 
            'confirm_password'=>'required|same:password'
        ];
    }
    public function messages() {
        return [
            'name.required'=>'Name is not empty',
            'email.required'=>'Email is not empty',
            'email.unique'=>'Email is exists',
            'address.required'=>'Address is not empty',
            'password.required'=>'Password is not empty',
            'confirm_password.required'=>'Confirm password is not empty',
            'confirm_password.same'=>'Confirm password is not correct',
        ];
    }
}
