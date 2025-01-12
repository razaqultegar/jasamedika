<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $data['title'] = 'Mobil';
        $data['cars'] = Car::where('user_id', Auth::user()->id)->get();

        return view('cars.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Mobil';
        return view('cars.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'plate' => 'required|unique:cars,plate',
        ], [
            'plate.unique' => 'Nomor polisi tersebut sudah terdaftar',
        ]);

        $car = Car::create([
            'plate' => $request->plate,
            'model' => $request->model,
            'merk' => $request->merk,
            'price' => str_replace(['Rp', '.', ' '], '', $request->price),
        ]);

        if ($car) {
            return response()->json(['message' => 'Mobil baru berhasil ditambahkan'], 201);
        }

        return response()->json(['message' => 'Terjadi kesalahan, silahkan coba lagi'], 500);
    }
}
