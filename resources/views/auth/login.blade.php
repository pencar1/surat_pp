<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>
  <link rel="icon" href="{{ asset('images/logo/Logo_PLN_B.png') }}" type="image/x-icon">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset ('stisla/dist/assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('stisla/dist/assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset ('stisla/dist/assets/modules/bootstrap-social/bootstrap-social.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset ('stisla/dist/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset ('stisla/dist/assets/css/components.css')}}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{ asset ('images/logo/logo_PLN.png')}}" alt="logo" width="150" class="shadow-light">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form action="{{ route ('login-proses') }}"  method="POST" class="needs-validation" novalidate="">
                    @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" placeholder="Masukkan email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">Harap masukkan email yang valid.</div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Masukkan password"  tabindex="2" required>
                    <div class="invalid-feedback">Password tidak boleh kosong.</div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>

              </div>
            </div>
            <div class="simple-footer">
                Copyright &copy; <span id="currentYear"></span> <div class="bullet"></div> PLN ULP Banjarbaru
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<script>
    // Mendapatkan tahun saat ini
    const currentYear = new Date().getFullYear();
    // Menampilkan tahun di elemen dengan id "currentYear"
    document.getElementById('currentYear').textContent = currentYear;
</script>

  <!-- General JS Scripts -->
  <script src="{{ asset ('stisla/dist/assets/modules/jquery.min.js')}}"></script>
  <script src="{{ asset ('stisla/dist/assets/modules/popper.js')}}"></script>
  <script src="{{ asset ('stisla/dist/assets/modules/tooltip.js')}}"></script>
  <script src="{{ asset ('stisla/dist/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset ('stisla/dist/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{ asset ('stisla/dist/assets/modules/moment.min.js')}}"></script>
  <script src="{{ asset ('stisla/dist/assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{ asset ('stisla/dist/assets/js/scripts.js')}}"></script>
  <script src="{{ asset ('stisla/dist/assets/js/custom.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if($message = Session::get('success'))
    <script>Swal.fire('{{ $message }}');</script>
    @endif

    @if($message = Session::get('failed'))
    <script>Swal.fire('{{ $message }}');</script>
    @endif

</body>
</html>
