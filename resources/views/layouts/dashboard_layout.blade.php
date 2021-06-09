
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>@yield('title')</title>



    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet">
  </head>
  <body>

<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3 text-center" href="#">D4 TRPL</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
     document.getElementById('logout-form').submit();">
        <span data-feather="log-out"></span> LogOut
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            @if (auth()->user()->role == "mahasiswa")
            <li class="nav-item text-center">
                <img src="{{asset('assets/gambar/profile/Man-2.jfif')}}" class="rounded-circle" alt="" srcset="" height="150">
                <h6 class="mt-2">Kevin Tambunan</h6>
            </li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted">
            <span>Menu</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                <span data-feather="align-left"></span>
            </a>
            </h6>
          <li class="nav-item">
            <a class="nav-link @yield('dashboard-act')" href="{{route('home')}}">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('profile-act')" href="{{url('mahasiswa/profile')}}">
              <span data-feather="user"></span>
              Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('notes-act')" href="{{url('/mahasiswa/notes/daftarNote')}}">
                <span data-feather="file-text"></span>
                Notes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('learningPath-act')" href="{{url('mahasiswa/learningPath')}}">
              <span data-feather="compass"></span>
              Learning Path
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('pengumuman-act')" href="{{url('/pengumuman')}}">
              <span data-feather="info"></span>
              Pengumuman
            </a>
          </li>
          @endif
          {{-- jika admin --}}
          @if (auth()->user()->role == "admin")
            <li class="nav-item text-center">
                <img src="{{asset('assets/gambar/profile/admin.jfif')}}" class="rounded-circle" alt="" srcset="" height="150">
                <h6 class="mt-2">Admin</h6>
            </li>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted">
            <span>Menu</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                <span data-feather="align-left"></span>
            </a>
            </h6>
          <li class="nav-item">
            <a class="nav-link @yield('dashboard-act')" href="{{route('home')}}">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('daftarUser-act')" href="{{url('admin/daftarUser')}}">
              <span data-feather="users"></span>
              Daftar User
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('learningPath-act')" href="{{url('admin/learningPath')}}">
              <span data-feather="compass"></span>
              Learning Path
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('pengumuman-act')" href="{{url('/pengumuman')}}">
              <span data-feather="info"></span>
              Pengumuman
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('atur-pengumuman-act')" href="{{url('/admin/aturPengumuman')}}">
              <span data-feather="settings"></span>
              Atur Pengumuman
            </a>
          </li>
          @endif
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Atur Halaman Utama</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="settings"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">
              <span data-feather="home"></span>
              D4 TRPL
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">
              <span data-feather="award"></span>
              Lulusan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">
              <span data-feather="briefcase"></span>
              Prospek Kerja
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/')}}">
              <span data-feather="users"></span>
              Daftar Dosen
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    @yield('breadcrumb')
                </ol>
            </nav>
        </div>

        @yield('content')
    </main>
  </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
  </body>
</html>
