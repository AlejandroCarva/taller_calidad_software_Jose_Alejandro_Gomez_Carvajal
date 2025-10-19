<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<div class="container-fluid">
  <div class="row min-vh-100">
    <div class="col-md-6 d-flex flex-column justify-content-center align-items-center bg-dark text-white p-0" style="min-height:100vh;">
      <img src="{{ asset('imagenes/fondotienda.png') }}" alt="Logo" style="width:100%; height:80vh; object-fit:contain; object-position:center; display:block; background:#222;">
    </div>
    <div class="col-md-6 d-flex flex-column justify-content-center align-items-center bg-light">
      <div class="w-100" style="max-width: 400px;">
        <div class="login-form">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <div class="form-group mb-3">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="tu@correo.com" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="form-group mb-3">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group form-check mb-3">
              <input type="checkbox" name="remember" id="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember">Recordarme</label>
            </div>
            <button type="submit" class="btn btn-black w-100">Login</button>
            @if (Route::has('register'))
              <a href="{{ route('register') }}" class="btn btn-secondary w-100 mt-2">Register</a>
            @endif
          </form>
        </div>
      </div>
    </div>
  </div>
</div>