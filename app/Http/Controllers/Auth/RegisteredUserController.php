<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

use App\Models\User;

class RegisteredUserController extends Controller
{
    public function create()
    {
        $data['title'] = 'Mendaftar';
        return view('auth.signup', $data);
    }

    public function store(Request $request)
    {
        $validated = User::where('phone', $request->phone)->first();

        if ($validated) {
            return redirect()->route('signin')
                ->withInput($request->only('phone'))
                ->withErrors(['phone' => 'Nomor telepon atau WhatsApp tersebut sudah terdaftar.']);
        }

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
