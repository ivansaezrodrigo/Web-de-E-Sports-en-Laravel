<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class UserEditRequest extends FormRequest
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
            'name' => ['nullable', 'string', 'min:2', 'max:255'],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'birthday' => ['nullable', 'before:today'],
            'twitter' => ['nullable', 'string', 'min:2', 'max:255'],
            'instagram' => ['nullable', 'string', 'min:2', 'max:255'],
            'twitch' => ['nullable', 'string', 'min:2', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
        ];
    }
    // Este método se encarga de personalizar los mensajes de error
    public function messages()
    {
        return [
            'name.unique' => 'El nombre completo es obligatorio.',
            'name.max' => 'El nombre completo debe tener como máximo 255 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'twitter.min' => 'El twitter del usuario debe tener como mínimo 5 caracteres.',
            'twitter.max' => 'El twitter del usuario debe tener como máximo 255 caracteres.',
            'instagram.min' => 'El instagram del usuario debe tener como mínimo 5 caracteres.',
            'instagram.max' => 'El instagram del usuario debe tener como máximo 255 caracteres.',
            'twitch.min' => 'El twitch del usuario debe tener como mínimo 5 caracteres.',
            'twitch.max' => 'El twitch del usuario debe tener como máximo 255 caracteres.',
            'image.mimes' => 'La imagen debe ser de tipo jpeg, png, jpg o svg.',
            'image.max' => 'La imagen debe tener como máximo 2048 kilobytes.',
        ];
    }
    
}
