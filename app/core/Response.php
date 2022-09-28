<?php

namespace Core;

class Response
{
    protected string $status;
    protected mixed $content;

    public function __construct(string $content, int $status = 200)
    {
        $this->status = $status;
        $this->content = $content;
    }

    public function render()
    {
        http_response_code($this->status);
        return $this->content;
    }
}