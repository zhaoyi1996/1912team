<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttrBlog extends FormRequest
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
            'attr_name' => 'required|unique:shop_attr|max:80',
        ];
    }
    public function messages(){
        return [
            'attr_name.required' => '属性名不能为空',
            'attr_name.unique' => '属性名已存在',
            'attr_name.max' => '属性名不能超过20个字',

        ];
    }
}
