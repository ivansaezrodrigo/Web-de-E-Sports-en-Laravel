<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
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
            'nickname' => ['required', 'string', 'min:2', 'max:20', 'unique:users'],
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'birthday' => ['required', 'before:today'],
            'twitter' => ['required', 'string', 'min:2', 'max:255'],
            'instagram' => ['required', 'string', 'min:2', 'max:255'],
            'twitch' => ['required', 'string', 'min:2', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
        ];
    }
    // Este método se encarga de personalizar los mensajes de error
    public function messages()
    {
        return [
            'nickname.required' => 'El nombre de usuario es obligatorio.',
            'nickname.min' => 'El nombre de usuario debe tener como mínimo 2 caracteres.',
            'nickname.max' => 'El nombre de usuario debe tener como máximo 255 caracteres.',
            'nickname.unique' => 'El nombre de usuario ya existe.',
            'name.required' => 'El nombre completo es obligatorio.',
            'name.unique' => 'El nombre completo es obligatorio.',
            'name.max' => 'El nombre completo debe tener como máximo 255 caracteres.',
            'email.required' => 'El email de usuario es obligatorio.',
            'email.max' => 'El email debe tener como máximo 255 caracteres.',
            'email.unique' => 'El email ya existe.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'birthday.required' => 'La fecha de nacimiento es obligatoria.',
            'twitter.required' => 'El twitter del usuario es obligatorio.',
            'twitter.min' => 'El twitter del usuario debe tener como mínimo 5 caracteres.',
            'twitter.max' => 'El twitter del usuario debe tener como máximo 255 caracteres.',
            'instagram.required' => 'El instagram del usuario es obligatorio.',
            'instagram.min' => 'El instagram del usuario debe tener como mínimo 5 caracteres.',
            'instagram.max' => 'El instagram del usuario debe tener como máximo 255 caracteres.',
            'twitch.required' => 'El twitch del usuario es obligatorio.',
            'twitch.min' => 'El twitch del usuario debe tener como mínimo 5 caracteres.',
            'twitch.max' => 'El twitch del usuario debe tener como máximo 255 caracteres.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'El archivo debe ser una imagen con formato jpeg, png, jpg o svg.',
            'image.max' => 'El archivo debe pesar como máximo 2MB.',
        ];
    }
}
