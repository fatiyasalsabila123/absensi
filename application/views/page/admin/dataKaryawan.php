<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data karyawan</title>
    <link href="<?php echo base_url('/asset/FlexStart/') ?>assets/css/dashboard.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</head>

<body>
    <?php if ($this->session->userdata('role') === "admin"): ?><!-- kondisi jika tidak role admin maka tidak bisa melihat melihat page ini -->
        <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
            <?php $this->load->view('component/sidebar'); ?>
            <div class="h-screen flex-grow-1 overflow-y-lg-auto">
                <?php $this->load->view('component/header'); ?>
                <main class="py-6 bg-surface-secondary">
                    <div class="container-fluid">
                        <!-- start search mencari data -->
                        <form class="d-flex" style="gap:10px" action="<?php echo base_url('page/dataKaryawan') ?>"
                            method="post">
                            <input type="search" name="search_keyword" class="form-control" placeholder="Cari username">
                            <button class="btn btn btn-primary" type="submit" name="submit">Cari</button>
                        </form>
                        <!-- end search -->
                        <br>
                        <div class="card shadow border-0 mb-7">
                            <div class="card-header px-3">
                                <!-- start button export data -->
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0">Karyawan</h5>
                                    <div class="d-flex">
                                        <button class="btn btn-sm btn-primary"><a
                                                href="<?php echo base_url('page/export') ?>"
                                                class="text-decoration-none text-light">Export</a></button>
                                    </div>
                                </div>
                                <!-- end button export data -->
                            </div>
                            <div class="table-responsive">
                                <!-- start tabel  -->
                                <table class="table table-hover table-nowrap">
                                    <!-- start th -->
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Nama depan</th>
                                            <th scope="col">Nama belakang</th>
                                            <th scope="col">image</th>
                                            <th scope="col">Email</th>
                                        </tr>
                                    </thead>
                                    <!-- end th -->
                                    <!-- start td -->
                                    <tbody>
                                        <?php $no = 0;
                                        foreach ($get_karyawan as $row):
                                            $no++ ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->username ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->nama_depan ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->nama_belakang ?>
                                                </td>
                                                <td>
                                                    <img style="width:80px; border-radius:50%"
                                                        src="<?= base_url('images/user/' . $row->image) ?>" alt="">

                                                </td>
                                                <td>
                                                    <?php echo $row->email ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <!-- end td -->
                                </table>
                                <!-- end tabel -->
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    <?php endif; ?>
    <!-- script FlexStart -->
    <link href="<?php echo base_url('/asset/FlexStart/') ?>assets/js/script.js" rel="stylesheet">
</body>

</html>