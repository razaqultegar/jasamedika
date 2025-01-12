<?php

namespace App\Http\Controllers;

use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = 'Beranda';
        $data['cars'] = Car::limit(6)->get();

        return view('home', $data);
    }
}
