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

            <div class="col-md-6 right-box">
                <form action="<?php echo base_url('Auth/aksi_register') ?>" method="post"
                    class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Register</h2>
                        <p>Buat akun sekarang agar bisa login</p>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control form-control-lg bg-light fs-6" required name="email"
                            placeholder="Email address">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" required name="username"
                            placeholder="Username">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" required name="nama_depan"
                            placeholder="Nama depan">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" required name="nama_belakang"
                            placeholder="Nama Belakang">
                    </div>
                    <div class="input-group mb-1">
                        <input type="password" id="password" class="form-control form-control-lg bg-light fs-6" required name="password"
                            placeholder="Password">
                    </div>
                    <div class="input-group mb-3">
                        <input type="hidden" class="form-control form-control-lg bg-light fs-6" required name="role"
                            placeholder="Role" value="karyawan">
                    </div>
                    <p>Password harus minimal 8 karakter*</p>
                    <div class="input-group mb-5 d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="show-password">
                            <label for="formCheck" class="form-check-label text-secondary"><small>Tampilkan
                                    password</small></label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" name="submit" class="btn btn-lg btn-primary w-100 fs-6">Register</button>
                    </div>
                    <div class="row">
                        <small>Sudah memiliki akun silahkan <a href="/absensi/auth/">Login</a></small>
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
      });
   </script>
<?php endif; ?>

<!-- script sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>