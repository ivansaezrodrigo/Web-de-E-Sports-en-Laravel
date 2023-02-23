<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class EditEventRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:15'],
            'description' => ['required', 'string', 'min:2', 'max:255'],
            'location' => ['required', 'string', 'min:2', 'max:255'],
            'fecha' => ['required', 'date'],
            'hour' => ['required'],
            'tags' => ['required', 'string', 'min:2', 'max:255'],
        ];
    }

    // Este método se encarga de personalizar los mensajes de error
    public function messages()
    {
        return [
            'name.required' => 'El nombre del evento es obligatorio.',
            'name.min' => 'El nombre del evento debe tener como mínimo 2 caracteres.',
            'name.max' => 'El nombre del evento debe tener como máximo 15 caracteres.',
            'description.required' => 'La descripción del evento es obligatoria.',
            'description.min' => 'La descripción del evento debe tener como mínimo 2 caracteres.',
            'description.max' => 'La descripción del evento debe tener como máximo 255 caracteres.',
            'location.required' => 'La localización del evento es obligatoria.',
            'location.min' => 'La localización del evento debe tener como mínimo 2 caracteres.',
            'location.max' => 'La localización del evento debe tener como máximo 255 caracteres.',
            'date.required' => 'La fecha del evento es obligatoria.',
            'tags.required' => 'Los tags del evento son obligatorios.',
            'tags.min' => 'Los tags del evento deben tener como mínimo 2 caracteres.',
            'tags.max' => 'Los tags del evento deben tener como máximo 255 caracteres.',
            'hour.required' => 'La hora del evento es obligatoria.',
        ];
    }
}
