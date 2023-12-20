<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\UuidCast;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperCourse
 */
class Course extends Model
{
    use HasFactory;
    use HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'user_id',
    ];

    protected $casts = [
        'id'      => UuidCast::class,
        'user_id' => UuidCast::class,
    ];

    protected $hidden = [
        'user_id',
    ];

    public function professor() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
