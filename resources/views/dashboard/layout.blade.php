<!DOCTYPE html>
<html lang="en" data-url-prefix="/" data-footer="true"
    @isset($html_tag_data)
    @foreach ($html_tag_data as $key => $value)
    data-{{ $key }}='{{ $value }}'
    @endforeach
@endisset>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Acorn Admin Template | {{ $title }}</title>
    <meta name="description" content="{{ $description }}" />
    @include('dashboard._layouts.head')
</head>

<body>
    <div id="root">
        <div id="nav" class="nav-container d-flex"
            @isset($custom_nav_data) @foreach ($custom_nav_data as $key => $value)
    data-{{ $key }}="{{ $value }}"
        @endforeach
        @endisset>
            @include('dashboard._layouts.nav')
        </div>
        <main>
            @yield('content')
        </main>
        @include('dashboard._layouts.footer')
    </div>
    @include('dashboard._layouts.modal_settings')
    @include('dashboard._layouts.modal_search')
    @include('dashboard._layouts.scripts')
</body>

</html>
