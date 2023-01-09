<?php

namespace TaylorMVC\App\Controllers;

use TaylorMVC\App\Core\Controller;
use TaylorMVC\App\Core\View;

class ContactController extends Controller
{
    public function show()
    {
        return View::render('contact');
    }

    public function store(){
        return 'Handling Submitted Data';
    }
}
