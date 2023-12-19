<?php

namespace App\Http\Requests;

use App\Contracts\QuestionServiceInterface;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @psalm-import-type QuestionStoreData from QuestionServiceInterface
 */
class QuestionCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'course' => 'required|uuid',
            'question' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'course.required' => 'You must select a professor and course for your question',
        ];
    }

    /** @psalm-return QuestionStoreData */
    public function modelData(): array
    {
        return [
            'question' => $this->input('question'),
            'courseId' => $this->input('course'),
            'user' => $this->user(),
        ];
    }
}
