<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightLogTargetRequest extends FormRequest
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
            'target_weight' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    $parts = explode('.', $value);
                    if (strlen($parts[0]) > 4) {
                        $fail('4桁までの数字で入力してください');
                    }
                    if (isset($parts[1]) && strlen($parts[1]) > 1) {
                        $fail('小数点は1桁で入力してください');
                    }
                },
            ],
        ];
    }

    public function messages()
    {
        return [
            'target_weight.required' => '目標体重を入力してください',
            'target_weight.numeric'  => '目標体重は数字で入力してください',
        ];
    }
}
