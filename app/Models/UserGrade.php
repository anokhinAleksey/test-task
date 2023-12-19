<?php

namespace App\Models;

use App\Casts\UuidCast;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperUserGrade
 */
class UserGrade extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'grade',
        'user_id',
        'course_id',
    ];

    protected $casts = [
        'id' => UuidCast::class,
        'user_id' => UuidCast::class,
        'course_id' => UuidCast::class,
        'grade' => GradesEnum::class,
    ];

    protected $hidden = [
        'user_id',
        'course_id',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
