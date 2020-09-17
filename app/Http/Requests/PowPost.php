<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PowPost extends FormRequest
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
            'pow_name' => 'required',
            'pow_url' => 'required',
        ];
    }
    public function massages(){
        return [
            'pow_name.required'=>"权限名称不可为空",
            'pow_url.required' => '权限url不可为空'
        ];
    }
}
