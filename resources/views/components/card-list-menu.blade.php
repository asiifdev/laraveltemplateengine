<div>
    <div class="row">
        @foreach (getAllMenu(getCurrentMenu()->id) as $item)
            <div class="col-md-4">
                <a href="{{ url($item->url) }}">
                    <div class="card bg-secondary text-center">
                        <div class="card-body text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20%" height="auto" viewBox="0 0 20 20"
                                fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="acorn-icons acorn-icons-balance d-inline-block text-primary">
                                {!! $item->icons->svg !!}
                            </svg>
                            <h3 style="font-weight: 600" class="text-dark">
                                {{ $item->name }}
                            </h3>
                            <h5 class="text-dark">
                                {{ $item->description }}
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
