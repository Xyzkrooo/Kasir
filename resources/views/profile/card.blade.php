<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-center align-items-center flex-column">
            <div class="avatar avatar-x2l">
                @if (Auth::user()->avatar)
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar">
                @else
                    <img src="{{ asset('assets/images/faces/2.jpg') }}" alt="Avatar">
                @endif
            </div>
            <h3 class="mt-3">{{ Auth::user()->name }}</h3>
            <p class="text-small">{{ Auth::user()->email }}</p>
        </div>
    </div>
</div>
