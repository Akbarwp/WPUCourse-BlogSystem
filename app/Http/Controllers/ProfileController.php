<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

use function PHPUnit\Framework\isEmpty;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // $request->user()->fill($request->validated());

        $validated = $request->validated();

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Uploud Image basic
        // if ($request->hasFile('avatar')) {
        //     if (!empty($request->user()->avatar)) {
        //         Storage::disk('public')->delete($request->user()->avatar);
        //     }

        //     $path = $request->file('avatar')->store('img/user-avatar', 'public');
        //     $validated['avatar'] = $path;
        // }

        // Uploud Image with Filepond
        if ($request->avatar) {
            if (!empty($request->user()->avatar)) {
                Storage::disk('public')->delete($request->user()->avatar);
            }

            $newFilename = Str::after($request->avatar, 'tmp/');

            Storage::disk('public')->move($request->avatar, "img/user-avatar/$newFilename");

            $validated['avatar'] = "img/user-avatar/$newFilename";
        }

        // $request->user()->save();
        $request->user()->update($validated);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function uploudAvatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('tmp/', 'public');
        }
        return $path;
    }

    /**
     * Delete the user's account.
     */
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
}
