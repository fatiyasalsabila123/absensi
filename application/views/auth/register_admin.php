<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- CSS File -->
    <link href="<?php echo base_url('/asset/FlexStart/') ?>assets/css/login.css" rel="stylesheet">
    <title>Register Admin</title>
</head>

<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!--------------------------- Left Box ----------------------------->

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #8ECDDD;">
                <div class="featured-image mb-3">
                    <img src="https://cdn3d.iconscout.com/3d/premium/thumb/breadcrumb-navigation-6853697-5625764.png" class="img-fluid"
                        style="width: 290px;">
                </div>
            </div>

            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <form action="<?php echo base_url('Auth/aksi_register_admin') ?>" method="post"
                    class="row align-items-center">
                    <div class="header-text">
                        <h2>Register Admin</h2>
                        <p>Buat Akun Sekarang Agar Bisa Login</p>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control form-control-lg bg-light fs-6" name="email"
                            required placeholder="Email">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" name="username"
                            required placeholder="Username">
                    </div>
                    <div class="row">
                    <div class="input-group col mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" name="nama_depan"
                            required placeholder="Nama Depan">
                    </div>
                    <div class="input-group col mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" name="nama_belakang"
                            required placeholder="Nama Belakang">
                    </div>
                </div>
                    <div class="input-group mb-1">
                        <input type="password" id="password" class="form-control form-control-lg bg-light fs-6"
                            name="password" required placeholder="Password">
                    </div>
                    <div class="input-group mb-3">
                        <input type="hidden" class="form-control form-control-lg bg-light fs-6" name="role"
                            placeholder="Role" value="admin">
                    </div>
                        <p style="font-size:13px">* Password Harus Minimal 8 Karakter Dan Ada Huruf Besar Dan Kecil</p>
                    <div class="input-group mb-3 d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="show-password">
                            <label for="formCheck" class="form-check-label text-secondary"><small>Tampilkan
                                    Password</small></label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" name="submit" class="btn btn-lg w-100 fs-6"
                            style="background: #8ECDDD; color: black;">Register</button>
                    </div>
                    <div class="row">
                        <small>Sudah Memiliki Akun? Silahkan <a href="/absensi/auth/">Login</a></small>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- script hide dan show password -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var passwordField = document.getElementById('password');
            var showPasswordCheckbox = document.getElementById('show-password');

            showPasswordCheckbox.addEventListener('change', function () {
                if (showPasswordCheckbox.checked) {
                    passwordField.type = 'text';
                } else {
                    passwordField.type = 'password';
                }
            });
        });
    </script>

    <!-- sweet alert register jika error -->
    <?php if ($this->session->flashdata('error_message')): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= $this->session->flashdata('error_message') ?>',
                background: '#fff',
                customClass: {
                    title: 'text-dark',
                    content: 'text-dark'
                }
            });
        </script>
    <?php endif; ?>

    <!-- sweet alert jika email sudah ada-->
    <?php if ($this->session->flashdata('error_email')): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= $this->session->flashdata('error_email') ?>',
                background: '#fff',
                customClass: {
                    title: 'text-dark',
                    content: 'text-dark'
                }
            });
        </script>
    <?php endif; ?>

    <!-- sweet alert jika username sudah ada-- -->
    <?php if ($this->session->flashdata('error_username')): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= $this->session->flashdata('error_username') ?>',
                background: '#fff',
                customClass: {
                    title: 'text-dark',
                    content: 'text-dark'
                }
            });
        </script>
    <?php endif; ?>

    <!-- sweet selrt jika register berhasil -->
    <?php if ($this->session->flashdata('berhasil_register_admin')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Hore...',
                text: '<?= $this->session->flashdata('berhasil_register_admin') ?>',
                background: '#fff',
                customClass: {
                    title: 'text-dark',
                    content: 'text-dark'
                }
            });
        </script>
    <?php endif; ?>

    <!-- script sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>