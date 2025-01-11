<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }} | {{ config('app.name') }}</title>
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body class="text-base leading-normal">
        <header class="h-header fixed top-0 z-10 flex flex-row min-w-full bg-clrPrimary text-white">
            <div class="mx-auto flex w-480 items-center px-3">
                <button class="focus:outline-none active:outline-none mr-5 border-none leading-none" onclick="history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="16px"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <div>
                    <span class="font-semibold">{{ $title }}</span>
                </div>
            </div>
        </header>
        <div class="max-w-480 relative mx-auto bg-white w-full" style="top: 60px; height: calc(-60px + 100vh);">
            <div class="px-8 py-6">
                <div>
                    <h3 class="mb-4 text-lg font-semibold">Masuk untuk mulai petualangan Anda</h3>
                </div>
                <form action="{{ route('signin') }}" method="post">
                    @csrf
                    <div class="my-10">
                        <div>
                            <div class="form-floating relative">
                                <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Nomor Telepon / WhatsApp</label>
                            </div>
                            @if ($errors->has('phone'))
                                <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="my-10">
                        <div>
                            <div class="form-floating relative">
                                <input type="password" class="form-control" name="password" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Kata Sandi</label>
                                <div id="visibility" class="flex items-center justify-center absolute top-[14px] right-[14px] cursor-pointer">
                                    <svg id="eye" class="block w-5 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M634 471L36 3.51A16 16 0 0 0 13.51 6l-10 12.49A16 16 0 0 0 6 41l598 467.49a16 16 0 0 0 22.49-2.49l10-12.49A16 16 0 0 0 634 471zM296.79 146.47l134.79 105.38C429.36 191.91 380.48 144 320 144a112.26 112.26 0 0 0-23.21 2.47zm46.42 219.07L208.42 260.16C210.65 320.09 259.53 368 320 368a113 113 0 0 0 23.21-2.46zM320 112c98.65 0 189.09 55 237.93 144a285.53 285.53 0 0 1-44 60.2l37.74 29.5a333.7 333.7 0 0 0 52.9-75.11 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64c-36.7 0-71.71 7-104.63 18.81l46.41 36.29c18.94-4.3 38.34-7.1 58.22-7.1zm0 288c-98.65 0-189.08-55-237.93-144a285.47 285.47 0 0 1 44.05-60.19l-37.74-29.5a333.6 333.6 0 0 0-52.89 75.1 32.35 32.35 0 0 0 0 29.19C89.72 376.41 197.08 448 320 448c36.7 0 71.71-7.05 104.63-18.81l-46.41-36.28C359.28 397.2 339.89 400 320 400z"></path></svg>
                                    <svg id="eye-off" class="text-clrPrimary hidden w-5 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="text-center leading-normal cursor-pointer transition-all duration-300 ease-in focus:outline-none focus:text-current w-full align-middle py-2 px-4 rounded-md pointer-events-none cursor-not-allowed text-clrSubText bg-coal font-bold" disabled="">Masuk</button>
                    </div>
                </form>
                <div class="mt-5">
                    <p class="text-center text-body">
                        Belum punya akun?
                        <a href="{{ route('signup') }}" class="text-clrPrimary">Daftar</a>
                    </p>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('js/app.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/pages/signin.min.js') }}"></script>
    </body>
</html>
