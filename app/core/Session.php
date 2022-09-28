<?php

namespace Core;

final class Session
{
    protected array $data;

    public function __construct()
    {
        $this->data = &$_SESSION;
    }

    public function get($key)
    {
        return $this->data[$key] ?? null;
    }

    public function set($key, $value): void
    {
        $this->data[$key] = $value;
    }
}