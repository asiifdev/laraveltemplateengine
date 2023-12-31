<!-- Vendor Scripts Start -->
<script src="{{ asset('dashboard/js/vendor/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('dashboard/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dashboard/js/vendor/OverlayScrollbars.min.js') }}"></script>
<script src="{{ asset('dashboard/js/vendor/autoComplete.min.js') }}"></script>
<script src="{{ asset('dashboard/js/vendor/clamp.min.js') }}"></script>
<script src="{{ asset('dashboard/icon/acorn-icons.js') }}"></script>
<script src="{{ asset('dashboard/icon/acorn-icons-interface.js') }}"></script>
@yield('js_vendor')
<!-- Vendor Scripts End -->
<!-- Template Base Scripts Start -->
<script src="{{ asset('dashboard/js/base/helpers.js') }}"></script>
<script src="{{ asset('dashboard/js/base/globals.js') }}"></script>
<script src="{{ asset('dashboard/js/base/nav.js') }}"></script>
<script src="{{ asset('dashboard/js/base/search.js') }}"></script>
<script src="{{ asset('dashboard/js/base/settings.js') }}"></script>
<!-- Template Base Scripts End -->
<!-- Page Specific Scripts Start -->
@yield('js_page')
<script src="{{ asset('dashboard/js/common.js') }}"></script>
<script src="{{ asset('dashboard/js/scripts.js') }}"></script>
<!-- Page Specific Scripts End -->
