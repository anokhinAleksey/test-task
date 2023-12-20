<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Models\User;

/**
 * @psalm-type QuestionStoreData = array{
 *     user: User,
 *     courseId: string,
 *     question: string,
 * }
 */
interface QuestionServiceInterface
{
    /** @psalm-param QuestionStoreData $data */
    public function store(array $data) : void;
}
