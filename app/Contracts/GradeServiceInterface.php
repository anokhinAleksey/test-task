<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Models\User;

/**
 * @psalm-type GradeStoreData = array{
 *     user: User,
 *     gradeId: string,
 *     grade: string,
 * }
 */
interface GradeServiceInterface
{
    /** @psalm-param GradeStoreData $data */
    public function store(array $data) : void;
}
