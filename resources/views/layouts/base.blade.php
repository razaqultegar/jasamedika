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
        @stack('styles')
    </head>
    <body>
        <main class="my-0 mx-auto min-h-full max-w-screen-sm">
            @if (Request::segment(1) != NULL)
            <header class="fixed top-0 left-0 z-10 flex flex-row min-w-full text-white" style="height: 60px; background-color: rgb(0, 174, 239);">
                <div class="flex items-center px-3 mx-auto" style="width: 480px;">
                    @if (Request::segment(2) != NULL)
                    <button class="focus:outline-none active:outline-none mr-5 leading-none border-none" onclick="history.back()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="16px"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    @endif
                    <div class="truncate">
                        <span class="overflow-hidden text-ellipsis text-base font-semibold capitalize">{{ $title }}</span>
                    </div>
                </div>
            </header>
            @endif
            @if (Request::segment(1) != NULL) <main class="app-main"> @endif
                @yield('content')
            @if (Request::segment(1) != NULL) </main> @endif
            @if (Request::segment(2) == NULL) @include('layouts.menu') @endif
        </main>
        <script type="text/javascript" src="{{ asset('js/app.min.js') }}"></script>
        @stack('scripts')
    </body>
</html>
