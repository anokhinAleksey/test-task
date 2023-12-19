<?php

declare(strict_types=1);

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/** @implements  CastsAttributes<UuidInterface,string> */
class UuidCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): ?UuidInterface
    {
        return $value === null ? null : Uuid::fromString((string) $value);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): ?string
    {
        /** @psalm-suppress RedundantCastGivenDocblockType */
        return $value === null ? null : (string) $value;
    }
}
