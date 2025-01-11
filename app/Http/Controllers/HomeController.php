<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = 'Beranda';
        return view('home', $data);
    }
}
