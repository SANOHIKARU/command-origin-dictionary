<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            "name" => 'required|string|max:255|unique:categories,name',
        ];
    }

    public function messages()
    {
        // 表示されるバリデートエラーメッセージを個別に編集したい場合は、ここに追加する
        // 項目名.ルール => メッセージという形式で書く
        // プレースホルダーを使うこともできる
        // 下記の例では :max の部分にそれぞれ設定した値（255, 10000）が入る
        return [
            'name.required'      => '入力は必須です',
            'name.string'        => '文字列を入力してください',
            'name.max'           => ':max文字以内で入力してください',
            'name.unique'        => '既に同じ名前のカテゴリーが存在しています'
        ];
    }
}
