@extends('layouts.base')

@section('content')
<div class="pb-[66px]">
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

@include('cars.modals.merk')
@include('cars.modals.model')
@include('cars.modals.sort')

@auth
<div class="fixed bottom-24 z-[2] w-480 -mx-4 flex justify-end">
    <a href="{{ route('cars.create') }}" class="block flex h-10 w-10 items-center justify-center rounded-full border-none bg-white shadow-xl mr-5">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_684_319)"><path d="M22.2857 13.7143H13.7143V22.2857C13.7143 22.7404 13.5337 23.1764 13.2122 23.4979C12.8907 23.8194 12.4547 24 12 24C11.5453 24 11.1093 23.8194 10.7878 23.4979C10.4663 23.1764 10.2857 22.7404 10.2857 22.2857V13.7143H1.71429C1.25963 13.7143 0.823594 13.5337 0.502103 13.2122C0.180612 12.8907 0 12.4547 0 12C0 11.5453 0.180612 11.1093 0.502103 10.7878C0.823594 10.4663 1.25963 10.2857 1.71429 10.2857H10.2857V1.71429C10.2857 1.25963 10.4663 0.823593 10.7878 0.502102C11.1093 0.180611 11.5453 0 12 0C12.4547 0 12.8907 0.180611 13.2122 0.502102C13.5337 0.823593 13.7143 1.25963 13.7143 1.71429V10.2857H22.2857C22.7404 10.2857 23.1764 10.4663 23.4979 10.7878C23.8194 11.1093 24 11.5453 24 12C24 12.4547 23.8194 12.8907 23.4979 13.2122C23.1764 13.5337 22.7404 13.7143 22.2857 13.7143Z" fill="#10A8E5"/></g><defs><clipPath id="clip0_684_319"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
    </a>
</div>
@endauth
@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('js/pages/cars.min.js') }}"></script>
@endpush
