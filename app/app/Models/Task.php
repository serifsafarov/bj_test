<?php

namespace App\Models;

use Core\Model;

class Task extends Model
{
    public $timestamps = false;

    protected $casts = [
        'done' => 'boolean',
        'edited_by_admin' => 'boolean'
    ];

    protected $fillable = [
        'description', 'done'
    ];
}