<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Carbon\Carbon;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Mobil';
        $query = Car::query();

        if ($request->has('date_range') && !empty($request->date_range)) {
            $dates = explode(' - ', $request->date_range);

            if (count($dates) === 2) {
                $startDate = $dates[0];
                $endDate = $dates[1];

                // Filter cars based on availability
                $query->whereDoesntHave('orders', function ($q) use ($startDate, $endDate) {
                    $q->where(function ($subQuery) use ($startDate, $endDate) {
                        $subQuery->whereBetween('start_date', [$startDate, $endDate])
                            ->orWhereBetween('end_date', [$startDate, $endDate])
                            ->orWhere(function ($innerQuery) use ($startDate, $endDate) {
                                $innerQuery->where('start_date', '<=', $startDate)
                                    ->where('end_date', '>=', $endDate);
                            });
                    });
                });

                $start = Carbon::createFromFormat('Y-m-d', $startDate);
                $end = Carbon::createFromFormat('Y-m-d', $endDate);
                $days = $start->diffInDays($end);

                session()->put('start', $start->format('d/m/Y'));
                session()->put('end', $end->format('d/m/Y'));
                session()->put('days', $days);
            }
        }

        $data['cars'] = $query->get();

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
