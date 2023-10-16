<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi karyawan</title>
</head>
<link href="<?php echo base_url('/asset/FlexStart/') ?>assets/css/dashboard.css" rel="stylesheet">
<!-- <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet"> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->

<body>
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <?php $this->load->view('component/sidebar'); ?>
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">
                                    <img src="https://bytewebster.com/img/logo.png" width="40"> Absensi karyawan
                                </h1>
                            </div>
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs mt-4 overflow-x border-0">
                        </ul>
                    </div>
                </div>
            </header>
            <!-- start table absensi karyawan -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <div class="card shadow border-0 mb-7">
                        <div class="card-header bg-white">
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0">Absensi</h5>
                                <?php if ($this->session->userdata('role') === "admin"): ?>
                                    <button class="btn btn-sm btn-primary"><a
                                            href="<?php echo base_url('page/export_absensi_all') ?>"
                                            class="text-decoration-none text-light">Export</a></button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama karyawan</th>
                                        <th scope="col">Kegiatan</th>
                                        <th scope="col">Tanggal absen</th>
                                        <th scope="col">Jam masuk</th>
                                        <th scope="col">Jam pulang</th>
                                        <th scope="col">Keterangan izin</th>
                                        <th scope="col">Status</th>
                                        <?php if ($this->session->userdata('role') === "karyawan"): ?>
                                            <th scope="col" class="text-center">Aksi</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($karyawan as $row):
                                        $no++ ?>
                                        <tr>
                                            <td>
                                                <?php echo $no ?>
                                            </td>
                                            <td>
                                                <?php echo $row->nama_depan . '' . $row->nama_belakang ?>
                                            </td>
                                            <td>
                                                <?php echo $row->kegiatan ?>
                                            </td>
                                            <td>
                                                <?php echo $row->date ?>
                                            </td>
                                            <td>
                                                <?php echo $row->jam_masuk ?>
                                            </td>
                                            <td>
                                                <?php echo $row->jam_pulang ?>
                                            </td>
                                            <td>
                                                <?php echo $row->keterangan_izin ?>
                                            </td>
                                            <td>
                                                <?php echo $row->status ?>
                                            </td>
                                            <?php if ($this->session->userdata('role') === "karyawan"): ?>
                                                <td class="text-end">
                                                    <?php if ($row->status == "done"): ?>
                                                        <button type="button" class="btn btn-sm btn-secondary text-danger-hover"
                                                            disabled><a class="text-white text-decoration-none">
                                                                Pulang</a>
                                                        </button>
                                                    <?php elseif ($row->keterangan_izin != "-"): ?>
                                                        <button type="button" class="btn btn-sm btn-secondary text-danger-hover"
                                                            disabled><a class="text-white text-decoration-none">
                                                                Pulang</a>
                                                        </button>
                                                    <?php else: ?>
                                                        <button type="button" class="btn btn-sm btn-warning text-danger-hover"><a
                                                                class="text-black text-decoration-none"
                                                                href="<?php echo base_url('page/pulang/' . $row->id) ?>">
                                                                Pulang</a>
                                                        </button>
                                                    <?php endif; ?>
                                                    <button type="button"
                                                        class="btn btn-sm btn-square btn-primary text-danger-hover-none"><a
                                                            class="text-light text-decoration-none"
                                                            href="<?php echo base_url('page/edit_kegiatan/' . $row->id) ?>">
                                                            <i class="fas fa-edit"></i></a>
                                                    </button>
                                                    <button type="button" onclick="hapus(<?php echo $row->id ?>)"
                                                        class="btn btn-sm btn-square btn-danger text-danger-hover-none">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <!-- end tabel absensi karyawan -->
        <link href="<?php echo base_url('/asset/FlexStart/') ?>assets/js/script.js" rel="stylesheet">
        <script>
            function hapus(id) {
                swal.fire({
                    title: 'Yakin untuk menghapus data ini?',
                    icon: 'warning',
                    background: '#fff',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Ya Hapus', customClass: {
                        title: 'text-dark',
                        content: 'text-dark'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil Dihapus',
                            showConfirmButton: false,
                            timer: 1500,

                        }).then(function () {
                            window.location.href = "<?php echo base_url('controller/namafunction/') ?>" + id;
                        });
                    }
                });
            }
        </script>
        <?php if ($this->session->flashdata('berhasil_pulang')): ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '<?= $this->session->flashdata('berhasil_pulang') ?>',
                    background: '#fff',
                    customClass: {
                        title: 'text-dark',
                        content: 'text-dark'
                    }
                });
            </script>
        <?php endif; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>

        <script>
            const tampilHarian = document.getElementById('tampil_harian');
            const tampilMingguan = document.getElementById('tampil_mingguan');
            const tampilBulanan = document.getElementById('tampil_bulanan');

            const rekapHarian = document.getElementById('rekap_harian');
            const rekapMingguan = document.getElementById('rekap_mingguan');
            const rekapBulanan = document.getElementById('rekap_bulanan');

            rekapHarian.addEventListener('click', function () {
                tampilHarian.style.display = 'block';
                tampilMingguan.style.display = 'none';
                tampilBulanan.style.display = 'none';
            });

            rekapMingguan.addEventListener('click', function () {
                tampilHarian.style.display = 'none';
                tampilBulanan.style.display = 'none';
                tampilMingguan.style.display = 'block';
            });

            rekapBulanan.addEventListener('click', function () {
                tampilHarian.style.display = 'none';
                tampilMingguan.style.display = 'none';
                tampilBulanan.style.display = 'block';
            });
        </script>


</body>

</html>