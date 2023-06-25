<div>
    @section('css')
    @endsection

    @section('js_vendor')
    @endsection

    @section('js_page')
        <script src="{{ asset('dashboard/js/pages/vertical.js') }}"></script>
    @endsection
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">{{ getCurrentMenu()->title }}</h1>
                    @include('dashboard._layouts.breadcrumb', [
                        'breadcrumbs' => getBreadCrumbs(),
                    ])
                </div>
                <!-- Title End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <!-- Content Start -->
        <div class="card mb-2">
            <div class="card-body h-100">{{ getCurrentMenu()->description }}</div>
        </div>
        <!-- Content End -->
    </div>
</div>
