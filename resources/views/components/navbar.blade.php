<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">SPP SMK</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                {{-- if siswaredirect to history --}}
                <li class="nav-item">
                    <a href="{{ route('view.pembayaran') }}" class="nav-link">Pembayaran</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="nav-link dropdown-toggle">Lainnya</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        @if (auth()->user()->level == 'admin'|| auth()->user()->level == 'petugas')
                        <li><a href="{{ route('view.siswa') }}" class="dropdown-item">Siswa</a></li>
                        @endif
                        @if (auth()->user()->level == 'admin')
                        <li><a href="{{ route('view.kelas') }}" class="dropdown-item">Kelas </a></li>
                        <li><a href="{{ route('view.spp') }}" class="dropdown-item">SPP</a></li>
                        <li><a href="{{ route('view.petugas') }}" class="dropdown-item">Petugas</a></li>
                        @endif
                    </ul>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-0 ml-md-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item">
                <form id="form-logout" action="{{ route('post.logout') }}" method="POST">
                    @csrf
                </form>
                <a onclick="event.preventDefault();
                document.getElementById('form-logout').submit();
                " class="nav-link" href="#"
                    role="button">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>
