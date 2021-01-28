<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfilePhotosController extends Controller
{
    public function store(User $user, Request $request)
    {
        $user->updateProfilePhoto($request->file('photo'));

        return redirect(route('profile.edit', $user))
            ->with('message', 'profile phot updated');
    }

    public function destroy(User $user)
    {
        $user->deleteProfilePhoto();
        return redirect(route('profile.edit', $user))
            ->with('message', 'profile phot updated');
    }
}
