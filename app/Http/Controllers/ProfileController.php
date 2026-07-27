<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // ========= TAMBAH INI =========
    public function index(): View
    {
        return view('profile.index');
    }
    // ==============================

    // Breeze methods (biarkan)
    public function edit(Request $request): View
    {
        return view('profile.edit', ['user' => $request->user()]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/');
    }

    public function updateCustom(Request $request)
{
    $user = auth()->user();

    if ($request->hasFile('photo')) {

        $photo = $request->file('photo')
            ->store('profile', 'public');

        $user->photo = $photo;
    }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->telepon = $request->telepon;
    $user->alamat = $request->alamat;

    if ($request->password) {

        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->back()
        ->with('success', 'Profil berhasil diperbarui');
    }

}
