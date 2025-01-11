<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;

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
        $data['user'] = User::where('id', Auth::user()->id)->first();

        return view('settings.edit', $data);
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->license = $request->license ?? null;
        $user->name = $request->name;
        $user->address = $request->address ?? null;
        $user->save();

        if ($user == TRUE) {
            return response()->json(['message' => 'Sukses mengubah profil'], 201);
        }

        return response()->json(['error' => 'Terjadi kesalahan, silahkan coba lagi'], 400);
    }
}
