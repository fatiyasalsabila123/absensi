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
                            <form class="d-flex justify-content-between" action = "<?php echo base_url('page/rekapBulanan')?>" method="post">
                                <h5 class="mb-0">Data perbulan</h5>
                                <div class="d-flex" style="gap:10px">
                                    <select class="form-select form-select-sm" name="bulan" id="bulan"
                                        aria-label="Small select example">
                                        <option value="">Pilih bulan</option>
                                        <option value="01" <?php echo date('m') == '01' ? 'selected' : '' ?>>Januari</option>
                                        <option value="02" <?php echo date('m') == '02' ? 'selected' : '' ?>>Februari</option>
                                        <option value="03" <?php echo date('m') == '03' ? 'selected' : '' ?>>Maret</option>
                                        <option value="04" <?php echo date('m') == '04' ? 'selected' : '' ?>>April</option>
                                        <option value="05" <?php echo date('m') == '05' ? 'selected' : '' ?>>Mei</option>
                                        <option value="06" <?php echo date('m') == '06' ? 'selected' : '' ?>>Juni</option>
                                        <option value="07" <?php echo date('m') == '07' ? 'selected' : '' ?>>Juli</option>
                                        <option value="08" <?php echo date('m') == '08' ? 'selected' : '' ?>>Agustus</option>
                                        <option value="09" <?php echo date('m') == '09' ? 'selected' : '' ?>>September</option>
                                        <option value="10" <?php echo date('m') == '10' ? 'selected' : '' ?>>Oktober</option>
                                        <option value="11" <?php echo date('m') == '11' ? 'selected' : '' ?>>November</option>
                                        <option value="12" <?php echo date('m') == '12' ? 'selected' : '' ?>>Desember</option>
                                    </select>
                                    <button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
                                    <button type="submit" name="submit" class="btn btn-sm btn-primary"><a
                                            class="text-light"
                                            href="<?php echo base_url('page/export_absensi_bulanan') ?>">Export</a></button>
                                </div>
                            </form>

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
                                    foreach ($rekapBulanan as $row):
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Add an event listener for the "change" event on the select element
            var selectElement = document.getElementById('bulan');
            var formElement = selectElement.form; // Get the parent form

            selectElement.addEventListener('change', function () {
                formElement.submit(); // Submit the form when the select element changes
            });
        });
    </script>

</body>

</html>