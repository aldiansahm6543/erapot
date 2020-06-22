<doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>E-Raport</title>

    <link rel="shortcut icon" href="<?= base_url(); ?>asset/img/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>asset/css/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>asset/fontawesome-free/css/all.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>asset/css/style_home.css">

  </head>

  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container">
        <h2 class="brand" href="#">E-Raport</h2>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active" href="">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link features" href="#">Features</a>
            <a class="nav-item nav-link about" href="#">About Us</a>
            <a class="nav-item btn tombol" data-toggle="modal" data-target="#exampleModal" href="login/index.html">Login</a>

          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Jumbotron -->
    <div class="jumbotron">
      <div class="container ">
        <div class="text-center tipe">
          <h1><span >Tingkatkan </span>
          </h1>
          <h1><span class="type"> </span>
          </h1>

        </div>
      </div>
    </div>
    <!-- Akhir Jumbotron -->

    <!-- ABOUT -->
    <section id="about" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="<?= base_url(); ?>asset/img/features-2.svg" alt="">
          </div>

          <div class="col-lg-6 content">
            <h2>Aplikasi E-Raport</h2>

            <h3>Aplkasi E-Raport adalah aplikasi raport online berbasis website yang mana penilaian Raport di lakukan dengan digital dimana guru harus merencanakan penilaian secara online.
            </h3>
            <h3>
              E-rapor di harapkan dapat merubah pola kerja guru dari pola manual ke pola digital dan juga dapat mempermudah guru dalam melakukan penilaian ke siswa bahkan sampai ke cetak rapor dan evaluasi nilai hasil belajar siswa
            </h3>
            <h3>
              Kehadiran raport online tentunya akan mampu meringankan beban guru dalam tugas-tugas yang bersifat administratif . Dengan begitu guru pun dapat fokus pada tugas utamanya yaitu mendidik siswanya agar menjadi insan yang berilmu dan berakhlak mulia.
            </h3>

          </div>
        </div>

      </div>
    </section><!-- #about -->
    <!-- AKHIR ABOUT -->

    <!-- Features -->
    <section id="features">
      <div class="container">
        <div class="section-header">
          <h2>Features</h2>
        </div>

        <div class="row">

          <div class="col-lg-6 mb-3">
            <div class="box wow fadeInLeft">
              <div class="icon"><i class="fas fa-desktop
              "></i></div>
              <h4 class="title mt-3">Responsive</h4>
              <p class="description"></p>
            </div>
          </div>

          <div class="col-lg-6 mb-3">
            <div class="box wow fadeInRight">
              <div class="icon"><i class="fas fa-print"></i></div>
              <h4 class="title mt-3">Print Out</h4>
              <p class="description"></p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInLeft" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-folder" aria-hidden="true"></i></div>
              <h4 class="title mt-3">Safe Data</h4>
              <p class="description"></p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-clock"></i></div>
              <h4 class="title mt-3">Efficient</h4>
              <p class="description"></p>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- AKHIR FEATURES -->

    <!-- TEAM INFO -->
    <section id="team">
      <div class="container">
        <div class="section-header">
          <h2>Meet The Team</h2>
        </div>

        <div class="row justify-content-center">

          <div class="col col-lg-3">
            <div class="member">
              <img src="<?= base_url(); ?>asset/img/zidan.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Zidan</h4>
                  <span>Front End</span>

                </div>
              </div>
            </div>
          </div>

          <div class="col col-lg-3">
            <div class="member">
              <img src="<?= base_url(); ?>asset/img/123.jpeg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Aldiansah</h4>
                  <span>Back End</span>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- AKHIR TEAM INFO -->

    <!-- FOOTER -->
    <footer id="footer">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong>GEA2019</strong>. All Rights Reserved
        </div>
      </div>
    </footer>
    <!-- FOOTER -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-body">

            <div class="card card-signin my-5">
              <h2 class="card-title text-center">Log In</h2>
              <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <form class="form-signin" action="<?= base_url('auth/login'); ?>" method="post">
                  <div class="form-label-group">
                    <input type="text" id="inputText" class="form-control" name="username" placeholder="Username" autofocus>
                    <label for="inputText" class="fas fa-user"> Username</label>

                  </div>
                  <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>

                  <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                    <label for="inputPassword" class="fas fa-key"> Password</label>
                  </div>
                  <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Log In</button>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
  </body>


  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="<?= base_url(); ?>asset/js/jquery-3.3.1.slim.min.js"></script>
  <script src="<?= base_url(); ?>asset/js/popper.min.js"></script>
  <script src="<?= base_url(); ?>asset/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>asset/js/apps_home.js"></script>

  </html>