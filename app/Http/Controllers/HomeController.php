<?php

namespace App\Http\Controllers;

use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = 'Beranda';
        $data['cars'] = Car::all();

        return view('home', $data);
    }
}
