<?php

namespace App\Models;

use Core\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    protected $hidden = [
        'password'
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'user_id', 'id');
    }
}