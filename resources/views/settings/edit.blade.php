@extends('layouts.base')

@section('content')
<form action="{{ route('account.edit') }}" method="post">
    @csrf
    <fieldset>
        <label class="required">No. SIM</label>
        <div>
            <input type="text" name="license" placeholder="..." value="{{ $user->license }}" required>
        </div>
    </fieldset>
    <fieldset>
        <label class="required">Nama Lengkap</label>
        <div>
            <input type="text" name="name" placeholder="..." value="{{ $user->name }}" required>
        </div>
    </fieldset>
    <fieldset>
        <label class="required">Nomor Telepon / WhatsApp</label>
        <div>
            <input type="text" name="phone" placeholder="..." value="{{ $user->phone }}" disabled>
        </div>
    </fieldset>
    <fieldset>
        <label class="required">Alamat Tinggal</label>
        <div>
            <textarea rows="4" height="auto" name="address" placeholder="..." required>{{ $user->address }}</textarea>
        </div>
    </fieldset>
    <div class="notice">Informasi berikut <span class="font-semibold">hanya dapat dilihat oleh kamu</span> dan tidak akan kami publikasikan</div>
    <button type="submit" class="btn-primary">
        <span class="indicator-label">Simpan</span>
        <span class="indicator-progress"><svg version="1.1" id="L9" x="0px" y="0px" viewBox="25 25 50 50"><path d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50"><animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite"></animateTransform></path></svg></span>
    </button>
</form>
@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('js/pages/setting.min.js') }}"></script>
@endpush
