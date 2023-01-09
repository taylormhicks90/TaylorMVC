<?php

namespace TaylorMVC\App\Core\Exceptions;

class PageNotFoundException extends \Exception
{

    public function __construct(string $message = 'Page Not Found')
    {
        parent::__construct($message);
    }
}
