<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryRequest extends FormRequest
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
            'category_name'=>'required|min:1|max:50'
        ];
    }
    public function messages(){
        return [
            'category_name.required'=>'必填',
            'category_name.min'=>'文字长度最低为1个',
            'category_name.max'=>'文字不能超过50个'
        ];
    }
}
