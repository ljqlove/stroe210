<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LunboRequest extends FormRequest
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
            'url' =>'required',
            'pic' =>'required'

        ];
    }

    /**
     * 获取已定义验证规则的错误消息。
     *
     * @return array
     */
    public function messages()
    {
        return [
            'url.required'=>'链接地址不能为空',
            'pic.required'=>'图片不能为空'
        ];
    }
}
