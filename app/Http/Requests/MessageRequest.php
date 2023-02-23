<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
    // Este método se encarga de validar los datos que se envían desde el formulario
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2',  'max:15'],
            'subject' => ['required', 'string','min:4', 'max:100'],
            'text' => ['required', 'string','min:10',  'max:500'],
        ];
    }
    // Este método se encarga de personalizar los mensajes de error
    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'name.string' => 'El campo nombre debe ser texto',
            'name.min' => 'El campo nombre debe tener al menos 2 caracteres',
            'name.max' => 'El campo nombre debe tener como máximo 15 caracteres',
            'subject.required' => 'El campo asunto es obligatorio',
            'subject.string' => 'El campo asunto debe ser texto',
            'subject.min' => 'El campo asunto debe tener al menos 4 caracteres',
            'subject.max' => 'El campo asunto debe tener como máximo 100 caracteres',
            'text.required' => 'El campo texto es obligatorio',
            'text.string' => 'El campo texto debe ser texto',
            'text.min' => 'El campo texto debe tener al menos 10 caracteres',
            'text.max' => 'El campo texto debe tener como máximo 500 caracteres',
        ];
    }
}
