<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('') }}" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Dashboard - Home | EduForest</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ url('home') }}" class="app-brand-link">
                        <img src="{{ asset('img/uin.png') }}" alt="Logo UIN" style="width: 50px; height: auto;">
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">EduForest</span>
                    </a>
                </div>
                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    <li class="menu-item active">
                        <a href="{{ url('home') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div>Beranda</div>
                        </a>
                    </li>

                    <!-- Menu untuk Admin -->
                    @if(Auth::user()->role == 'Admin')
                        <li class="menu-item">
                            <a href="{{ url('subject') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-book"></i>
                                <div>Kelola Matakuliah</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('users') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-user"></i>
                                <div>Kelola Pengguna</div>
                            </a>
                        </li>
                    @endif
                    <!-- Menu untuk Dosen -->
                    @if(Auth::user()->role == 'Dosen')
                    <li class="menu-item">
                        <a href="{{ url('dosen/classes') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                            <div>Kelas</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('dosen/advisory') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user-pin"></i>
                            <div>Perwalian</div>
                        </a>
                    </li>
                    @endif

                    <!-- Menu untuk Mahasiswa -->
                    @if(Auth::user()->role == 'Mahasiswa')
                    <li class="menu-item">
                        <a href="{{ url('courses') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-book"></i>
                            <div>Mata Kuliah Saya</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('grades') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-bar-chart"></i>
                            <div>Nilai Saya</div>
                        </a>
                    </li>
                    @endif
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                            </div>
                        </div>

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User Dropdown -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('assets/img/avatars/undraw_profile_2.svg') }}" alt="User Profile" class="w-px-40 h-auto rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.show') }}">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('assets/img/avatars/undraw_profile_2.svg') }}" alt="User Profile" class="w-px-40 h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                                    <small class="text-muted">{{ Auth::user()->role }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <!-- Welcome Message and Introduction -->
                            <div class="col-lg-12 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-center">
                                        <div class="col-sm-8">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">Selamat Datang di Sistem Informasi OBE UIN Malang</h5>
                                                <p class="mb-4">Sistem ini dirancang untuk memantau dan mengelola capaian pembelajaran (CPL) berdasarkan kurikulum berbasis Outcome-Based Education (OBE).</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 text-center">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Dashboard Overview -->
                            @if(Auth::user()->role == 'Admin')
                            <div class="col-lg-8 mb-4 order-1">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <h5 class="card-header m-0 me-2 pb-3">Admin Dashboard</h5>
                                                <p>Manage courses, users, and monitor system performance.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @elseif(Auth::user()->role == 'Dosen')
                            <div class="col-lg-8 mb-4 order-1">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <h5 class="card-header m-0 me-2 pb-3">Dosen Dashboard</h5>
                                                <p>View and manage the courses you are teaching.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @elseif(Auth::user()->role == 'Mahasiswa')
                            <div class="col-lg-8 mb-4 order-1">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <h5 class="card-header m-0 me-2 pb-3">Mahasiswa Dashboard</h5>
                                                <p>View your course schedule and grades.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <!-- Recent Activities or Announcements -->
                            <div class="col-lg-4 mb-4 order-2">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Pengumuman Terbaru</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-unstyled">
                                            <li class="mb-2">
                                                <i class="bx bx-bell"></i> Perubahan Jadwal Ujian Tengah Semester.
                                            </li>
                                            <li class="mb-2">
                                                <i class="bx bx-bell"></i> Pendaftaran Mata Kuliah Semester Ganjil Dibuka.
                                            </li>
                                            <li class="mb-2">
                                                <i class="bx bx-bell"></i> Pengumuman Lomba Inovasi Teknologi Pendidikan.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                © {{ date('Y') }}, dibuat oleh
                                <a href="https://github.com/sleepingindomie" target="_blank" class="footer-link fw-bolder">Dp</a>
                            </div>
                            <div>
                                <a href="https://uin-malang.ac.id" class="footer-link me-4" target="_blank">UIN Malang</a>
                                <a href="https://uin-malang.ac.id" target="_blank" class="footer-link me-4">Documentation</a>
                                <a href="https://uin-malang.ac.id" target="_blank" class="footer-link me-4">Support</a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->
                </div>
                <!-- / Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
</body>
</html>
