<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|max:100',
            'description' => 'required|max:100',
            'pages' => 'required|max:100',
            'author_id' => 'required|max:100',
            'category_id' => 'required|max:100'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il campo titolo è obbligatorio.',
            'title.max' => 'Il titolo non può superare i 100 caratteri.',

            'description.required' => 'Il campo descrizione è obbligatorio.',
            'description.max' => 'La descrizione non può superare i 100 caratteri.',

            'pages.required' => 'Il campo pagine è obbligatorio.',
            'pages.max' => 'Il numero di pagine non può superare i 100 caratteri.',

            'author_id.required' => 'Il campo autore è obbligatorio.',
            'author_id.max' => "L'ID dell'autore non può superare i 100 caratteri.",

            'category_id.required' => 'Il campo categoria è obbligatorio.',
            'category_id.max' => "L'ID della categoria non può superare i 100 caratteri.",
        ];
    }



}
