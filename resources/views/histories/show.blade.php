@extends('layouts.base')

@section('content')
<div class="mb-[56px]">
    <div id="cart" class="block py-[1.5em]">
        @php
            $start = \Carbon\Carbon::parse($order->start_date);
            $end = \Carbon\Carbon::parse($order->end_date);
            $days = $start->diffInDays($end);
        @endphp
        <div data-title="Tanggal Sewa">{{ $start->format('d-m-Y') }} - {{ $end->format('d-m-Y') }}<br>({{ $days }} Hari)</div>
        <div data-title="Mobil">{{ $order->car->merk }} - {{ $order->car->model }}</div>
        <div data-title="Harga Sewa (/per Hari)">{{ currency_formates($order->car->price) }}</div>
        <div class="font-bold" data-title="Total">{{ currency_formates($order->total_price) }}</div>
    </div>
    @if ($order->status != 'Selesai')
    <form action="{{ route('history.show', $order->id) }}" method="post">
        @csrf
        @method('put')
        <button type="submit" class="btn-primary mt-4 mb-10">
            <span class="indicator-label">Kembalikan</span>
            <span class="indicator-progress"><svg version="1.1" id="L9" x="0px" y="0px" viewBox="25 25 50 50"><path d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50"><animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite"></animateTransform></path></svg></span>
        </button>
    </form>
    @endif
</div>
@endsection
