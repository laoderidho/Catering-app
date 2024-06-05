<x-root>
  <div class="h-100 w-100 d-flex justify-content-center align-items-center">
     <div class="card w-75 p-5 m-3">
         <form id="login_form" action="{{ route('auth.login') }}" method="POST">
            <h1 class="">Login</h1>
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

            <div class="mt-3">
                <a href="{{ route('register') }}">Register</a>
            </div>
        </form>
   </div>
  </div>
</x-root>
