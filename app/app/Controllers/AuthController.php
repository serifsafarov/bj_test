<?php

namespace App\Controllers;

use App\Models\User;
use App\Requests\LoginRequest;
use Auryn\InjectionException;
use Core\Auth;
use Core\Controller;
use Core\Injector;
use Core\JsonResponse;
use Core\Response;
use Core\View;
use Exception;

class AuthController extends Controller
{
    /**
     * @throws InjectionException
     */
    public function login(): Response
    {
        Auth::logout();

        return new Response(
            Injector::get(View::class)->render(
                'pages/login.html'
            )
        );
    }

    /**
     * @throws InjectionException
     * @throws Exception
     */
    public function authorize(LoginRequest $request): JsonResponse
    {
        $request->validate();

        Auth::login(
            User::query()->where('login', $request->get('login'))->first()
        );
        return new JsonResponse(true);
    }

    /**
     * @throws InjectionException
     */
    public function me(): JsonResponse
    {
        return new JsonResponse(Auth::user());
    }
}