<?php

namespace Jalpeshtxtech\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    
    public function rules()
    {
        return [
            'name' => 'required|alpha|max:255',
            'email' => 'required|email|unique:users,email,'.$this->id,
            // 'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            // 'confirm_password' => 'required_with:password|same:password|min:6',
            'phone' => 'required|numeric',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is Required',
            'email.required' => 'Email is Required',
            'email.email' => 'Please Enter Valid Email Address',
            // 'email.unique' => 'This Email is Already in Use',
            'password.required' => 'Password is Required',
            'phone.required' => 'Phone Number is Required',
            'status.required' => 'Please Select User Status',
        ];
    }
}
