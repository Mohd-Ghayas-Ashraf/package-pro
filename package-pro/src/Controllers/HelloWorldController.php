<?php

namespace Ghayas\HelloWorldPackage\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\View\View;

class HelloWorldController extends Controller
{
    /**
     * Display the hello world page.
     */
    public function index(): View
    {
        return view('hello-world-package::index');
    }
}