<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class ProfilesController extends Controller
{
    public function index(User $user) {
        return view('profiles.index', [
            'user' => $user,
        ]);
    }

    public function edit(User $user) {
        if($user->id != auth()->user()->id) {
            abort(403);
        }
        return view('profiles.edit', [
            'user' => $user,
        ]);
    }

    public function update(User $user, Request $request) {
        if($user->id != auth()->user()->id) {
            abort(403);
        }

        $data = $request->validate([
            'name' => 'required|max:25|string',
            'surname' => 'required|max:25|string',
            'phone' => 'required|numeric',
            'city' => 'required|max:25|string',
        ]);

        $user->profile->update([
            'phone' => $data['phone'],
            'city' => $data['city'],
        ]);

        $user->update([
            'name' => $data['name'],
            'surname' => $data['surname'],
        ]);

        $user->push();

        return redirect(route('profile.index', $user));
    }
}
