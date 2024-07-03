<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LectureStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:lectures,name',
            'description' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Название обязательно для заполнения.',
            'name.string' => 'Название должно быть строкой.',
            'name.unique' => 'Подобное название уже выбрано.',

            'description.required' => 'Название обязательно для заполнения.',
            'description.string' => 'Название должно быть строкой.',
        ];
    }
}
