<x-root>
    @include('components.navbar')

    <div class="container">
        <h1 class="mt-3">Menu Saya</h1>
        <a href="{{route('add.menu-form')}}" class="btn btn-primary mt-3">Tambah Produk</a>

        <div class="row mt-3">
            @foreach ($menus as $item)
                card
            @endforeach
        </div>
    </div>
</x-root>
