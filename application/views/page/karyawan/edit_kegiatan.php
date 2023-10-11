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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Edit Kegiatan</title>
</head>

<body>
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <?php $this->load->view('component/sidebar'); ?>
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <?php $this->load->view('component/header'); ?>
            <?php foreach ($karyawan1 as $data):?>
            <form method="post" action="<?php echo base_url('page/aksi_edit')?>" enctype="multipart/form-data" class="card shadow border-0 w-100 py-3">
            <input type="hidden" name="id" value="<?php echo $data->id?>">
                <div class="card-body">
                    <div>
                        <h3>Kegiatan</h3>
                        <!-- <hr> -->
                        <textarea cols="40" rows="10" name="kegiatan" class="form-control mt-5"><?php echo $data->kegiatan;?></textarea>
                    </div>
                </div>
                <div class="flex px-3">
                <button type="button" class="btn btn-sm btn-danger text-danger-hover-none"><a class="text-light text-decoration-none" href="/absensi/page/absensi_karyawan">
                   Cancel</a>
                </button>
                <button type="submit" name="submit" class="btn btn-sm btn-primary text-danger-hover-none">
                   Submit
                </button>
            </div>
            </form>
            <?php endforeach?>
        </div>
    </div>
</body>

</html>