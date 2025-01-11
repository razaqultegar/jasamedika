<?php

namespace App\Http\Controllers;

class AccountController extends Controller
{
    public function index()
    {
        $data['title'] = 'Akun';
        return view('account', $data);
    }
}
