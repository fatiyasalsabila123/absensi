<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi karyawan</title>
</head>
<link href="<?php echo base_url('/asset/FlexStart/') ?>assets/css/dashboard.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <?php $this->load->view('component/sidebar'); ?>
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <?php $this->load->view('component/header'); ?>
            <!-- start table absensi karyawan -->
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
                            <th scope="col">Aksi</th>
                            <th></th>
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
                                <td class="text-end">
                                    <button type="button" <?php echo base_url('page/pulang/'. $row->id)?>
                                        class="btn btn-sm btn-neutral text-danger-hover">
                                        Pulang
                                    </button>
                                    <button type="button"
                                        class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" onclick="showSweetAlert()"
                                        class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end tabel absensi karyawan -->

</body>

</html>