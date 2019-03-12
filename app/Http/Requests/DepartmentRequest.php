<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
          'name' => 'required|min:3|unique:department,name',
        ];
    }

    public function messages() 
    {
        return [
          'name.required' => 'Bạn chưa nhập phòng ban',
          'name.unique' => 'Tên phòng ban đã bị trùng',
          'name.min' => 'Tên phòng ban phải tối thiểu từ ba kí tự trở lên',

      ];

    }
}
