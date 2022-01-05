<!DOCTYPE html>
<html lang="en">

<head>
  {{-- <meta name=”csrf-token” content=”{{ csrf_token() }}”> --}}
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Pembelajaran Paud</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">


  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/css/components.css")}}">



  @yield('style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                  class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">

          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="{{ asset("assets/img/avatar/avatar-1.png")}}" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, Bro...</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Pembelajaran Paud</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header"></li>
            <li>
              <a class="nav-link" href="{{ url("/jam") }}">
                <i class="fas fa-clock"></i>
                <span>Jam</span>
              </a>
            </li>
            <li>
              <a class="nav-link" href="{{ url("/materi") }}">
                <i class="fas fa-book"></i>
                <span>Materi</span>
              </a>
            </li>
            <li>
              <a class="nav-link" href="{{ url("/tugas") }}">
                <i class="fas fa-tasks"></i>
                <span>Tugas</span>
              </a>
            </li>
            <li>
              <a class="nav-link" href="{{ url("/game") }}">
                <i class="fas fa-gamepad"></i>
                <span>Game</span>
              </a>
            </li>
            <li>
              <a class="nav-link" href="{{ url("/siswa") }}">
                <i class="fas fa-graduation-cap"></i>
                <span>Siswa</span>
              </a>
            </li>
            <li>
              <a class="nav-link" href="{{ url("/hasil-tugas") }}">
                <i class="fas fa-tasks"></i>
                <span>Hasil Upload Tugas</span>
              </a>
            </li>
          </ul>

        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2021
          <div class="bullet">
          </div>
          <a href="#">Iqbal Asegaf</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset("assets/js/stisla.js")}}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset("assets/js/scripts.js")}}"></script>
  <script src="{{ asset("assets/js/custom.js")}}"></script>

  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>


  <script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
  </script>

  {{-- <script>
    $.ajaxSetup({ headers: {
    ‘X-CSRF-TOKEN’: $(‘meta[name=”csrf-token”]’).attr(‘content’)
      }
    } );
  </script> --}}



  @yield('script')
  <!-- Page Specific JS File -->
</body>

</html>