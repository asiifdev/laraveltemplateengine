<div>
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
</div>
