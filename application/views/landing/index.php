<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- My Font -->
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

  <!-- My CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css"/>

  <!-- My Icon -->
  <link rel="icon" href="<?= base_url('assets/') ?>img/icon.png"/>

  <title>TheSiS | Tracking Secure System</title>

</head>
<body>
  <!-- NavBar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url() ?>">TheSiS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Features</a>
          <a class="nav-item nav-link" href="#">About</a>
          <a class="nav-item tombol btn btn-primary" href="<?= base_url('auth/registration') ?>">Join Us</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- End of NavBar -->

  <!-- JumboTron -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4"><span>TheSiS</span> make your vehicle more <span>Secure</span></h1>
      <br><br>
      <a href="" class="btn btn-primary tombol">Our Work</a>
    </div>
  </div>
  <!-- End JumboTron -->

  <!-- Container -->
  <div class="container">
    <!-- Info Panel-->
    <div class="row justify-content-center">
      <div class="col-10 info-panel">
        <div class="row">
          <div class="col-lg">
            <img src="<?= base_url('assets/') ?>img/employee.png" alt="Employee" class="float-left">
            <h4>24 Hours</h4>
            <p>Lorem ipsum dolor siti, rem.</p>
          </div>
          <div class="col-lg">
            <img src="<?= base_url('assets/') ?>img/hires.png" alt="Hires" class="float-left">
            <h4>24 Hours</h4>
            <p>Lorem ipsum dolor sitm.</p>
          </div>
          <div class="col-lg">
            <img src="<?= base_url('assets/') ?>img/security.png" alt="Security" class="float-left">
            <h4>24 Hours</h4>
            <p>Lorem ipsum dolor sit</p>
          </div>
        </div>
      </div>
    </div>
    <!-- End Info Panel -->

    <!-- Workspace -->
    <div class="row workingspace">
      <div class="col-lg-6">
        <img src="<?= base_url('assets/') ?>img/workingspace.png" alt="Workingspace" class="img-fluid">
      </div>
      <div class="col-lg-5">
        <h3>You <span>Work</span> Like at <span>Home</span></h3>
        <p>Bekerja dengan suasana hati yang lebih asik</p>
        <a href="" class="btn btn-primary tombol">Gellery </a>
      </div>
    </div>
    <!-- End Workingspace --> 

    <!-- Testimonial -->
    <section class="testimoni">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, nam.</h5>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-6 justify-content-center d-flex">
          <figure class="figure">
            <img src="<?= base_url('assets/') ?>img/img1.png" class="figure-img img-fluid rounded-circle" alt="Testi 1">
          </figure>
          <figure class="figure">
            <img src="<?= base_url('assets/') ?>img/icon.png" class="figure-img img-fluid rounded-circle active" alt="Testi 2">
            <figcaption class="figure-caption">
              <h5>Sunny Ye</h5>
              <p>Designer</p>
            </figcaption>
          </figure>
          <figure class="figure">
            <img src="<?= base_url('assets/') ?>img/img3.png" class="figure-img img-fluid rounded-circle" alt="Testi 3">
          </figure>
        </div>
      </div>
    </section>
    <!-- End Testi -->

    <!-- Footer -->
    <div class="row footer">
      <div class="col text-center">
        <p>2020 TheSiS All Rights Reserved by KAnggara75</p>
      </div>
    </div>
    <!-- End Footer -->
  </div>
  <!-- End Container -->
  
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
</body>

</html>