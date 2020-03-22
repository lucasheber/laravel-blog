<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;

class ProfileController extends Controller
{

    public function index()
    {
        /** @var User */
        $user = auth()->user();

        if (!$user->profile()->count()) {
            $user->profile()->create();
        }

        return view('profile.index', compact($user));
    }
}
