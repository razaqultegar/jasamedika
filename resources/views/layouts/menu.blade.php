<div class="font-base fixed bottom-0 z-[2] m-0 flex w-full max-w-[480px] list-none border-t border-[#dedede] bg-white p-2.5 text-center align-middle font-semibold leading-[13px] no-underline justify-around">
    <a href="{{ route('home') }}" class="inline-block w-1/5 cursor-pointer text-[10px]">
        <div class="relative mb-1 pt-1">
            <img src="{{ request()->routeIs('home') ? asset('medias/svg/home_active.svg') : asset('medias/svg/home.svg') }}" alt="beranda" class="inline-block h-[24px] w-[24px]">
        </div>
        <span class="inline-block whitespace-nowrap {{ request()->routeIs('home') ? 'text-[#00aaef]' : 'text-[#a8a8a8]' }}">Beranda</span>
    </a>
    <a href="{{ route('account.index') }}" class="inline-block w-1/5 cursor-pointer text-[10px]">
        <div class="relative mb-1 pt-1">
            <img src="{{ request()->routeIs('account.index') ? asset('medias/svg/account_navbar_active.svg') : asset('medias/svg/account_navbar.svg') }}" alt="akun-saya" class="inline-block h-[24px] w-[24px]">
        </div>
        <span class="inline-block whitespace-nowrap {{ request()->routeIs('account.index') ? 'text-[#00aaef]' : 'text-[#a8a8a8]' }}">Akun</span>
    </a>
</div>
