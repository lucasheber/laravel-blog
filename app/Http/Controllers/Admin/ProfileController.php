<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfileRequest;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function index()
    {
        /** @var User */
        $user = auth()->user();

        if (!$user->profile()->count()) {
            $user->profile()->create();
        }

        return view('profile.index', compact('user'));
    }

    public function update(UserProfileRequest $request)
    {
        dd($request->all());
        $userData = $request->get('user');
        $profileData = $request->get('profile');


        try {
            if ($userData['password']) {
                $validator = Validator::make($request->all(),
                [
                    'user.password' => ['min:8'],
                ],
                    ['min' => 'Senha deve ter pelo menos :min caracteres!']
                );

                if ($validator->fails()){
                    return redirect()->back()->withErrors($validator);
                }

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
