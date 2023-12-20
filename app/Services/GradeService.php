<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\GradeServiceInterface;
use App\Models\GradesEnum;
use App\Models\UserGrade;
use DomainException;

/**
 * @psalm-import-type GradeStoreData from GradeServiceInterface
 */
class GradeService implements GradeServiceInterface
{
    /** @psalm-param GradeStoreData $data */
    public function store(array $data) : void
    {
        $grade = UserGrade::whereId($data['gradeId'])->with('course')->firstOrFail();
        if (! $grade->course->user_id->equals($data['user']->id)) {
            throw new DomainException('You are not allowed to grade this course');
        }
        $grade->grade = GradesEnum::from($data['grade']);
        $grade->save();
    }
}
