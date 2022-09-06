<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:5', 'max:100'],
            'description' => ['required', 'string', 'min:10', 'max:100'],
            'content' => ['required', 'string', 'min:20'],
            'image' => ['required', 'string', 'min:10', 'max:254'],
//            'image' => ['required', 'image', 'mimes:jpg,png', 'max:254'],
            'author' => ['required', 'string', 'min:3', 'max:50'],
            'status' => ['required','string', 'min:3','max:10'],
            'category_id' => ['required', 'integer', 'min:1', 'exists:categories,id'],
        ];
    }

    public function messages()
    {
        return [
            'required'=>'Введите данные :attribute'
        ];
    }

    public function attributes()
    {
        return [
            'title'=>'Заголовок новости',
            'image' => 'Ссылка на фото'
        ];
    }


}
