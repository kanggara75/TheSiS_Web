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
        <img class="logo" src="https://prog-8.com/images/html/advanced/main_logo.png">
      </div>
      <!-- Tambahkan menu ikon dibaris bawah -->
      <span class="fa fa-bars menu-icon"></span>
      <div class="header-right">
        <a href="#">Pelajaran</a>
        <a href="#">Daftar</a>
        <a href="#" class="login">Log in</a>
      </div>
    </div>
  </header>
  <div class="top-wrapper">
    <div class="container">
      <h1>BELAJAR CODING.</h1>
      <h1>BELAJAR MENJADI LEBIH KREATIF.</h1>
      <p>Progate adalah platform online untuk belajar pemrograman.</p>
      <p>Kami menawarkan lingkungan pemrograman yang lengkap untuk mempermudah Anda memulai.</p>
      <div class="btn-wrapper">
        <a href="#" class="btn signup">Daftar dengan Email</a>
        <p>atau</p>
        <a href="#" class="btn facebook"><span class="fa fa-facebook"></span>Daftar dengan Facebook</a>
        <a href="#" class="btn twitter"><span class="fa fa-twitter"></span>Daftar dengan Twitter</a>
      </div>
    </div>
  </div>
  <div class="lesson-wrapper">
    <div class="container">
      <div class="heading">
        <h2>Cari tau dari mana anda mau memulai!</h2>
      </div>
      <div class="lessons">
        <div class="lesson">
          <div class="lesson-icon">
            <img src="https://prog-8.com/images/html/advanced/html.png">
            <p>HTML & CSS</p>
          </div>
          <p class="txt-contents">Dua bahasa yang digunakan untuk membangun struktur dan design tambilan website anda.</p>
        </div>
        <div class="lesson">
          <div class="lesson-icon">
            <img src="https://prog-8.com/images/html/advanced/jQuery.png">
            <p>jQuery</p>
          </div>
          <p class="txt-contents">JavaScript Library yang cepat, kaya akan fitur dan mudah digunakan untuk menangani animasi dan permintaan Ajax.</p>
        </div>
        <div class="lesson">
          <div class="lesson-icon">
            <img src="https://prog-8.com/images/html/advanced/ruby.png">
            <p>Ruby</p>
          </div>
          <p class="txt-contents">Bahasa dinamis, serba guna yang sederhana dan produktif. Ruby sering digunakan untuk membuat aplikasi web yang responsive.</p>
        </div>
        <div class="lesson">
          <div class="lesson-icon">
            <img src="https://prog-8.com/images/html/advanced/php.png">
            <p>PHP</p>
          </div>
          <p class="txt-contents">Bahasa scripting "open-source" yang dapat disematkan ke dalam HTML, dan cocok untuk pengembangan web.</p>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
  <div class="message-wrapper">
    <div class="container">
      <div class="heading">
        <h2>Apakah anda siap untuk menjadi programer yang handal?</h2>
        <h3>Ayo belajar coding, ayo belajar menjadi lebih kreatif!</h3>
      </div>
      <span class="btn message">Mulai belajar</span>
    </div>
  </div>
  <footer>
    <div class="container">
      <img src="https://prog-8.com/images/html/advanced/footer_logo.png">
      <p>Learn to code, learn to be creative.</p>
    </div>
  </footer>
</body>

</html>