<?php

namespace Core;

class JsonResponse extends Response
{
    public function __construct(mixed $content, int $status = 200)
    {
        parent::__construct(json_encode($content), $status);
    }
}