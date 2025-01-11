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
    <div class="relative mx-4 -mt-[8%] mb-4 flex flex-col items-center justify-center rounded-2xl bg-white p-4 shadow-[0_2px_8px_1px_rgba(152,152,152,0.2)]">
        <div class="w-full">
            <label class="text-body block mb-2">Tanggal Rental</label>
            <div class="relative flex items-center rounded-[3px]">
                <span class="border-l-[1px]text-[18px] flex h-[45px] flex-auto items-center rounded-tl-[0px] rounded-bl-[0px] border-[1px] border-t-[1px] border-r-0 border-b-[1px] border-solid border-[#e8e9eb] bg-[#f9f9fa]  px-[0.75em] py-[0.5em]">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" role="img"><path d="M7.019 4a1 1 0 1 1 2 0v1.577a1 1 0 1 1-2 0V4ZM15.019 4a1 1 0 1 1 2 0v1.577a1 1 0 1 1-2 0V4Z" fill="#10A8E5"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 8A3.5 3.5 0 0 1 6 4.5a.5.5 0 0 1 0 1A2.5 2.5 0 0 0 3.5 8v10A2.5 2.5 0 0 0 6 20.5h12a2.5 2.5 0 0 0 2.5-2.5V8A2.5 2.5 0 0 0 18 5.5a.5.5 0 0 1 0-1A3.5 3.5 0 0 1 21.5 8v10a3.5 3.5 0 0 1-3.5 3.5H6A3.5 3.5 0 0 1 2.5 18V8Zm7-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5Z" fill="#6A6A6A"></path><path d="M6.5 10a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1ZM11.5 10a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1ZM15.5 11a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-1ZM6.5 15a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1ZM10.5 16a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-1ZM16.5 15a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1Z" fill="#6A6A6A"></path></svg>
                </span>
                <input type="text" id="datepicker" class="h-[45px] w-full flex-grow rounded-[3px] border-[1px] border-solid border-[#e8e9eb] pt-[9.5px] pr-[9.5px] pb-[9.5px] pl-[15px] transition-all focus:border-[1px] focus:border-solid focus:border-[#3198e8] focus:outline-none" placeholder="Pilih tanggal">
            </div>
        </div>
        <a href="#" class="mt-3 w-full rounded-[3px] bg-cerulean-50 p-3 text-base font-bold text-white">
            <div class="text-center">Ayo Cari</div>
        </a>
    </div>
    <hr class="m-0 h-2 w-full border-0 bg-skull p-0">
    <div class="p-4">
        <h2 class="mb-3.5 text-base font-semibold">Pilihan Mobil</h2>
        <div class="grid grid-cols-2 gap-2">
            <a href="/campaign/jagasyiarislambersama" class="relative w-[220px] flex-shrink-0 rounded-lg bg-white shadow-[0_2px_8px_rgba(152,152,152,0.2)]">
                <img src="https://ik.imagekit.io/tvlk/image/imageResource/2019/11/05/1572928605279-d1e128e08c4b2f362357a325d1c149a4.jpeg?tr=q-75,w-640" alt="Bersama Peduli Menebar Cinta dan Kebaikan Islam" width="220" height="120" class="h-[120px] w-[220px] rounded-tl-lg rounded-tr-lg">
                <div class="p-3">
                    <span class="mb-2 block text-sm font-semibold text-mineshaft">Mitsubishi Xpander</span>
                    <div class="mb-2 flex justify-between">
                        <div class="relative flex items-center">
                            <div class="h-[12px]">
                                <svg width="14" height="14" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-1 -mt-[12px] inline-block"><path fill-rule="evenodd" clip-rule="evenodd" d="M6 0C2.6865 0 0 2.6865 0 6C0 9.3135 2.6865 12 6 12C9.3135 12 12 9.3135 12 6C12 2.6865 9.3135 0 6 0ZM6 1.5C7.9643 1.5 9.6234 2.75775 10.25 4.5H1.75C2.3766 2.75775 4.0357 1.5 6 1.5ZM5.25 6.25C5.25 6.66437 5.58563 7 6 7C6.41437 7 6.75 6.66437 6.75 6.25C6.75 5.83563 6.41437 5.5 6 5.5C5.58563 5.5 5.25 5.83563 5.25 6.25ZM1.5 6C3.55266 6 5.21507 8.00873 5.25 10.5C3.1256 10.1304 1.5 8.26049 1.5 6ZM6.75601 10.5C6.79094 8.00873 8.45335 6 10.506 6C10.506 8.26049 8.88041 10.1304 6.75601 10.5Z" fill="#687176"></path></svg>
                            </div>
                            <span class="inlin-block overflow-hidden text-ellipsis whitespace-nowrap text-xs text-onyx">Automatic</span>
                        </div>
                        <div class="relative flex items-center">
                            <div class="h-[12px]">
                                <svg width="16" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-1 -mt-[12px] inline-block"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 7C2.11929 7 1 8.11929 1 9.5V18.5C1 19.8807 2.11929 21 3.5 21H20.5C21.8807 21 23 19.8807 23 18.5V9.5C23 8.11929 21.8807 7 20.5 7H17V6C17 4.34315 15.6569 3 14 3H10C8.34315 3 7 4.34315 7 6V7H3.5ZM10 5C9.44772 5 9 5.44772 9 6V7H15V6C15 5.44772 14.5523 5 14 5H10ZM5 10C5 9.44772 5.44772 9 6 9C6.55228 9 7 9.44772 7 10V18C7 18.5523 6.55228 19 6 19C5.44772 19 5 18.5523 5 18V10ZM18 9C17.4477 9 17 9.44772 17 10V18C17 18.5523 17.4477 19 18 19C18.5523 19 19 18.5523 19 18V10C19 9.44772 18.5523 9 18 9Z" fill="#687176"></path></svg>
                            </div>
                            <span class="inlin-block overflow-hidden text-ellipsis whitespace-nowrap text-xs text-onyx">2 Bagasi</span>
                        </div>
                        <div class="relative flex items-center">
                            <div class="h-[12px]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="mr-1 -mt-[12px] inline-block"><g fill="none" fill-rule="evenodd"><rect width="16" height="16"></rect><path fill="#687176" d="M5,13 L13,13 C13.5522847,13 14,13.4477153 14,14 C14,14.5522847 13.5522847,15 13,15 L5,15 C4.44771525,15 4,14.5522847 4,14 C4,13.4477153 4.44771525,13 5,13 Z M5.50372906,12 C4.05387063,12 2.81147789,10.9631284 2.55211933,9.53665631 L1.40249224,3.2137073 C1.38234043,3.10287235 1.3722032,2.99044883 1.3722032,2.8777968 C1.3722032,1.84071826 2.21292147,1 3.25,1 C4.57234041,1 5.7249905,1.89996199 6.04570516,3.18282063 L6.81063391,6.24253563 C6.92192566,6.68770263 7.32190876,7 7.78077641,7 L11.9586889,7 C12.6113165,7 13.2228954,7.31842196 13.5971527,7.85307531 L14.75,9.5 C14.936942,9.76705999 15.0372139,10.085159 15.0372139,10.4111472 C15.0372139,11.2886464 14.3258602,12 13.4483611,12 L5.50372906,12 Z"></path><rect width="5" height="2" x="8" y="4" fill="#687176" fill-rule="nonzero" rx="1"></rect></g></svg>
                            </div>
                            <span class="inlin-block overflow-hidden text-ellipsis whitespace-nowrap text-xs text-onyx">6 Kursi</span>
                        </div>
                    </div>
                    <span class="text-sm font-semibold">Rp375.000</span>
                    <span class="text-xs text-mineshaft">/hari</span>
                </div>
            </a>
        </div>
    </div>
    <hr class="m-0 h-2 w-full border-0 bg-skull p-0">
    @include('layouts.footer')
</div>
@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('plugins/flatpickr/flatpickr.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/pages/home.min.js') }}"></script>
@endpush
