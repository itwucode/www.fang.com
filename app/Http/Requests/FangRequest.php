<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FangRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            // 默认接受是字符串，转为数字
            'fang_province' => 'required|numeric|min:1'
        ];
    }

    public function messages() {
        return [
            'fang_province.required' => '省份必须选择',
            'fang_province.min' => '选择一下省份',
        ];
    }
}
