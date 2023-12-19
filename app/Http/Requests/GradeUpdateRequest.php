<?php

namespace App\Http\Requests;

use App\Contracts\GradeServiceInterface;
use App\Models\GradesEnum;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

/**
 * @psalm-import-type GradeStoreData from GradeServiceInterface
 */
class GradeUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'gradeId' => 'required|uuid',
            'grade' => ['required', 'string', new Enum(GradesEnum::class)],
        ];
    }

    /** @psalm-return GradeStoreData */
    public function modelData(): array
    {
        /** @var User $user */
        $user = $this->user();

        return [
            'gradeId' => $this->str('gradeId')->value(),
            'grade' => $this->str('grade')->value(),
            'user' => $user,
        ];
    }
}
