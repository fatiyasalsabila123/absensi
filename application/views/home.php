<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>

  <!-- Favicons -->
  <link href="<?php echo base_url('/asset/FlexStart/')?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url('/asset/FlexStart/')?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('/asset/FlexStart/')?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url('/asset/FlexStart/')?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url('/asset/FlexStart/')?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url('/asset/FlexStart/')?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url('/asset/FlexStart/')?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url('/asset/FlexStart/')?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('/asset/FlexStart/')?>assets/css/style.css" rel="stylesheet">
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- <img src="https://img.freepik.com/free-vector/appointment-booking-illustrated_23-2148579430.jpg?w=740&t=st=1696819669~exp=1696820269~hmac=14e6eeecc53c1da73d9417ca09c63acadba016bb42dd1b9bcfa3358cfc6e534d" alt=""> -->
        <span>Absensi</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Fitur</a></li>
          <li><a class="getstarted scrollto" href="auth">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Selamat datang di website absensi karyawan kami</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Kelola kehadiran karyawan dengan mudah dan efisien</h2>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="<?php echo base_url('/asset/FlexStart/')?>assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Tentang absensi</h3>
              <h2>Apa itu absensi karyawan ? </h2>
              <p>
                Data yang menunjukan tentang kehadiran masing-masing karyawan untuk datang bekerja di sebuah perusahaan atau pekerjaan
              </p>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="https://img.freepik.com/free-vector/appointment-booking-illustrated_23-2148579430.jpg?size=626&ext=jpg&ga=GA1.1.1464020286.1696819460&semt=sph" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Fitur</h2>
          <p>Fitur tentang web absensi kami</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-box blue">
              <i class="ri-discuss-line icon"></i>
              <h3>Absen sehari sekali</h3>
              <p>Fitur absen ini dirancang untuk memastikan bahwa pengguna hanya dapat melakukan absensi satu kali dalam sehari. Anda dapat melakukan absen pada satu waktu tertentu setiap hari, memastikan keakuratan dan keteraturan catatan kehadiran Anda.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-box orange">
              <i class="ri-discuss-line icon"></i>
              <h3>Edit kegiatan</h3>
              <p>Bisa mengedit kegiatan jika anda telah memasukan kegiatan yang salah dan jika ada kegiatan yang ingin di perbaiki</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-box green">
              <i class="ri-discuss-line icon"></i>
              <h3>Pulang</h3>
              <p>Di button pulang ini jika anda mengklikny maka status akan menjadi done dan jam pulang akan terisi otomatis</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-box red">
              <i class="ri-discuss-line icon"></i>
              <h3>Izin</h3>
              <p>Jika anda tidak bisa bekerja karena sakit atau alasan lainya maka anda bisa izin dan izin hanya dilakukan sehari sekali saja dan ketika sudah melakukan pulang</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-box purple">
              <i class="ri-discuss-line icon"></i>
              <h3>Export data</h3>
              <p>Untuk role admin bisa mengexport data karyawan dan absensi ke excel ini hanya bisa di jangkau dengan role admin selain admin tidak bisa</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
            <div class="service-box pink">
              <i class="ri-discuss-line icon"></i>
              <h3>Rekap data</h3>
              <p>Terdapat rekap data harian, mingguan dan bulanan dan bisa di export ke excel.Hanya bisa dijangkau ole role admin</p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Services Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="<?php echo base_url('/asset/FlexStart/')?>assets/img/logo.png" alt="">
              <span>Absensi</span>
            </a>
            <p>Data yang menunjukan tentang kehadiran masing-masing karyawan untuk datang bekerja di sebuah perusahaan atau pekerjaan</p>
            <div class="social-links mt-3">
              <a href="https://github.com/fatiyasalsabila123" target="_blank" rel="noopener noreferrer" class="github"><i class="bi bi-github"></i></a>
              <a href="https://gitlab.com/fatiyasalsabila123" target="_blank" rel="noopener noreferrer" class="gitlab"><i class="bi bi-gitlab"></i></a>
              <!-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> -->
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Menu</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#about">About</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#services">Fitur</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Page</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="auth">Login</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="auth/register">Register</a></li>
              <li><i class="bi bi-chevron-right"></i> <a>Dashboard</a></li>
              <li><i class="bi bi-chevron-right"></i> <a>Absensi karyawan</a></li>
              <li><i class="bi bi-chevron-right"></i> <a>Profile</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact </h4>
            <p>
              Indonesia <br>
              Jawa tengah
              Kaliwungu<br><br>
              <strong>Phone:</strong> +62 858xxxxxxx<br>
              <strong>Email:</strong>fatiyasalsabila83@gmail.com<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>absensi</span></strong>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url('/asset/FlexStart/')?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?php echo base_url('/asset/FlexStart/')?>assets/vendor/aos/aos.js"></script>
  <script src="<?php echo base_url('/asset/FlexStart/')?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url('/asset/FlexStart/')?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url('/asset/FlexStart/')?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url('/asset/FlexStart/')?>assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url('/asset/FlexStart/')?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url('/asset/FlexStart/')?>assets/js/main.js"></script>

</body>

</html>