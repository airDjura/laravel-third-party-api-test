<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        return response(['message' => 'Welcome to the API']);
    }
}
