<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = 'Beranda';
        $data['cars'] = Car::limit(6)->get();

        return view('home', $data);
    }

    public function checkout(Request $request)
    {
        $data['title'] = 'Pesan Mobil';
        $data['order'] = Car::where('id', $request->query('id'))->first();

        return view('checkout', $data);
    }
}
