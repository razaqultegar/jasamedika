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
        $data['cars'] = Car::where('user_id', Auth::id())->get();

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
            'user_id' => Auth::id(),
            'plate' => $request->plate,
            'model' => $request->model,
            'merk' => $request->merk,
            'price' => str_replace(['Rp', '.', ' '], '', $request->price),
        ]);

        return $car
            ? response()->json(['message' => 'Mobil baru berhasil ditambahkan'], 201)
            : response()->json(['message' => 'Terjadi kesalahan, silahkan coba lagi'], 500);
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);

        if ($car->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengedit mobil ini');
        }

        $data['title'] = 'Sunting Mobil';
        $data['car'] = $car;

        return view('cars.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->update([
            'plate' => $request->plate,
            'model' => $request->model,
            'merk' => $request->merk,
            'price' => str_replace(['Rp', '.', ' '], '', $request->price),
        ]);

        return $car
            ? response()->json(['message' => 'Mobil berhasil diperbarui'], 201)
            : response()->json(['message' => 'Terjadi kesalahan, silahkan coba lagi'], 500);
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        if ($car->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus mobil ini');
        }

        $deleted = Car::destroy($id);

        return $deleted
            ? redirect()->route('cars.index')->with('message', 'Mobil berhasil dihapus')
            : redirect()->back()->with('message', 'Terjadi kesalahan, silahkan coba lagi');
    }
}
