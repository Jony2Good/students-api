<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueLectureIds implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $lectureIds = array_column($value, 'lecture_id');
        if (count($lectureIds) !== count(array_unique($lectureIds))) {
            $fail('Лекции не должны повторяться для одного учебного плана.');
        }
    }
}
