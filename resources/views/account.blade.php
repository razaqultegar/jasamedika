@extends('layouts.base')

@section('content')
<div class="mb-[56px]">
    @guest
    <div class="my-6 mx-2 text-left text-[18px] font-semibold">Masuk untuk nikmati mudahnya donasi dan akses ke fitur lainnya!</div>
    <div class="my-4 mx-1">
        <a href="{{ route('signin') }}" class="btn-outline-primary">Masuk sekarang</a>
        <div class="mt-4 text-center">
            Belum punya akun?
            <a href="{{ route('signup') }}" class="font-semibold">Daftar</a>
        </div>
    </div>
    @else
    <div class="flex items-center py-[1.5em] px-0">
        <div class="mr-[10px] flex items-center justify-center rounded-full bg-mercury text-base leading-[22px]" style="width: 48px; height: 48px; margin-right: 10px;">
            <span>{{ initial_formates(Auth::user()->name) }}</span>
        </div>
        <div class="ml-4 flex flex-col text-cerulean50">
            <span class="mb-[10px] text-base font-semibold leading-[22px] text-mineshaft80">{{ Auth::user()->name }}</span>
            <div>
                <a href="{{ route('account.edit') }}" class="btn-outline-primary btn-sm">Sunting Akun</a>
            </div>
        </div>
    </div>
    <div class="w-[calc(100% + 32px)] -mx-4 h-2 bg-coal"></div>
    <a href="{{ route('signout') }}" style="color: rgb(74, 74, 74);">
        <div class="flex h-[75px] cursor-pointer items-center px-2 py-5">
            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" class="text-xl"><path d="M19.707 9.293a1 1 0 1 0-1.414 1.414l.293.293H16a1 1 0 1 0 0 2h2.586l-.293.293a1 1 0 0 0 1.414 1.414l2-2a1 1 0 0 0 0-1.414l-2-2Z" fill="#10A8E5"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M13.75 3.25H7a3 3 0 0 0-3 3v12.102a3 3 0 0 0 2.555 2.967l4 .6a2.996 2.996 0 0 0 2.847-1.169h.348A3.75 3.75 0 0 0 17.5 17v-.647a.75.75 0 0 0-1.5 0V17a2.25 2.25 0 0 1-2.013 2.238c.008-.094.013-.19.013-.286V6.65c0-.717-.253-1.38-.679-1.9h.429A2.25 2.25 0 0 1 16 7v.647a.75.75 0 0 0 1.5 0V7a3.75 3.75 0 0 0-3.75-3.75Zm-6.6 1.508 4 .4A1.5 1.5 0 0 1 12.5 6.65v12.302a1.5 1.5 0 0 1-1.723 1.483l-4-.6A1.5 1.5 0 0 1 5.5 18.352V6.25a1.5 1.5 0 0 1 1.65-1.492Z" fill="#6A6A6A"></path></svg>
            <span class="mx-[1em] my-0 flex-[1] text-base leading-[19px]">Keluar</span>
            <div class="m-0">
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" class="float-right"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.389 2.389a1.327 1.327 0 0 1 1.876 0l8.673 8.673a1.326 1.326 0 0 1 0 1.876l-8.673 8.673a1.327 1.327 0 0 1-1.876-1.876L14.124 12 6.389 4.265a1.327 1.327 0 0 1 0-1.876Z" fill="#D8D8D8"></path></svg>
            </div>
        </div>
    </a>
    @endif
</div>
@endsection
