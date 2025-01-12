@extends('layouts.base')

@push('styles')
<link href="{{ asset('plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
<div class="my-0 mx-auto min-h-screen max-w-480 overflow-x-hidden bg-white pb-[66px]">
    <div class="rounded-b-[42.667px] bg-gradient-to-b from-[#10A8E5] to-[#89D0EC]">
        <div class="px-8 pt-[65px] text-center text-white sm:px-[42.67px]">
            <h2 class="text-base font-bold leading-tight -tracking-[.24px] sm:text-[24px]">Rental Mobil 🚘 Tanpa Ribet 🙅‍♂️ <br> Bisa Langsung Jalan 🛣️</h2>
            <h3 class="mt-3 text-body sm:text-[18px]">Perjalanan keluarga atau bisnis, kami punya berbagai jenis mobil yang tepat untuk Anda.</h3>
        </div>
        <div class="mt-4 -mb-1 flex flex-wrap justify-center px-4">
            <a href="itms-apps://?action=discover&referrer=app-store" class="m-1" target="_blank" rel="noreferrer">
                <img src="{{ asset('medias/svg/app_store.svg') }}" alt="app store" class="max-h-[42px]" width="135" height="42">
            </a>
            <a href="https://play.google.com/store/apps?hl=id" class="m-1" target="_blank" rel="noreferrer">
                <img src="{{ asset('medias/svg/google_play.svg') }}" alt="google play" class="max-h-[42px]" width="135" height="42">
            </a>
        </div>
        <div>
            <img src="{{ asset('medias/bg-hero.png') }}" alt="hero cover" class="w-full rounded-b-[42.667px]">
        </div>
    </div>
    <form action="{{ route('home') }}" method="get" class="relative mx-4 -mt-[8%] mb-4 flex flex-col items-center justify-center rounded-2xl bg-white p-4 shadow-[0_2px_8px_1px_rgba(152,152,152,0.2)]">
        @csrf
        <div class="w-full">
            <label class="text-body block mb-2">Tanggal Rental</label>
            <div class="relative flex items-center">
                <span class="border-l-[1px]text-[18px] flex h-[45px] flex-auto items-center rounded-s-[3px] rounded-e-none border-[1px] border-t-[1px] border-r-0 border-b-[1px] border-solid border-[#e8e9eb] bg-[#f9f9fa]  px-[0.75em] py-[0.5em]">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" role="img"><path d="M7.019 4a1 1 0 1 1 2 0v1.577a1 1 0 1 1-2 0V4ZM15.019 4a1 1 0 1 1 2 0v1.577a1 1 0 1 1-2 0V4Z" fill="#10A8E5"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 8A3.5 3.5 0 0 1 6 4.5a.5.5 0 0 1 0 1A2.5 2.5 0 0 0 3.5 8v10A2.5 2.5 0 0 0 6 20.5h12a2.5 2.5 0 0 0 2.5-2.5V8A2.5 2.5 0 0 0 18 5.5a.5.5 0 0 1 0-1A3.5 3.5 0 0 1 21.5 8v10a3.5 3.5 0 0 1-3.5 3.5H6A3.5 3.5 0 0 1 2.5 18V8Zm7-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5Z" fill="#6A6A6A"></path><path d="M6.5 10a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1ZM11.5 10a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1ZM15.5 11a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-1ZM6.5 15a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1ZM10.5 16a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-1ZM16.5 15a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1Z" fill="#6A6A6A"></path></svg>
                </span>
                <input type="text" id="datepicker" class="h-[45px] w-full flex-grow rounded-s-none rounded-e-[3px] border-[1px] border-solid border-[#e8e9eb] pt-[9.5px] pr-[9.5px] pb-[9.5px] pl-[15px] transition-all focus:border-[1px] focus:border-solid focus:border-[#3198e8] focus:outline-none" name="date_range" placeholder="Pilih tanggal">
            </div>
        </div>
        <button type="submit" class="mt-3 w-full rounded-[3px] bg-cerulean-50 p-3 text-base font-bold text-white text-center">Ayo Cari</button>
    </form>
    <hr class="m-0 h-2 w-full border-0 bg-skull p-0">
    <div class="p-4">
        <h2 class="mb-3.5 text-base font-semibold">Pilihan Mobil</h2>
        <div class="box-shadow mx-[-16px] mb-[8px] border-t border-solid border-[#e8e8e8]"></div>
        <div class="my-0 flex justify-around">
            <div class="relative flex w-full cursor-pointer items-center justify-center border-r border-solid border-[#e8e8e8] p-[0.5em] text-center text-[12px] font-semibold" data-toggle="modal" data-target="#filterbymerk">
                <div class="flex justify-end">
                    <span class="mr-[5px]">
                        <img src="{{ asset('medias/svg/icon_category.svg') }}" alt="category">
                    </span>
                    <span class="relative top-[4px]">Merk</span>
                </div>
            </div>
            <div class="flex w-full cursor-pointer items-center justify-center p-[0.5em] text-center text-[12px] font-semibold" data-toggle="modal" data-target="#filterbymodel">
                <div class="flex justify-end">
                    <span>
                        <img src="{{ asset('medias/svg/icon_filter.svg') }}" alt="filter">
                    </span>
                    <span class="relative top-[4px]">Model</span>
                </div>
            </div>
            <div class="flex w-full cursor-pointer items-center justify-center border-l border-solid border-[#e8e8e8] p-[0.5em] text-center text-[12px] font-semibold" data-toggle="modal" data-target="#sort">
                <div class="flex justify-end">
                    <span class="mr-[5px]">
                        <img src="{{ asset('medias/svg/icon_sort.svg') }}" alt="sort">
                    </span>
                    <span class="relative top-[4px]">Urutkan</span>
                </div>
            </div>
        </div>
        <div class="box-shadow mx-[-16px] mt-[8px] border-b border-solid border-[#e8e8e8]"></div>
        <div class="mt-4">
            <div class="grid grid-cols-2 gap-x-2 gap-y-6">
                @foreach ($cars as $value)
                @if($value->is_booked)
                <a href="#" class="relative w-full flex-shrink-0 rounded-lg bg-white cursor-not-allowed shadow-[0_2px_8px_rgba(152,152,152,0.2)]">
                    <span class="absolute top-0 left-0 inline-block px-2 py-1 text-xs font-semibold text-white bg-red-500 rounded-tr-lg">Tidak Tersedia</span>
                @else
                <a href="{{ route('checkout', ['id' => $value->id, 'action' => 'checkout']) }}" class="relative w-full flex-shrink-0 rounded-lg bg-white shadow-[0_2px_8px_rgba(152,152,152,0.2)]">
                    <span class="absolute top-0 left-0 inline-block px-2 py-1 text-xs font-semibold text-white bg-green-500 rounded-tr-lg">Tersedia</span>
                @endif
                    <img src="https://ik.imagekit.io/tvlk/image/imageResource/2019/11/05/1572928605279-d1e128e08c4b2f362357a325d1c149a4.jpeg?tr=q-75,w-640" alt="Bersama Peduli Menebar Cinta dan Kebaikan Islam" width="220" height="120" class="h-[120px] w-full rounded-tl-lg rounded-tr-lg">
                    <div class="p-3">
                        <span class="mb-2 block text-sm font-semibold text-mineshaft">{{ $value->merk }} {{ $value->model }}</span>
                        <div class="mb-2 flex justify-between">
                            <div class="relative flex items-center">
                                <div class="h-[12px]">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-1 -mt-[12px] inline-block"><path d="M8.5 2C8.5 1.86739 8.44732 1.74021 8.35355 1.64645C8.25978 1.55268 8.13261 1.5 8 1.5C7.86739 1.5 7.74022 1.55268 7.64645 1.64645C7.55268 1.74021 7.5 1.86739 7.5 2V3.33333C7.5 3.46594 7.55268 3.59312 7.64645 3.68689C7.74022 3.78065 7.86739 3.83333 8 3.83333C8.13261 3.83333 8.25978 3.78065 8.35355 3.68689C8.44732 3.59312 8.5 3.46594 8.5 3.33333V2Z" fill="#687176"/><path fill-rule="evenodd" clip-rule="evenodd" d="M15.1667 8.03797C15.1667 9.26264 15.1667 10.2333 15.0647 10.9926C14.9593 11.774 14.738 12.4066 14.2393 12.906C13.74 13.4046 13.1073 13.626 12.326 13.7313C11.566 13.8333 10.596 13.8333 9.37068 13.8333H6.62935C5.40468 13.8333 4.43401 13.8333 3.67468 13.7313C2.89335 13.626 2.26068 13.4046 1.76135 12.906C1.26268 12.4066 1.04135 11.774 0.936015 10.9926C0.834015 10.2326 0.834015 9.26264 0.834015 8.03731V7.41997C0.834459 7.16442 0.836237 6.92086 0.839348 6.68931C0.848681 6.03931 0.872682 5.48264 0.936015 5.00731C1.04135 4.22597 1.26268 3.59331 1.76135 3.09397C2.26068 2.59531 2.89335 2.37397 3.67468 2.26864C4.15201 2.20464 4.71335 2.18064 5.36868 2.17197L5.83335 2.16864C5.9209 2.16855 6.0076 2.18571 6.08852 2.21913C6.16944 2.25255 6.24298 2.30159 6.30495 2.36343C6.36691 2.42527 6.41609 2.49872 6.44968 2.57957C6.48326 2.66042 6.50059 2.74709 6.50068 2.83464V3.33331C6.50068 3.73113 6.65872 4.11266 6.94002 4.39397C7.22133 4.67527 7.60286 4.83331 8.00068 4.83331C8.39851 4.83331 8.78004 4.67527 9.06134 4.39397C9.34265 4.11266 9.50068 3.73113 9.50068 3.33331V2.83331C9.50068 2.46531 9.79935 2.16664 10.1673 2.16797C11.0273 2.17197 11.74 2.18997 12.3267 2.26864C13.108 2.37397 13.7407 2.59531 14.24 3.09397C14.7387 3.59331 14.96 4.22597 15.0653 5.00731C15.1673 5.76731 15.1673 6.73731 15.1673 7.96264L15.1667 8.03797ZM5.33335 6.49997C5.20074 6.49997 5.07356 6.55265 4.97979 6.64642C4.88603 6.74019 4.83335 6.86736 4.83335 6.99997C4.83335 7.13258 4.88603 7.25976 4.97979 7.35353C5.07356 7.44729 5.20074 7.49997 5.33335 7.49997H10.6667C10.7993 7.49997 10.9265 7.44729 11.0202 7.35353C11.114 7.25976 11.1667 7.13258 11.1667 6.99997C11.1667 6.86736 11.114 6.74019 11.0202 6.64642C10.9265 6.55265 10.7993 6.49997 10.6667 6.49997H5.33335ZM5.33335 8.83331C5.20074 8.83331 5.07356 8.88598 4.97979 8.97975C4.88603 9.07352 4.83335 9.2007 4.83335 9.33331C4.83335 9.46591 4.88603 9.59309 4.97979 9.68686C5.07356 9.78063 5.20074 9.83331 5.33335 9.83331H9.00001C9.13262 9.83331 9.2598 9.78063 9.35357 9.68686C9.44734 9.59309 9.50001 9.46591 9.50001 9.33331C9.50001 9.2007 9.44734 9.07352 9.35357 8.97975C9.2598 8.88598 9.13262 8.83331 9.00001 8.83331H5.33335Z" fill="#687176"/></svg>
                                </div>
                                <span class="inlin-block overflow-hidden text-ellipsis whitespace-nowrap text-xs text-onyx">{{ $value->plate }}</span>
                            </div>
                        </div>
                        <span class="text-sm font-semibold">{{ currency_formates($value->price) }}</span>
                        <span class="text-xs text-mineshaft">/hari</span>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    <hr class="m-0 h-2 w-full border-0 bg-skull p-0">
    @include('layouts.footer')
    @include('modals.merk')
    @include('modals.model')
    @include('modals.sort')
</div>
@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('plugins/flatpickr/flatpickr.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/pages/home.min.js') }}"></script>
@endpush
