<?php

namespace App\Http\Requests;

use App\Rules\UniqueLectureIds;
use Illuminate\Foundation\Http\FormRequest;

class GradeLectureStoreRequest extends FormRequest
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
            'grade_id' => 'required|integer|min:1|exists:grades,id',
            'curriculum' => 'required|integer|min:1|unique:grade_lectures,curriculum',
            'gradeLectures' => ['required', 'array', new UniqueLectureIds],
            'gradeLectures.*.lecture_id' => 'required|integer|min:1|exists:lectures,id'
        ];
    }

    public function messages(): array
    {
        return [
            'grade_id.required' => 'Идентификатор класса обязателен.',
            'grade_id.integer' => 'Идентификатор класса должен быть числом.',
            'grade_id.min' => 'Идентификатор класса должен быть не меньше 1.',
            'grade_id.exists' => 'Выбранный класс не существует.',

            'curriculum.required' => 'Номер учебного плана обязателен.',
            'curriculum.integer' => 'Номер учебного плана должен быть числом.',
            'curriculum.min' => 'Номер учебного плана должен быть не меньше 1.',
            'curriculum.unique' => 'Номер учебного плана уже существует.',

            'gradeLectures.*.lecture_id.required' => 'Идентификатор лекции обязателен.',
            'gradeLectures.*.lecture_id.integer' => 'Идентификатор лекции должен быть числом.',
            'gradeLectures.*.lecture_id.min' => 'Идентификатор лекции должен быть не меньше 1.',
            'gradeLectures.*.lecture_id.exists' => 'Выбранная лекция не существует.',
        ];
    }
}
