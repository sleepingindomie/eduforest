<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('') }}" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Subjects Management | EduForest</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

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
                            <h5 class="card-header">Daftar Mata Kuliah</h5>
                            <div class="card-body">
                                <button class="btn btn-primary btn-sm mb-3" type="button" data-bs-toggle="modal" data-bs-target="#addSubjectModal">
                                    <i class="bx bx-plus"></i> Tambah Mata Kuliah
                                </button>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                            <tr>
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
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach($subjects as $index => $subject)
                                            <tr>
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
                                                <td>
                                                    <button class="btn btn-warning btn-sm edit-subject" data-bs-toggle="modal" data-bs-target="#editSubjectModal" data-id="{{ $subject->id }}" data-kode="{{ $subject->kode }}" data-matakuliah="{{ $subject->matakuliah }}" data-sks="{{ $subject->sks }}" data-dosen="{{ $subject->dosen }}" data-hari="{{ $subject->hari }}" data-pukul="{{ $subject->pukul }}" data-kelas="{{ $subject->kelas }}" data-ruang="{{ $subject->ruang }}" data-jurusan="{{ $subject->jurusan }}" data-keterangan="{{ $subject->keterangan }}">
                                                        <i class="bx bx-edit"></i> Edit
                                                    </button>
                                                    <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="bx bx-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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

    <!-- Modal Tambah Mata Kuliah -->
    <div class="modal fade" id="addSubjectModal" tabindex="-1" aria-labelledby="addSubjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSubjectModalLabel">Tambah Mata Kuliah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('subjects.store') }}" method="POST" id="addSubjectForm">
                        @csrf
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode Mata Kuliah</label>
                            <input type="text" class="form-control" id="kode" name="kode" required>
                        </div>
                        <div class="mb-3">
                            <label for="matakuliah" class="form-label">Nama Mata Kuliah</label>
                            <input type="text" class="form-control" id="matakuliah" name="matakuliah" required>
                        </div>
                        <div class="mb-3">
                            <label for="sks" class="form-label">SKS</label>
                            <input type="number" class="form-control" id="sks" name="sks" required>
                        </div>
                        <div class="mb-3">
                            <label for="dosen" class="form-label">Nama Dosen</label>
                            <input type="text" class="form-control" id="dosen" name="dosen" required>
                        </div>
                        <div class="mb-3">
                            <label for="hari" class="form-label">Hari</label>
                            <input type="text" class="form-control" id="hari" name="hari" required>
                        </div>
                        <div class="mb-3">
                            <label for="pukul" class="form-label">Pukul</label>
                            <input type="text" class="form-control" id="pukul" name="pukul" required>
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" required>
                        </div>
                        <div class="mb-3">
                            <label for="ruang" class="form-label">Ruang</label>
                            <input type="text" class="form-control" id="ruang" name="ruang" required>
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Modal Tambah Mata Kuliah -->

    <!-- Modal Edit Mata Kuliah -->
    <div class="modal fade" id="editSubjectModal" tabindex="-1" aria-labelledby="editSubjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSubjectModalLabel">Edit Mata Kuliah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('subjects.update', 'edit-id') }}" method="POST" id="editSubjectForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit-id" name="id">
                        <div class="mb-3">
                            <label for="edit-kode" class="form-label">Kode Mata Kuliah</label>
                            <input type="text" class="form-control" id="edit-kode" name="kode" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-matakuliah" class="form-label">Nama Mata Kuliah</label>
                            <input type="text" class="form-control" id="edit-matakuliah" name="matakuliah" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-sks" class="form-label">SKS</label>
                            <input type="number" class="form-control" id="edit-sks" name="sks" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-dosen" class="form-label">Nama Dosen</label>
                            <input type="text" class="form-control" id="edit-dosen" name="dosen" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-hari" class="form-label">Hari</label>
                            <input type="text" class="form-control" id="edit-hari" name="hari" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-pukul" class="form-label">Pukul</label>
                            <input type="text" class="form-control" id="edit-pukul" name="pukul" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-kelas" class="form-label">Kelas</label>
                            <input type="text" class="form-control" id="edit-kelas" name="kelas" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-ruang" class="form-label">Ruang</label>
                            <input type="text" class="form-control" id="edit-ruang" name="ruang" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" id="edit-jurusan" name="jurusan" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="edit-keterangan" name="keterangan"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Modal Edit Mata Kuliah -->

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
        // Handle edit button in modal
        $('.edit-subject').click(function() {
            let subjectId = $(this).data('id');
            $('#edit-id').val(subjectId);
            $('#edit-kode').val($(this).data('kode'));
            $('#edit-matakuliah').val($(this).data('matakuliah'));
            $('#edit-sks').val($(this).data('sks'));
            $('#edit-dosen').val($(this).data('dosen'));
            $('#edit-hari').val($(this).data('hari'));
            $('#edit-pukul').val($(this).data('pukul'));
            $('#edit-kelas').val($(this).data('kelas'));
            $('#edit-ruang').val($(this).data('ruang'));
            $('#edit-jurusan').val($(this).data('jurusan'));
            $('#edit-keterangan').val($(this).data('keterangan'));

            let actionUrl = "{{ route('subjects.update', ':id') }}";
            actionUrl = actionUrl.replace(':id', subjectId);
            $('#editSubjectForm').attr('action', actionUrl);
        });

        // Handle delete subject with confirmation
        $('.delete-form').submit(function(event) {
            event.preventDefault();
            let form = this;
            if (confirm('Are you sure you want to delete this subject?')) {
                form.submit();
            }
        });
    </script>
</body>
</html>
