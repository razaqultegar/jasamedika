<div id="filterbymodel" class="modal">
    <div class="h-1/2">
        <div class="mb-6 flex border-b-2 pt-2 pb-3 text-center">
            <div class="w-full">
                <p class="text-base font-semibold">Filter berdasarkan Model</p>
            </div>
            <div class="cursor-pointer mb-0 pt-1" data-dismiss="modal">
                <svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" role="img"><path d="M19.687 5.823a1.068 1.068 0 0 0-1.51-1.51L12 10.49 5.823 4.313a1.068 1.068 0 1 0-1.51 1.51L10.49 12l-6.177 6.177a1.068 1.068 0 1 0 1.51 1.51L12 13.51l6.177 6.177a1.068 1.068 0 0 0 1.51-1.51L13.51 12l6.177-6.177Z" fill="#D8D8D8"></path></svg>
            </div>
        </div>
        <form id="modelform">
            @foreach ($model as $value)
            <div class="flex items-center justify-between px-[0.5em] py-[1em]">
                <p class="m-0 text-tundora">{{ $value->model }}</p>
                <label for="{{ $value->model }}">
                    <div class="checkbox-container">
                        <input type="checkbox" id="{{ $value->model }}" name="model" value="{{ $value->model }}" {{ in_array($value->model, explode(',', request()->query('model', ''))) ? 'checked' : '' }}>
                        <span>
                            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" role="img"><path fill-rule="evenodd" clip-rule="evenodd" d="M19.558 5.154a.929.929 0 0 1 .283 1.31L11.684 18.57a.994.994 0 0 1-1.501.157L4.29 13.107a.926.926 0 0 1-.01-1.338.997.997 0 0 1 1.379-.01l5.042 4.81 7.505-11.14a.994.994 0 0 1 1.35-.275Z" fill="#FEFEFE"></path></svg>
                        </span>
                    </div>
                </label>
            </div>
            @endforeach
            <div class="w-full mt-[30px]">
                <button type="submit" class="btn-primary">TERAPKAN FILTER</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    document.getElementById('modelform').addEventListener('submit', function(event) {
        event.preventDefault();

        const currentUrl = new URL(window.location.href);
        const model = Array.from(this.elements['model'])
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);

        currentUrl.searchParams.set('model', model.join(','));
        window.location.href = currentUrl.toString();
    });
</script>
@endpush

