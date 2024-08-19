<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('') }}" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Courses Management | EduForest</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!-- Config -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
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
                    <li class="menu-item">
                        <a href="{{ url('home') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div>Beranda</div>
                        </a>
                    </li>
                    <li class="menu-item active">
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
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

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
                        <!-- Basic Bootstrap Table -->
                        <div class="card">
                            <h5 class="card-header">Matakuliah yang diambil</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            @if(!$isApproved) <!-- Tambahkan pengecekan isApproved -->
                                            <th><input type="checkbox" id="checkAll" /></th>
                                            @else
                                            <th></th>
                                            @endif
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Matakuliah</th>
                                            <th>SKS</th>
                                            <th>Dosen</th>
                                            <th>Hari</th>
                                            <th>Pukul</th>
                                            <th>Kelas</th>
                                            <th>Ruang</th>
                                            <th>Jurusan</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach($courses as $index => $course)
                                        <tr>
                                            @if(!$isApproved)  <!-- Tambahkan pengecekan isApproved -->
                                            <td><input type="checkbox" name="course_ids[]" value="{{ $course->id }}" /></td>
                                            @else
                                            <td></td> <!-- Biarkan kolom kosong jika isApproved true -->
                                            @endif
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $course->subject->kode }}</td>
                                            <td>{{ $course->subject->matakuliah }}</td>
                                            <td>{{ $course->subject->sks }}</td>
                                            <td>{{ $course->subject->dosen }}</td>
                                            <td>{{ $course->subject->hari }}</td>
                                            <td>{{ $course->subject->pukul }}</td>
                                            <td>{{ $course->subject->kelas }}</td>
                                            <td>{{ $course->subject->ruang }}</td>
                                            <td>{{ $course->subject->jurusan }}</td>
                                            <td>{{ $course->subject->keterangan }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            @if(!$isApproved) <!-- Tambahkan pengecekan isApproved -->
                                            <th class="text-start">
                                                <button class="btn btn-danger btn-sm" id="deleteSelected" type="button">
                                                    <i class="bx bx-trash"></i> Hapus
                                                </button>
                                            </th>
                                            @else
                                            <th class="text-start"></th> <!-- Biarkan kolom kosong jika isApproved true -->
                                            @endif
                                            <th colspan="4">Total SKS</th>
                                            <th>{{ $courses->sum('subject.sks') }}</th>
                                            <th colspan="7"></th>
                                        </tr>
                                    </tfoot>                                                                        
                                </table>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                @if(!$isApproved)
                                <div class="d-flex flex-grow-1 align-items-center">
                                    <div class="alert alert-danger col-lg-6 h-25 p-2 me-3">
                                        <i class="bx bx-x-circle"></i> KRS belum disetujui Dosen Wali
                                    </div>
                                    <div class="alert alert-info col-lg-6 h-25 p-2">
                                        <i class="bx bx-info-circle"></i> Cetak KRS akan aktif setelah disetujui
                                    </div>
                                </div>
                                @else
                                <div class="alert alert-success flex-grow-1 col-lg-12 h-25 p-2">
                                    <i class="bx bx-check-circle"></i> KRS disetujui Dosen Wali
                                </div>
                                @endif
                            
                                <div class="card-footer text-end">
                                    <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                                        <i class="bx bx-plus"></i> Daftar Matakuliah
                                    </button>
                                </div>
                            </div>                            
                        </div>
                        <!--/ Basic Bootstrap Table -->
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

    <!-- Modal -->
    <div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCourseModalLabel">Daftar Matakuliah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Search box -->
                    <div class="mb-3">
                        <input type="text" id="searchBox" class="form-control" placeholder="Cari Mata Kuliah...">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Matakuliah</th>
                                    <th>SKS</th>
                                    <th>Dosen</th>
                                    <th>Hari</th>
                                    <th>Pukul</th>
                                    <th>Kelas</th>
                                    <th>Ruang</th>
                                    <th>Jurusan</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0" id="subjectTableBody">
                                @foreach($subjects as $index => $subject)
                                <tr>
                                    <td><button class="btn btn-success btn-sm add-course" type="button" data-subject-id="{{ $subject->id }}"><i class="bx bx-plus"></i></button></td>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $subject->kode }}</td>
                                    <td>{{ $subject->matakuliah }}</td>
                                    <td>{{ $subject->sks }}</td>
                                    <td>{{ $subject->dosen }}</td>
                                    <td>{{ $subject->hari }}</td>
                                    <td>{{ $subject->pukul }}</td>
                                    <td>{{ $subject->kelas }}</td>
                                    <td>{{ $subject->ruang }}</td>
                                    <td>{{ $subject->jurusan }}</td>
                                    <td>{{ $subject->keterangan }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Modal -->

    <!-- Core JS -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>

    <script>
        // Handle add course button in modal
        $('.add-course').click(function() {
            let subjectId = $(this).data('subject-id');
            
            $.ajax({
                url: "{{ route('courses.store') }}",  // Route untuk menambah course
                method: "POST",
                data: {
                    subject_id: subjectId,
                    _token: "{{ csrf_token() }}"  // Kirim token CSRF untuk keamanan
                },
                success: function(response) {
                    if (response.success) {
                        location.reload();  // Reload halaman setelah berhasil menambah course
                    } else {
                        alert(response.message);  // Tampilkan pesan jika jadwal bentrok
                    }
                }
            });
        });

        // Select/deselect all checkboxes
        $('#checkAll').click(function() {
            $('input[name="course_ids[]"]').prop('checked', this.checked);
        });

        // Handle delete button
        $('#deleteSelected').click(function() {
            let selectedCourses = $('input[name="course_ids[]"]:checked').map(function(){
                return $(this).val();
            }).get();

            if (selectedCourses.length > 0) {
                if(confirm('Apakah Anda yakin ingin menghapus mata kuliah yang dipilih?')) {
                    $.ajax({
                        url: "{{ route('courses.destroy', ':id') }}".replace(':id', selectedCourses.join(',')),
                        method: "POST",
                        data: {
                            _method: 'DELETE',
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.success) {
                                location.reload();  // Reload halaman setelah berhasil menghapus course
                            } else {
                                location.reload();  // Tetap reload halaman setelah berhasil menghapus course
                            }
                        }
                    });
                }
            } else {
                alert('Tidak ada mata kuliah yang dipilih.');
            }
        });

        // Search function
        $('#searchBox').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#subjectTableBody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>
</body>
</html>
