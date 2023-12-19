<?php

namespace App\Services;

use App\Contracts\ProfessorDataReaderInterface;
use App\Models\Question;
use App\Models\User;
use App\Models\UserGrade;

class ProfessorDataReader implements ProfessorDataReaderInterface
{
    public function readQuestions(User $user): array
    {
        return $user->questionsToUser
            ->load(['userFrom', 'course'])
            ->sortByDesc('created_at')
            ->map(fn (Question $question) => [
                'id' => $question->id,
                'courseName' => $question->course->name,
                'question' => $question->question,
                'fromUser' => $question->userFrom->name,
                'fromUserEmail' => $question->userFrom->email,
                'createdAt' => $question->created_at->format('d/m/Y H:i:s'),
            ])
            ->toArray();
    }

    public function readCourses(User $user): array
    {
        return $user->grades
            ->load(['course', 'user'])
            ->map(fn (UserGrade $grade) => [
                'id' => $grade->id,
                'courseName' => $grade->course->name,
                'grade' => $grade->grade,
                'studentName' => $grade->user->name,
            ])
            ->toArray();
    }
}
