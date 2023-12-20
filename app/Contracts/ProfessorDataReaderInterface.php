<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Models\User;

interface ProfessorDataReaderInterface
{
    public function readQuestions(User $user) : array;

    public function readCourses(User $user) : array;
}
