<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function index()
    {

        $user = auth()->user();

        if (!$user->profile()->count()) {
            $user->profile()->create();
        }

        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $userData = $request->get('user');
        $profileData = $request->get('profile');

        try {
            if ($userData['password']) {
                $userData['password'] = bcrypt($userData['password']);
            } else {
                unset($userData['password']);
            }

            /** @var User */
            $user = auth()->user();

            if ($request->hasFile('avatar')) {
                Storage::disk('public')->delete($user->avatar);
                $profileData['avatar'] = $request->file('avatar')->store('avatars', 'public');
            } else {
                unset($profileData['avatar']);
            }

            $user->update($userData);
            $user->profile()->update($profileData);

            flash('Perfil atualizado com sucesso!')->success();

            return redirect()->route('profile.index');
        } catch (\Throwable $th) {
            $message = "Erro ao atualizar o perfil";

            if (env('APP_DEBUG')) {
                $message = $th->getMessage();
            }

            flash($message)->warning();

            return redirect()->back();
        }
    }
}
