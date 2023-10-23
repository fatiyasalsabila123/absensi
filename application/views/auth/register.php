<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS File -->
    <link href="<?php echo base_url('/asset/FlexStart/') ?>assets/css/login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Register</title>
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
                    <img src="https://cdn3d.iconscout.com/3d/premium/thumb/form-4721284-3927997.png" class="img-fluid"
                        style="width: 250px;">
                </div>
            </div>

            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box max-h-screen">
                <form action="<?php echo base_url('Auth/aksi_register') ?>" method="post"
                    class="row align-items-center">
                    <div class="header-text">
                        <h2>Register</h2>
                        <p>Buat Akun Sekarang Agar Bisa Login</p>
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" class="form-control form-control-lg bg-light fs-6" name="email"
                            placeholder="Email" value="<?php echo set_value('email');?>">
                    <!-- <?= form_error('email', '<smal class="text-danger pl-3">', '</smal>'); ?> -->
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" name="username"
                            placeholder="Username" value="<?php echo set_value('username');?>">
                    <!-- <?= form_error('username', '<div class="text-danger">', '</div>'); ?> -->
                    </div>
                    <div class="row">
                    <div class="form-group mb-3 col">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" name="nama_depan"
                            placeholder="Nama Depan" value="<?php echo set_value('nama_depan');?>">
                    <!-- <?= form_error('nama_depan', '<div class="text-danger">', '</div>'); ?> -->
                    </div>
                    <div class="form-group mb-3 col">
                        <input type="text" class="form-control form-control-lg bg-light fs-6"
                            name="nama_belakang" placeholder="Nama Belakang" value="<?php echo set_value('nama_belakang');?>">
                    <!-- <?= form_error('nama_belakang', '<div class="text-danger">', '</div>'); ?> -->
                    </div>
                </div>
                    <div class="form-group mb-1">
                        <input type="password" id="password" class="form-control form-control-lg bg-light fs-6"
                            name="password" placeholder="Password" value="<?php echo set_value('password');?>">
                    <!-- <?= form_error('password', '<div class="text-danger">', '</div>'); ?> -->
                    </div>
                    <div class="form-group mb-3">
                        <input type="hidden" class="form-control form-control-lg bg-light fs-6" name="role"
                            placeholder="Role" value="karyawan">
                    </div>
                        <p style="font-size:13px">* Password Harus Minimal 8 Karakter Dan Ada Huruf Besar Dan Kecil</p>
                    <div class="form-group mb-3 d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="show-password">
                            <label for="formCheck" class="form-check-label text-secondary"><small>Tampilkan
                                    Password</small></label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" name="submit" class="btn btn-lg btn-primary w-100 fs-6">Register</button>
                    </div>
                    <div class="row">
                        <small>Sudah Memiliki Akun Silahkan <a href="/absensi/auth/">Login</a></small>
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

    <!-- sweet alert jika email sudah ada -->
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

    <!-- sweet alert jika username sudah ada -->
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
    <!-- end sweet alert jika error -->

    <!-- sweet alert jika berhasil register -->
    <?php if ($this->session->flashdata('Berhasil_register_user')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Horee...',
                text: '<?= $this->session->flashdata('Berhasil_register_user') ?>',
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