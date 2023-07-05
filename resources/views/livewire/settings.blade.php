<div>
    @section('css')
    @endsection

    @section('js_vendor')
    @endsection

    @section('js_page')
        <script src="{{ asset('dashboard/js/pages/horizontal.js') }}"></script>
    @endsection
    <div class="container">
        @component('components.bread-crumbs')
        @endcomponent

        <!-- Content Start -->
        <div class="card mb-2" style="">
            <div class="card-body h-100">
                <h1 class="mb-3">List All menu {{ getCurrentMenu()->name }}</h1>
                @component('components.card-list-menu')
                @endcomponent
            </div>
        </div>
        <!-- Content End -->
    </div>
</div>
