<?php

namespace App\Http\Controllers;

use App\Models\User;

class PracController extends Controller
{
    public function index()
    {
        // $data = auth()->user()->posts;

        $user = auth()->user();

        return $user;
    }
}
