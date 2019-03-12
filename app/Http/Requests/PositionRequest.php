<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
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
          'name' => 'required|min:3|unique:position,name',
          'order' => 'required|unique:position,sort_order',
          'parent' => 'required'
      ];
    }

    public function messages() {
        return [
          'name.required' => 'Bạn chưa nhập chức vụ',
          'order.required' => 'Bạn chưa nhập order',
          'name.unique' => 'Tên chức vụ đã bị trùng',
          'name.min' => 'Tên chức vụ phải tối thiểu từ ba kí tự trở lên',
          'order.unique' => 'Order đã được khởi tạo',
          'parent.required' => 'Chưa chọn parent cho chức vụ'

      ];

    }
}
