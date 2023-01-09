<?php

namespace TaylorMVC\App\Controllers;

use TaylorMVC\App\Core\View;

class ContactController
{
    public function show()
    {
        return View::render('contact');
    }

    public function store(){
        return 'Handling Submitted Data';
    }
}
