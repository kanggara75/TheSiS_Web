<!DOCTYPE html>
<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- My CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/landing.css" />
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/landingresponsive.css" />
  <!-- My Icon -->
  <link rel="icon" href="<?= base_url('assets/') ?>img/icon.png" />
  <!-- Title -->
  <title>TheSiS | <?= $title; ?></title>
</head>

<body>
  <header>
    <div class="container">
      <div class="header-left">
        <img class="logo" src="<?= base_url('assets/') ?>img/logo.png">
      </div>
      <!-- Tambahkan menu ikon dibaris bawah -->
      <span class="fa fa-bars menu-icon"></span>
      <div class="header-right">
        <a href="<?= base_url('simulation') ?>">Simulasi</a>
        <a href="<?= base_url('auth/registration') ?>">Daftar</a>
        <a href="<?= base_url('auth') ?>" class="login">Masuk</a>
      </div>
    </div>
  </header>
  <div class="top-wrapper">
    <div class="container">
      <h1>SMART EARLY WARNING SYSTEM.</h1>
      <h1>PENGAMANAN LANJUTAN PADA KENDARAAN ANDA.</h1>
      <p>TheSiS merupakan sebuah sistem keamanan pada kendaraan berbasis Internet of Think.</p>
      <p>Sistem ini menawarkan keamanan dan pemantauan tambahan pada kendaraan anda, juga dapat dijadikan saklar untuk mematikan kendaraan dari jarak jauh.</p>
      <div class="btn-wrapper">
        <a href="<?= base_url('simulation') ?>" class="btn signup">Simulasikan</a>
        <p>atau</p>
        <a href="<?= base_url('auth/registration') ?>" class="btn facebook">Daftar</a>
        <a href="<?= base_url('auth') ?>" class="btn twitter">Masuk</a>
      </div>
    </div>
  </div>
  <div class="lesson-wrapper">
    <div class="container">
      <div class="heading">
        <h2>Cari tau di mana kendaraan anda berada!</h2>
      </div>
      <div class="lessons">
        <div class="lesson">
          <div class="lesson-icon">
            <img src="https://prog-8.com/images/html/advanced/html.png">
            <p>Tracking</p>
          </div>
          <p class="txt-contents">Lacak keberadaan kendaraan anda melalui koordinat yang akan diarahkan dengan Google Map.</p>
        </div>
        <div class="lesson">
          <div class="lesson-icon">
            <img src="https://prog-8.com/images/html/advanced/jQuery.png">
            <p>Monitoring</p>
          </div>
          <p class="txt-contents">Pantau kondisi dan keadaan kendaraan anda hanya dengan internet.</p>
        </div>
        <div class="lesson">
          <div class="lesson-icon">
            <img src="https://prog-8.com/images/html/advanced/ruby.png">
            <p>Control</p>
          </div>
          <p class="txt-contents">Menonaktifkan kendaraan secara langsung dari jarak jauh hanya dengan koneksi internet.</p>
        </div>
        <div class="lesson">
          <div class="lesson-icon">
            <img src="https://prog-8.com/images/html/advanced/php.png">
            <p>Live Report</p>
          </div>
          <p class="txt-contents">Dapatkan Notifikasi secara langsung jika terdapat perubahan/pergerakan dari kendaraan anda secara langsung.</p>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
  <div class="message-wrapper">
    <div class="container">
      <div class="heading">
        <h2>Apakah Anda siap untuk bergabung menjadi pengembang sistem ini?</h2>
        <h3>Ayo belajar coding, ayo belajar menjadi lebih kreatif!</h3>
      </div>
      <a href="<?= base_url('about') ?>" target="_blank">
        <span class=" btn message">About Us</span>
      </a>
    </div>
  </div>
  <footer>
    <div class="container">
      <img src="<?= base_url('assets/') ?>img/footer_logo.png">
      <p>Tracking Secure System.</p>
    </div>
  </footer>
</body>

</html>