<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        $data['title'] = 'Masuk';
        return view('auth.signin', $data);
    }

    public function store(Request $request)
    {
        if (Auth::attempt($request->only('phone', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withInput()
            ->withErrors(['phone' => 'User tidak ditemukan']);
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
