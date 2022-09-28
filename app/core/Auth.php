<?php

namespace Core;

use App\Models\User;
use Auryn\InjectionException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final class Auth
{
    /**
     * @throws InjectionException
     */
    public static function user(): Model|Collection|Builder|array|null
    {
        return User::query()->find(
            Injector::get(Request::class)->session()->get('user_id')
        );
    }

    /**
     * @throws InjectionException
     */
    public static function login(Model|Collection|Builder $user): void
    {
        Injector::get(Request::class)->session()->set('user_id', $user->id);
    }

    /**
     * @throws InjectionException
     */
    public static function logout(): void
    {
        Injector::get(Request::class)->session()->set('user_id', null);
    }
}