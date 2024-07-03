<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'grade_id' => 'sometimes|required|integer|min:1|exists:grades,id'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Название обязательно для заполнения.',
            'name.string' => 'Название должно быть строкой.',

            'grade_id.required' => 'Идентификатор класса обязателен.',
            'grade_id.integer' => 'Идентификатор класса должен быть числом.',
            'grade_id.min' => 'Идентификатор класса должен быть не меньше 1.',
            'grade_id.exists' => 'Выбранный класс не существует.',
        ];
    }
}
