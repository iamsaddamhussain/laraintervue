<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;

    protected $hidden = ['password'];
    protected $fillable = ['name', 'email', 'password', 'user_type'];

    const USER_TYPE_SUPER_ADMIN = 1;
    const USER_TYPE_ADMIN = 2;
    const USER_TYPE_USER = 3;

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'created_by', 'id');
    }

    /**
     * @param Builder $q
     */
    public function scopeListing($q): void
    {
        $q
            ->select([
                'id', 'name', 'email', 'user_type'
            ]);
    }
}
