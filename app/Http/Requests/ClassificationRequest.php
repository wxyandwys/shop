<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassificationRequest extends FormRequest
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
            //
            'classification_name'=>'required|min:2|max:50'
        ];
    }
    public function messages(){
        return [
            'classification_name.required'=>'必填',
            'classification_name.min'=>'不能少于2个文字',
            'classification_name.max'=>'不能超出50个文字'
        ];
    }
}
