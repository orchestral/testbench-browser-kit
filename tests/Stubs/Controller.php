<?php

namespace Orchestra\Testbench\BrowserKit\Tests\Stubs;

use Illuminate\Http\Request;

class Controller extends \Illuminate\Routing\Controller
{
    public function index()
    {
        return 'Controller@index';
    }

    public function store(Request $request)
    {
        return response()->json([
            'content' => $request->input('content'),
        ]);
    }
}
