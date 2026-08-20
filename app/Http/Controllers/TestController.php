<?php

namespace App\Http\Controllers;

use App\Models\User;

class TestController extends Controller
{
    public function index()
    {
        $users = User::with('candidateProfile')->get();

        return view('test', compact('users'));
    }
}