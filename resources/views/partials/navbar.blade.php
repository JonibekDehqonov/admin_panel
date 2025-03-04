<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Mahsulotlar</a>
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('orders.create') }}">Buyurtma qilish</a> --}}
                    </li>
                    <li class="nav-item">
                        {{-- <form action="{{ route('logout') }}" method="POST"> --}}
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Chiqish</button>
                        {{-- </form> --}}
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Kirish</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>