<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\QuestionServiceInterface;
use App\Models\Course;

/**
 * @psalm-import-type QuestionStoreData from QuestionServiceInterface
 */
class QuestionService implements QuestionServiceInterface
{
    /** @psalm-param QuestionStoreData $data */
    public function store(array $data) : void
    {
        $user   = $data['user'];
        $course = Course::whereId($data['courseId'])->firstOrFail();

        $question = $user->questionsFromUser()->create([
            'question'   => $data['question'],
            'course_id'  => $data['courseId'],
            'to_user_id' => $course->user_id,
        ]);
        $question->save();
    }
}
