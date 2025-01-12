<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Car;
use App\Models\Order;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Beranda';
        $data['model'] = Car::select('model',)->groupBy('model')->get();

        $query = Car::query();

        if ($request->has('date_range') && !empty($request->date_range)) {
            $dates = explode(' - ', $request->date_range);
        } else {
            $startDate = now()->format('Y-m-d');
            $endDate = now()->addDay()->format('Y-m-d');
            $dates = [$startDate, $endDate];
        }

        if (count($dates) === 2) {
            $startDate = $dates[0];
            $endDate = $dates[1];

            if ($request->query('merk')) {
                $merk = explode(',', $request->merk);
                $query->whereIn('merk', $merk);
            }

            if ($request->query('model')) {
                $model = explode(',', $request->model);
                $query->whereIn('model', $model);
            }

            $query->with(['orders' => function ($q) use ($startDate, $endDate) {
                $q->where(function ($subQuery) use ($startDate, $endDate) {
                    $subQuery->whereBetween('start_date', [$startDate, $endDate])
                        ->orWhereBetween('end_date', [$startDate, $endDate])
                        ->orWhere(function ($innerQuery) use ($startDate, $endDate) {
                            $innerQuery->where('start_date', '<=', $startDate)
                                ->where('end_date', '>=', $endDate);
                        });
                });
            }]);

            if ($request->query('available')) {
                $query->orderByRaw('(SELECT COUNT(*) FROM orders WHERE orders.car_id = cars.id AND ((orders.start_date BETWEEN ? AND ?) OR (orders.end_date BETWEEN ? AND ?) OR (orders.start_date <= ? AND orders.end_date >= ?))) ASC', [$startDate, $endDate, $startDate, $endDate, $startDate, $endDate]);
            }
        }

        $cars = $query->get()->map(function ($car) {
            $car->is_booked = $car->orders->isNotEmpty();
            return $car;
        });

        $data['cars'] = $cars;

        return view('home', $data);
    }

    public function checkout(Request $request)
    {
        $data['title'] = 'Pesan Mobil';
        $data['order'] = Car::where('id', $request->query('id'))->first();

        return view('checkout', $data);
    }

    public function store(Request $request)
    {
        $order = Order::create($request->all());

        if ($order) {
            return response()->json(['message' => 'Pesanan baru berhasil ditambahkan'], 201);
        }

        return response()->json(['message' => 'Terjadi kesalahan, silahkan coba lagi'], 500);
    }
}
