<?php

declare(strict_types=1);

namespace App\Models;

use App\Casts\UuidCast;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @mixin IdeHelperUser
 */
class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'id'       => UuidCast::class,
        'password' => 'hashed',
    ];

    public function role() : BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function hasRole(string $role) : bool
    {
        return $this->role->name === $role;
    }

    public function courses() : HasManyThrough
    {
        return $this->hasManyThrough(Course::class, UserGrade::class, 'user_id', 'id', 'id', 'course_id');
    }

    public function questionsFromUser() : HasMany
    {
        return $this->hasMany(Question::class, 'from_user_id');
    }

    public function questionsToUser() : HasMany
    {
        return $this->hasMany(Question::class, 'to_user_id');
    }

    public function grades() : HasManyThrough
    {
        return $this->hasManyThrough(UserGrade::class, Course::class, 'user_id', 'course_id', 'id', 'id');
    }
}
