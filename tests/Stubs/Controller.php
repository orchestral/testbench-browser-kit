<?php

namespace Orchestra\Testbench\BrowserKit\Tests\Stubs;

class Controller extends \Illuminate\Routing\Controller
{
    public function index()
    {
        return 'Controller@index';
    }
}
