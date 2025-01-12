<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Car;
use App\Models\Order;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Beranda';
        $data['model'] = Car::select('model')->groupBy('model')->get();

        $query = Car::query();
        $dates = $this->getDateRange($request);

        if (count($dates) === 2) {
            $startDate = $dates[0];
            $endDate = $dates[1];

            $this->applyFilters($query, $request, $startDate, $endDate);
            $this->applyAvailabilityOrder($query, $request, $startDate, $endDate);
        }

        $data['cars'] = $this->getCarsWithBookingStatus($query);

        return view('home', $data);
    }

    public function checkout(Request $request)
    {
        $data['title'] = 'Pesan Mobil';
        $data['order'] = Car::find($request->query('id'));

        return view('checkout', $data);
    }

    public function checkout_process(Request $request)
    {
        $order = Order::create($request->all());

        return $order
            ? response()->json(['message' => 'Pesanan baru berhasil ditambahkan'], 201)
            : response()->json(['message' => 'Terjadi kesalahan, silahkan coba lagi'], 500);
    }

    public function history()
    {
        $data['title'] = 'Riwayat Pemesanan';
        $data['cars'] = Order::where('user_id', Auth::id())->get();

        return view('history', $data);
    }

    private function getDateRange(Request $request)
    {
        if ($request->has('date_range') && !empty($request->date_range)) {
            $dates = explode(' - ', $request->date_range);
            $request->session()->put('date_range', $request->date_range);
        } else {
            $startDate = now()->format('Y-m-d');
            $endDate = now()->addDay()->format('Y-m-d');
            $dates = [$startDate, $endDate];
            $request->session()->put('date_range', "$startDate - $endDate");
        }

        return $dates;
    }

    private function applyFilters($query, Request $request, $startDate, $endDate)
    {
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
    }

    private function applyAvailabilityOrder($query, Request $request, $startDate, $endDate)
    {
        if ($request->query('available')) {
            $query->orderByRaw(
                '(SELECT COUNT(*) FROM orders WHERE orders.car_id = cars.id AND ((orders.start_date BETWEEN ? AND ?) OR (orders.end_date BETWEEN ? AND ?) OR (orders.start_date <= ? AND orders.end_date >= ?))) ASC',
                [$startDate, $endDate, $startDate, $endDate, $startDate, $endDate]
            );
        }
    }

    private function getCarsWithBookingStatus($query)
    {
        return $query->get()->map(function ($car) {
            $car->is_booked = $car->orders->isNotEmpty();
            return $car;
        });
    }
}
