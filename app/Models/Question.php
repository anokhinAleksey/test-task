<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\UuidCast;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperQuestion
 */
class Question extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'question',
        'from_user_id',
        'to_user_id',
        'course_id',
    ];

    protected $casts = [
        'id'           => UuidCast::class,
        'from_user_id' => UuidCast::class,
        'to_user_id'   => UuidCast::class,
        'course_id'    => UuidCast::class,
    ];

    public function userFrom() : BelongsTo
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function course() : BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
