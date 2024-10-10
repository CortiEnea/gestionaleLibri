<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'name' => 'required|max:100',
            'birthday' => 'required|max:100'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il campo nome è obbligatorio.',
            'name.max' => 'Il nome non può superare i 100 caratteri.',

            'birthday.required' => 'Il campo data di nascita è obbligatorio.',
            'birthday.max' => 'La data di nascita non può superare i 100 caratteri.',

        ];
    }
}
