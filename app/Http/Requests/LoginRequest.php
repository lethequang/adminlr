<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
          'password' => 'required|min:3|max:32',
          'email' => 'required|email'
        ];
    }

    public function messages() 
    {
        return [
          'password.min' => 'Mật khẩu phải có độ dài từ 3 đến 32 ký tự',
          'password.max' => 'Mật khẩu phải có độ dài từ 3 đến 32 ký tự',
          'password.required' => 'Bạn chưa nhập mật khẩu',
          'email.required' => 'Bạn chưa nhập email',
          'email.email' => 'Bạn chưa nhập đúng định dạng email'

      ];

    }
}
