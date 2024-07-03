<?php

namespace App\Http\Requests;

use App\Rules\UniqueLectureIds;
use Illuminate\Foundation\Http\FormRequest;

class GradeLectureUpdateRequest extends FormRequest
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
            'gradeLectures' => ['required', 'array', new UniqueLectureIds],
            'gradeLectures.*.lecture_id' => 'required|integer|min:1|exists:lectures,id'
        ];
    }

    public function messages(): array
    {
        return [
            'gradeLectures.*.lecture_id.required' => 'Идентификатор лекции обязателен.',
            'gradeLectures.*.lecture_id.integer' => 'Идентификатор лекции должен быть числом.',
            'gradeLectures.*.lecture_id.min' => 'Идентификатор лекции должен быть не меньше 1.',
            'gradeLectures.*.lecture_id.exists' => 'Выбранная лекция не существует.',
        ];
    }
}
