@extends('layouts.base')

@section('content')
<div class="-mx-4 mb-56">
    <div class="text-center mt-3 mb-7 ">
        <div>
            <p>Total Pemesanan</p>
        </div>
        <div class="flex-grow-1 flex-shrink-1">
            <span class="text-2xl font-bold leading-none">{{ count($cars) }}</span>
        </div>
    </div>
    <div class="history">
        <div style="background-color: #f7f7f7; font-size: 10px; padding: 8px 16px;">Januari 2024</div>
        <ul class="p-0 m-0">
            @foreach ($cars as $value)
            <li>
                <a href="{{ route('history.show', $value->id) }}" class="contents">
                    <div class="grow shrink min-w-0">
                        <h4>#{{ $value->id }}</h4>
                        <span>{{ date('d/m/Y', strtotime($value->start_date)) }} - {{ date('d/m/Y', strtotime($value->end_date)) }}</span>
                    </div>
                    <div class="text-end grow shrink">
                        <h4 class="m-0 text-body text-semibold">{{ currency_formates($value->total_price) }}</h4>
                        <span class="text-xs">{{ $value->status }}</span>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
