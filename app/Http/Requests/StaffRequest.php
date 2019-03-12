<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
          'name' => 'required|min:3|',
          'password' => 'required|min:3|max:32',
          'address' => 'required',
          'number_phone' => 'required',
          'images' => 'required',
          'gender' => 'required',
          'email' => 'required|email|unique:staff,email',
          'status' => 'required',
          'is_root' => 'required'
        ];
    }

    public function messages() 
    {
        return [
          'name.required' => 'Bạn chưa nhập tên nhân viên',
          'password.min' => 'Mật khẩu phải có độ dài từ 3 đến 32 ký tự',
          'password.max' => 'Mật khẩu phải có độ dài từ 3 đến 32 ký tự',
          'password.required' => 'Bạn chưa nhập mật khẩu',
          'address.required' => 'Bạn chưa nhập địa chỉ',
          'number_phone.required' => 'Bạn chưa nhập số điện thoại',
          'images.required' => 'Bạn chưa chọn ảnh',
          'gender.required' => 'Bạn chưa chọn giới tính',
          'email.required' => 'Bạn chưa nhập email',
          'email.email' => 'Bạn chưa nhập đúng định dạng email',
          'email.unique' => 'Email đã tồn tại',
          'status.required' => 'Bạn chưa chọn trạng thái status',
          'is_root.required' => 'Bạn chưa chọn isroot'

      ];

    }
}
