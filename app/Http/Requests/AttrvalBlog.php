<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttrvalBlog extends FormRequest
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
            'attrval_name' => 'required|unique:shop_attrval|max:80',
        ];
    }
    public function messages(){
        return [
            'attrval_name.required' => '属性值不能为空',
            'attrval_name.unique' => '属性值已存在',
            'attrval_name.max' => '属性名值能超过20个字',

        ];
    }
}
