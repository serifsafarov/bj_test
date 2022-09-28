<?php

namespace Core;

use Auryn\InjectionException;

class Request
{
    protected array $data;
    public bool $isXMLHTTP;

    public function __construct()
    {
        $this->data = $_REQUEST + $_POST;
        $this->isXMLHTTP = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

    final public function getOnly(...$keys): array
    {
        return collect($this->data)->filter(
            function ($value, $key) use ($keys) {
                return in_array($key, $keys);
            }
        )->toArray();
    }

    final public function get($key): mixed
    {
        return $this->data[$key] ?? null;
    }

    /**
     * @throws InjectionException
     */
    final public function session(): Session
    {
        return Injector::get(Session::class);
    }

    public function validate(): void
    {
    }

    public function mutate(): void
    {
    }
}