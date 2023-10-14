<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data absensi harian</title>
    <link href="<?php echo base_url('/asset/FlexStart/') ?>assets/css/dashboard.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <?php $this->load->view('component/sidebar'); ?>
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <?php $this->load->view('component/header'); ?>
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <div class="card shadow border-0 mb-7">
                        <div class="card-header bg-white">
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0">Data perhari</h5>
                                <div class="d-flex">
                                <button class="btn btn-sm btn-primary"><a
                                        href="<?php echo base_url('page/export_absensi') ?>"
                                        class="text-decoration-none text-light">Export</a></button>
                                    </div>
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
                                        <?php if ($this->session->userdata('role') == "karyawan"): ?>
                                            <th scope="col" class="text-center">Aksi</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;
                                    foreach ($rekapHarian as $row):
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
                                            <?php if ($this->session->userdata('role') == "karyawan"): ?>
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
    </div>
</body>

</html>