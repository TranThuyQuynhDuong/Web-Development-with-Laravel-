<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

      /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:4' //required là nếu chưa nhập vào form mà bấm submit thì nó báo lỗi, min:6 là ký tự ngắn nhất là 6 nếu nhỏ hơn 6 thì báo lỗi
        ];
    }

    //Phần hiển thị thông báo báo lỗi
    public function messages(): array //messages sẽ được dùng ở errỏ message ở admin.brand.index
    {
        return [
            'name.required' => 'Tên danh mục không để trống!',
            'name.min' => 'Tên danh mục ít nhất 4 ký tự'
        ];
    }
}
