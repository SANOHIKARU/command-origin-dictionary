<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommandRequest extends FormRequest
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
            "name" => 'required|string|max:255|',
            "origin" => 'required|string|max:255|',
            "description" => 'required|string|max:255|',
        ];
    }

    public function messages()
    {
        return [
            'name.required'      => 'コマンド名の入力は必須です',
            'name.string'        => 'コマンド名には文字列を入力してください',
            'name.max'           => 'コマンド名を:max文字以内で入力してください',
            'origin.required'    => '語源説明の入力は必須です',
            'origin.string'      => '語源説明は文字列で入力してください',
            'origin.max'         => '語源説明を:max文字以内で入力してください',
            'description.required' => 'コマンド説明の入力は必須です',
            'description.string'   => 'コマンド説明は文字列で入力してください',
            'description.max'      => 'コマンド説明を:max文字以内で入力してください',
        ];
    }
}
