@extends('layouts.base')

@section('content')
<form action="{{ route('cars.create') }}" method="post">
    @csrf
    <fieldset>
        <label class="required">Nomor Polisi</label>
        <div>
            <input type="text" name="plate" placeholder="..." required>
        </div>
    </fieldset>
    <fieldset>
        <label class="required">Merk</label>
        <div>
            <select name="merk" required>
                <option value="">-- Pilih Merk --</option>
                <option value="Toyota">Toyota</option>
                <option value="Daihatsu">Daihatsu</option>
                <option value="Honda">Honda</option>
                <option value="Mitsubishi">Mitsubishi</option>
                <option value="Suzuki">Suzuki</option>
            </select>
        </div>
    </fieldset>
    <fieldset>
        <label class="required">Model</label>
        <div>
            <input type="text" name="model" placeholder="..." required>
        </div>
    </fieldset>
    <fieldset>
        <label class="required">Harga Sewa (/per Hari)</label>
        <div>
            <input type="text" name="price" placeholder="Rp0" required>
        </div>
    </fieldset>
    <button type="submit" class="btn-primary mt-4" disabled>
        <span class="indicator-label">Simpan</span>
        <span class="indicator-progress"><svg version="1.1" id="L9" x="0px" y="0px" viewBox="25 25 50 50"><path d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50"><animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite"></animateTransform></path></svg></span>
    </button>
</form>
@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('plugins/inputmask/inputmask.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/pages/create_cars.min.js') }}"></script>
@endpush
