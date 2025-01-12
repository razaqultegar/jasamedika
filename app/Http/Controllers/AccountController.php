<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $data['title'] = 'Akun';
        return view('account', $data);
    }

    public function edit()
    {
        $data['title'] = 'Sunting Akun';
        $data['user'] = Auth::user();

        return view('settings.edit', $data);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->update([
            'license' => $request->license ?? null,
            'name' => $request->name,
            'address' => $request->address ?? null,
        ]);

        return $user
            ? response()->json(['message' => 'Sukses mengubah profil'], 201)
            : response()->json(['error' => 'Terjadi kesalahan, silahkan coba lagi'], 400);
    }
}
