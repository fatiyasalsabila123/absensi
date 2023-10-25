<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap bulanan</title>
    <link href="<?php echo base_url('/asset/FlexStart/') ?>assets/css/dashboard.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="text-capitalize">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg"
        id="navbarVertical" style="padding:20px">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="dashboard">
                <h3 class="text-success"><img src="https://bytewebster.com/img/logo.png" width="40"><span
                        class="text-info">Absensi</h3>
            </a>
            <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle -->
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="avatar-parent-child">
                            <?php if (empty($this->fungsi->user_login()->image)): ?>
                                <img alt="Image Placeholder"
                                    src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                                    class="avatar avatar- rounded-circle">
                                <span class="avatar-child avatar-badge bg-success"></span>
                            <?php else: ?>
                                <img alt="Image Placeholder"
                                    src="<?php echo base_url('images/user/' . $this->fungsi->user_login()->image) ?>"
                                    class="avatar avatar- rounded-circle">
                                <span class="avatar-child avatar-badge bg-success"></span>
                            <?php endif; ?>
                        </div>
                    </a>
                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <?php if ($this->session->userdata('role') === "admin"): ?>
                            <a href="profileAdmin" class="dropdown-item">Profile</a>
                        <?php else: ?>
                            <a href="profile" class="dropdown-item">Profile</a>
                        <?php endif; ?>
                        <a href="<?php echo base_url('auth/logout') ?>" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-collapse px-3" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="absensi_karyawan">
                            <i class="bi bi-bar-chart"></i> Absensi Karyawan
                        </a>
                    </li>
                    <?php if ($this->session->userdata('role') === "admin"): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="dataUser">
                                <i class="fas fa-user-friends"></i> Data Karyawan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#submenu" data-bs-toggle="collapse" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation" class="nav-link">
                                <i class="fas fa-bars"></i> Data Rekap
                            </a>
                            <ul class="navbar-nav collapse" id="submenu" data-bs-parent="#menu">
                                <li class="nav-item mx-2">
                                    <a class="nav-link" href="rekapHarian">
                                        <i class="fas fa-calendar-day"></i> Data absensi harian
                                    </a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link" href="rekapMingguan">
                                        <i class="fas fa-table"></i> Data absensi mingguan
                                    </a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link" href="rekapBulanan">
                                        <i class="fas fa-calendar-minus"></i> Data absensi bulanan
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
                <!-- Divider -->
                <!-- <hr class="navbar-divider my-5 opacity-20"> -->
                <!-- Push content down -->
                <div class="mt-auto"></div>
                <!-- User (md) -->
                <ul class="navbar-nav">
                    <?php if ($this->session->userdata('role') === "karyawan"): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="profile">
                                <i class="bi bi-person-square"></i> Account
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="profileAdmin">
                                <i class="bi bi-person-square"></i> Account
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item" style="cursor:pointer">
                        <a class="nav-link" onclick="logout()">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script>
        function logout(id) {
            swal.fire({
                title: 'Apakah Anda Yakin Ingin Logout?',
                icon: 'warning',
                background: '#fff',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya Logout', customClass: {
                    title: 'text-dark',
                    content: 'text-dark'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Logout',
                        showConfirmButton: false,
                        timer: 1500,
                        background: '#fff',
                        customClass: {
                            title: 'text-dark',
                            content: 'text-dark'
                        }

                    }).then(function () {
                        window.location.href = "<?php echo base_url('auth/logout/') ?>";
                    });
                }
            });
        }
    </script>
</body>

</html>