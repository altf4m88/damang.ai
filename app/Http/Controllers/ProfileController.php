<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('home.index-profile', compact('users'));
    }

    public function create()
    {
        return view('home.create-profile');
    }
}
