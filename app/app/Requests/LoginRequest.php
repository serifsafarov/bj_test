<?php

namespace App\Requests;

use App\Models\User;
use Core\Request;
use Exception;

class LoginRequest extends Request
{
    /**
     * @throws Exception
     */
    public function validate(): void
    {
        if (
            empty($this->get('login')) ||
            empty($this->get('password')) ||
            empty($user = User::query()->where('login', $this->get('login'))->first()) ||
            !password_verify($this->get('password'), $user->password)
        )
            throw new Exception('Validation error');
    }
}