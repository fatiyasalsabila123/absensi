<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- sweetalert2 -->
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CSS File -->
    <link href="<?php echo base_url('/asset/FlexStart/') ?>assets/css/login.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!--------------------------- Left Box ----------------------------->

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="https://static.vecteezy.com/system/resources/previews/010/998/284/non_2x/3d-password-input-illustration-design-free-png.png"
                        class="img-fluid" style="width: 250px;">
                </div>
            </div>

            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <form action="<?php echo base_url('Auth/aksi_login') ?>" method="post" class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Login</h2>
                        <p>Selamat datang kembali</p>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" required name="email"
                            placeholder="Email address">
                    </div>
                    <div class="input-group mb-1">
                        <input type="password" id="password" class="form-control form-control-lg bg-light fs-6" required
                            name="password" placeholder="Password">
                    </div>
                    <div class="input-group mb-5 d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="formCheck">
                            <label for="formCheck" class="form-check-label text-secondary"><small>Tampilkan
                                    password</small></label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" name="submit" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                    </div>
                    <div class="row">
                        <small>Belum memiliki akun ? silahkan <a href="/absensi/auth/register">Register</a></small>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- script untuk hide dan show password  -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var passwordField = document.getElementById('password');
            var showPasswordCheckbox = document.getElementById('formCheck');

            showPasswordCheckbox.addEventListener('change', function () {
                if (showPasswordCheckbox.checked) {
                    passwordField.type = 'text';
                } else {
                    passwordField.type = 'password';
                }
            });
        });
    </script>

    <!-- sweet alert jika berhasil login sebaagi user-->
    <?php if ($this->session->flashdata('berhasil_login')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil login',
                text: '<?= $this->session->flashdata('berhasil_login') ?>',
                background: '#fff',
                customClass: {
                    title: 'text-dark',
                    content: 'text-dark'
                }
            });
        </script>
    <?php endif; ?>

    <!-- sweet alert jika berhasil login berhasil login sebagai admin -->
    <?php if ($this->session->flashdata('success_login_admin')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil login',
                text: '<?= $this->session->flashdata('success_login_admin') ?>',
                background: '#fff',
                customClass: {
                    title: 'text-dark',
                    content: 'text-dark'
                }
            });
        </script>
    <?php endif; ?>

    <!-- sweet alert jika ggal login -->
    <?php if ($this->session->flashdata('gagal_login')): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '<?= $this->session->flashdata('gagal_login') ?>',
                background: '#fff',
                customClass: {
                    title: 'text-dark',
                    content: 'text-dark'
                }
            });
        </script>
    <?php endif; ?>

    <!-- sweet alert jika email tidak sesui -->
    <?php if ($this->session->flashdata('pass_email')): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '<?= $this->session->flashdata('pass_email') ?>',
                background: '#fff',
                customClass: {
                    title: 'text-dark',
                    content: 'text-dark'
                }
            });
        </script>
    <?php endif; ?>

</body>

</html>