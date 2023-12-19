<?php

namespace App\Services;

use App\Contracts\StudentDataReaderInterface;
use App\Models\Course;
use App\Models\User;
use App\Models\UserGrade;
use Illuminate\Database\Eloquent\Collection;

class StudentDataReader implements StudentDataReaderInterface
{
    public function readGrades(string $userId, ?string $courseId = null): Collection
    {
        $grades = UserGrade::where(['user_id' => $userId])->with('course.professor');

        if ($courseId !== null && $courseId !== 'all') {
            $grades->where(['course_id' => $courseId]);
        }

        return $grades->get();
    }

    public function readCourses(User $user): array
    {
        return $user->courses
            ->map(fn (Course $course) => [
                'id' => $course->id,
                'name' => $course->name,
                'professor' => $course->professor->name,
            ])
            ->toArray();
    }
}
