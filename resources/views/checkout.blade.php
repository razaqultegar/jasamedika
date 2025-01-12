@extends('layouts.base')

@section('content')
<div class="mb-[56px]">
    <div class="flex flex-col py-[1.5em] mx-auto">
        <p class="text-base font-bold mb-2">Alamat Penagihan</p>
        <span class="text-body">{{ Auth::user()->name }}</span>
        <span class="text-body">{{ Auth::user()->phone }}</span>
        <span class="text-body">{{ Auth::user()->address ?? '-' }}</span>
    </div>
    <div class="w-[calc(100% + 32px)] -mx-4 h-2 bg-coal"></div>
    <div class="block py-[1.5em]">
        <fieldset class="m-0">
            <label class="mt-0">Catatan</label>
            <div>
                <textarea rows="4" height="auto" name="address" placeholder="..."></textarea>
            </div>
        </fieldset>
    </div>
    <div class="w-[calc(100% + 32px)] -mx-4 h-2 bg-coal"></div>
    <div id="cart" class="block py-[1.5em]">
        <div data-title="Tanggal Sewa">{{ Session::get('start') }} - {{ Session::get('end') }} <br> ({{ Session::get('days') }} hari)</div>
        <div data-title="Mobil">{{ $order->merk }} - {{ $order->model }}</div>
        <div data-title="Harga Sewa (/per Hari)">{{ currency_formates($order->price) }}</div>
        <div class="font-bold" data-title="Total">{{ currency_formates($order->price * Session::get('days')) }}</div>
    </div>
    <button type="submit" class="btn-primary mt-4 mb-10">
        <span class="indicator-label">Pesan Sekarang</span>
        <span class="indicator-progress"><svg version="1.1" id="L9" x="0px" y="0px" viewBox="25 25 50 50"><path d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50"><animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite"></animateTransform></path></svg></span>
    </button>
</div>
@endsection
