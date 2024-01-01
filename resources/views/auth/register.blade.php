<!DOCTYPE html>
<html lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{asset('assets/')}}"
  data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Daftar &mdash; IdeKreatif</title>
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon/favicon.ico')}}" />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="{{asset('assets/vendor/fonts/boxicons.css')}}" />
  <!-- Core CSS -->
  <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{asset('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}" />
  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
  <!-- Page -->
  <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}" />
  <!-- Helpers -->
  <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{asset('assets/js/config.js')}}"></script>
</head>
<body>
  @if(session('success'))
  <!-- Display Bootstrap Toast on Successful Registration -->
  <div id="toast" class="bs-toast toast fade bg-primary position-absolute m-3 end-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <i class="bx bx-bell me-2"></i>
      <div class="me-auto fw-semibold">Berhasil!</div>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">{{ session('success') }}</div>
  </div>
  <!-- Trigger JavaScript to Show the Toast -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      let toast = new bootstrap.Toast(document.getElementById('toast'));
      toast.show();
    });
  </script>
  @endif
  <!-- Content -->
  <div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
    <!-- Register Card -->
    <div class="card">
      <div class="card-body">
      <!-- Logo -->
      <div class="app-brand justify-content-center">
        <a href="index.html" class="app-brand-link gap-2">
        <span class="app-brand-logo demo"></span>
        <span class="app-brand-text demo text-uppercase fw-bolder">IdeKreatif</span>
        </a>
      </div>
      <!-- /Logo -->
      <form action="/register" class="mb-3" method="POST">
      @csrf
        <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Masukkan Username" autofocus/>
        </div>
        <div class="mb-3">
        <label for="email" class="form-label">Nama</label>
        <input type="text" class="form-control" name="name" placeholder="Masukkan Nama" />
        </div>
        <div class="mb-3 form-password-toggle">
        <label class="form-label" for="password">Password</label>
        <div class="input-group input-group-merge">
          <input type="password" class="form-control" name="password"
          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
          <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        </div>
        </div>
        <button class="btn btn-primary d-grid w-100">Daftar</button>
      </form>
      <p class="text-center">
        <span>Sudah memiliki akun?</span><a href="/login"><span> Masuk</span></a>
      </p>
      </div>
    </div>
    <!-- Register Card -->
    </div>
  </div>
  </div>
  <!-- / Content -->
  <!-- Core JS -->
  
  <script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
  <script src="{{asset('assets/vendor/js/menu.js')}}"></script>
  <!-- endbuild -->  
  <!-- Main JS -->
  <script src="{{asset('assets/js/main.js')}}"></script>
  <!-- Page JS -->
  </body>
</html>