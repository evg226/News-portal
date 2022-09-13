<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:5', 'max:30'],
            'is_admin' => ['required','integer'],
            'email' => ['required', 'unique:users,email,'.$this->get('id'),'email:rfc,dns', 'max:250']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'is_admin' => $this->is_admin ? 1 : 0
        ]);
    }

}
