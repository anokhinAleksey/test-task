<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\UuidCast;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperRole
 */
class Role extends Model
{
    use HasFactory;
    use HasUuids;

    public const PROFESSOR = 'professor';

    public const STUDENT = 'student';

    public $timestamps = false;

    protected $casts = [
        'id' => UuidCast::class,
    ];

    protected $fillable = [
        'name',
    ];
}
