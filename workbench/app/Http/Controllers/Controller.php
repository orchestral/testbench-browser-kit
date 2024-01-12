<?php

namespace Workbench\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
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
