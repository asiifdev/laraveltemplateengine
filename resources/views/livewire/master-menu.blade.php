<div>
    @section('css')
    @endsection

    @section('js_vendor')
    @endsection

    @section('js_page')
        <script src="{{ asset('dashboard/js/pages/vertical.js') }}"></script>
    @endsection
    <div class="container">
        @component('components.bread-crumbs')
        @endcomponent
        <!-- Content Start -->
        <div class="card mb-2">
            <div class="card-body h-100">
                <!-- Hoverable Rows Start -->
                <section class="scroll-section" id="hoverableRows">
                    <h2 class="small-title">{{ getCurrentMenu()->description }}</h2>
                    <div class="card mb-5">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        @foreach (getForm(getCurrentMenu()->migration_id) as $item)
                                            <th scope="col">{{ $item->column }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach (getAllMenu() as $item)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            @foreach (getForm(getCurrentMenu()->migration_id) as $menu)
                                                @php
                                                    $kolom = $menu->column;
                                                @endphp
                                                <td>{{ $item->$kolom }}</td>
                                            @endforeach
                                        </tr>
                                        @if (count($item->child) > 0)
                                            @php
                                                $char = 'A';
                                            @endphp
                                            @foreach ($item->child as $child)
                                                <tr>
                                                    <td class="ps-5">{{ $no . "." . $char }}</td>
                                                    @foreach (getForm(getCurrentMenu()->migration_id) as $menu)
                                                        @php
                                                            $kolom = $menu->column;
                                                        @endphp
                                                        <td>{{ $child->$kolom }}</td>
                                                    @endforeach
                                                </tr>
                                                @php
                                                    $char++;
                                                @endphp
                                            @endforeach
                                        @endif
                                        @php
                                            $no++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <!-- Hoverable Rows End -->
            </div>
        </div>
        <!-- Content End -->
    </div>
</div>
