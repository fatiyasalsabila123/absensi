<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('/asset/FlexStart/') ?>assets/css/dashboard.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <title>Document</title>
</head>

<body>
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <?php $this->load->view('component/sidebar'); ?>
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <?php $this->load->view('component/header'); ?>
            <div class="flex-lg-1 h-screen">
                <header class="bg-surface-secondary">
                    <div class="bg-cover"
                        style="height:300px;background-image:url(https://img.freepik.com/free-photo/abstract-refreshing-blue-tropical-watercolor-background-illustration-high-resolution-free-image_1340-20381.jpg?size=626&ext=jpg&ga=GA1.1.1464020286.1696819460&semt=ais);background-position:center center">
                    </div>
                    <div class="container-fluid max-w-screen-xl">
                        <div class="row g-0">
                            <div class="col-auto">
                                <a href="#"
                                    class="avatar w-40 h-40 border border-body border-4 rounded-circle shadow mt-n16">
                                    <img alt="..."
                                        src="https://img.freepik.com/free-psd/3d-illustration-person-with-glasses_23-2149436185.jpg?size=626&ext=jpg&ga=GA1.1.1464020286.1696819460&semt=ais"
                                        class="rounded-circle">
                                </a>
                            </div>
                            <div class="col ps-4 pt-4">
                                <h6 class="text-xs text-uppercase text-muted mb-1">UI Designer</h6>
                                <h1 class="h2">Tahlia Mooney</h1>
                            </div>
                        </div>
                        <ul class="nav nav-tabs overflow-x ms-1 mt-4">
                            <li class="nav-item">
                                <a href="#!" class="nav-link active font-bold" id="myProfile">My profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="#!" class="nav-link" id="editProfile">Edit Profile</a>
                            </li>
                        </ul>
                    </div>
                </header>
                <main class="py-6 bg-surface-secondary">
                    <div class="container-fluid max-w-screen-xl" id="myProfileContainer">
                        <div class="vstack gap-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-3">Profile</h5>
                                    <br>
                                    <div class="row">
                                        <p class="text-sm lh-relaxed mb-4 col-6">Username</p>
                                        <p class="text-sm lh-relaxed mb-4 col-6">Test</p>
                                        <hr>
                                        <p class="text-sm lh-relaxed mb-4 col-6">Email</p>
                                        <p class="text-sm lh-relaxed mb-4 col-6">Test</p>
                                        <hr>
                                        <p class="text-sm lh-relaxed mb-4 col-6">Nama lengkap</p>
                                        <p class="text-sm lh-relaxed mb-4 col-6">Test</p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid max-w-screen-xl" id="editProfileContainer" style="display: none;>
                        <div class=" vstack gap-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-3">Edit Profile</h5>
                            </div>
                        </div>
                    </div>
            </div>
            </main>
        </div>
    </div>
    </div>
    <script>
        document.getElementById('myProfile').addEventListener('click', function () {
            document.getElementById('myProfileContainer').style.display = 'block';
            document.getElementById('editProfileContainer').style.display = 'none';
        });

        document.getElementById('editProfile').addEventListener('click', function () {
            document.getElementById('myProfileContainer').style.display = 'none';
            document.getElementById('editProfileContainer').style.display = 'block';
        });

    </script>

</body>

</html>