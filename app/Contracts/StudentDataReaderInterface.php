<?php

namespace App\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface StudentDataReaderInterface
{
    public function readGrades(string $userId, ?string $courseId = null): Collection;

    public function readCourses(User $user): array;
}
