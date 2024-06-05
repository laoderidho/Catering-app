<x-root>
    <div class="h-100 w-100 d-flex justify-content-center align-items-center">
        <div class="card w-75 p-5 m-3">
            <form id="registerForm" action="{{ route('auth.register') }}" method="POST">
                <h1 class="">Register</h1>
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3 for-penjual">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea type="password" class="form-control" name="address"></textarea>
                </div>
                <div class="mb-3 for-penjual">
                    <label for="contact" class="form-label">Kontak/ No telepon</label>
                    <input type="number" class="form-control" name="contact">
                </div>
                <div class="mb-3 for-penjual">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id=""></textarea>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="roleId" value="2">
                    <label class="form-check-label" for="exampleCheck1">Akun Penjual</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-root>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('registerForm');
        var checkbox = form.querySelector('input[name="roleId"]');

        checkbox.addEventListener('change', function() {
            if (this.checked) {
                this.value = '1'; // Jika checkbox dicentang, set nilai roleId menjadi 2

            } else {
                this.value = '2'; // Jika checkbox tidak dicentang, set nilai roleId menjadi 1

            }
        });

        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Menghentikan perilaku default form submission

            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open(form.method, form.action);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 201) {
                        console.log(xhr.responseText); // Handle jika sukses
                        // direct to login page
                        window.location.href = "{{ route('login') }}";
                    } else {
                        console.error(xhr.responseText); // Handle jika terjadi error
                    }
                }
            };
            xhr.send(formData);
        });
    });
</script>
