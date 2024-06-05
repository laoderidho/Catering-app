<x-root>
    @include('components.navbar')
     <div class="h-100 w-100 d-flex justify-content-center align-items-center">
        <div class="card w-75 p-5 m-3">
            <form id="registerForm" action="{{ route('menu.add') }}" method="POST" enctype="multipart/form-data">
                <h1 class="">Tambah Menu</h1>
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Makanan</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Harga</label>
                    <input type="number" class="form-control" name="price">
                </div>
                <div class="mb-3">
                    <label for="deskripsi makanan" class="form-label">Deskripsi</label>
                    <textarea name="description"  class="form-control" id=""></textarea>
                </div>
                <div class="mb-3 for-penjual">
                    <label for="image" class="form-label">Gambar Produk</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="mb-3 for-penjual">
                    <label for="cty" class="form-label">qty</label>
                    <input type="number" class="form-control" name="qty">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-root>
