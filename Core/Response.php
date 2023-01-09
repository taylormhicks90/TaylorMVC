<?php

namespace TaylorMVC\App\Core;

class Response
{
    protected int $code = 200;

    public function setStatusCode(int $code): void
    {
        $this->code = $code;
        http_response_code($this->code);
    }

}
