<?php

namespace Core;

use Auryn\InjectionException;

class Router
{
    private array $routes;
    private array $params = [];
    private Request $request;
    private array $middlewares;

    public function __construct(Request $request)
    {
        $this->routes = collect(
            config('routes')
        )->mapWithKeys(function ($params, $route) {
            return [
                '#^' . $route . '$#' => $params
            ];
        })->toArray();
        $this->request = $request;
        $this->middlewares = config('middlewares');
    }

    private function match(): bool
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        $url = explode('?', $url)[0];
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * @throws InjectionException
     */
    public function run()
    {
        if (
            !$this->match() ||
            !method_exists($this->params['controller'], $this->params['method'])
        )
            return new Response('Page not found', 404);
        $this->checkMiddlewares();
        return Injector::execute($this->params['controller'], $this->params['method']);
    }

    /**
     * @throws InjectionException
     */
    private function checkMiddlewares(): void
    {
        $middlewares = $this->middlewares + (
            empty($this->params['middlewares']) ? [] : $this->params['middlewares']
            );
        foreach ($middlewares as $middleware) {
            $middleware = Injector::get($middleware);
            $this->request = $middleware->handle($this->request);
        }
    }

    public static function redirect(string $path): void
    {
        header("Location: $path");
    }
}