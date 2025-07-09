<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;



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
    $user = Auth::user();

    // Upload foto (jika ada)
    if ($request->hasFile('foto')) {
        Log::info('Foto ditemukan:', [
            'nama_file' => $request->file('foto')->getClientOriginalName()
        ]);

        if ($user->foto && Storage::disk('public')->exists($user->foto)) {
            Storage::disk('public')->delete($user->foto);
            Log::info('Foto lama dihapus.');
        }

        $path = $request->file('foto')->store('foto_profil', 'public');
        $user->foto = $path;
    }

    // Simpan data lainnya (selalu dijalankan)
    $user->fill($request->only(['nama', 'email', 'nomor_hp', 'alamat']));
    $user->save();

    return back()->with('success', 'Profil berhasil diperbarui.');
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
