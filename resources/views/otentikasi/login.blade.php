<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Halaman Login </title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
  
    {{-- CSS Libraries --}}
    @yield('page-styles')
  
    {{-- Template CSS  --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">
  </head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-1">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{ asset('assets/img/futami-hd.png')}}" alt="logo" width="200" class="p-3 shadow-dark rounded">
            </div>

            <div class="card card-primary shadow-dark rounded">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="POST" action=" /login" class="needs-validation" novalidate="">
                    @csrf
                    @if (session('message'))
                    <label>{{session('message')}}</label>
                    @endif
                  <div class="form-group">
                    <label for="username">username</label>
                    <input id="username" type="username" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                     
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  

                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                  <p class="text-center">Belum Punya Akun?<a href="{{ url('/tambahuser') }}"> Daftar</a></p> 
                </form>
                
              </div>
            </div>
            {{-- <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="auth-register.html">Create One</a>
            </div> --}}
            <div class="simple-footer">
                &copy; PT Futami Food & Beverages 2020
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

 
  <!-- General JS Scripts -->
  <script src="{{ asset('assets/js/jquery-3.3.1.min.js')}}" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/js/popper.min.js')}}" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js')}}" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/js/jquery.nicescroll.min.js')}}"></script>
  <script src="{{ asset('assets/js/moment.min.js')}}"></script>
  <script src="{{ asset('assets/js/stisla.js')}}"></script>

  {{-- JS Libraies --}}

  {{-- Template JS File  --}}
  <script src="{{ asset('assets/js/scripts.js')}}"></script>
  <script src="{{ asset('assets/js/custom.js')}}"></script>

</body>
</html>
