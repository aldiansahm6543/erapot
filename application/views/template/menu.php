<nav id="sidebar">
      <div id="dismiss">
        <i class="fas fa-2x fa-arrow-left"></i>
      </div>
      <div class="sidebar-header">
        <div class="container">
          <div class="row">
            <div class="profile-header-container">
              <div class="profile-header-img">
      <?php if ($this->session->userdata('level') == 'admin'): ?>
                <img class="img-circle" src="<?= base_url() ?>/asset/img/IMG-20181212-WA0083.jpg" />
                <h4 class="mt-3"><i class="fas fa-user-plus p-1"></i> <?= $this->session->userdata('nama'); ?></h4> 
              </div>
            </div>
          </div>
        </div>

      </div>
      <br>
      <ul class="list-unstyled components">
        <li>
          <a href="<?= base_url('admin/dashboard') ?>"><i class="fas fa-desktop"></i> Dashboard</a>
        </li>
        <li>
          <a href="<?= base_url('admin/user'); ?>"><i class="fas fa-users"></i> Data User</a>
        </li>
        <li>
          <a href="#pagesubmenu" data-toggle="collapse" aria-expanded="false"  class="dropdown-toggle"><i
              class="fas fa-database"></i> Data</a>
          <ul class="collapse list-unstyled" id="pagesubmenu">
            <li>
              <a href="<?= base_url('admin/guru'); ?>"><i class="fas fa-user-tie"></i> Guru</a>
            </li>
            <li>
              <a href="<?= base_url('admin/walikelas'); ?>"><i class="fas fa-user-tag"></i> Walikelas</a>
            </li>
            <li>
              <a href="<?= base_url('admin/siswa'); ?>"><i class="fas fa-user-friends"></i> Siswa</a>
            </li>
            <li>
              <a href="<?= base_url('admin/mapel'); ?>"><i class="fas fa-book"></i> Matapelajaran</a>
            </li>
            <li>
              <a href="<?= base_url('admin/kelas'); ?>"><i class="fas fa-home"></i> Ruang Kelas</a>
            </li>
          </ul>
        </li>
      </ul>
      <?php elseif($this->session->userdata('level') == 'guru'): ?>
        <img class="img-circle" src="<?= base_url('asset/img/guru/') . $guru->foto  ?>" />
                                <h4 class="mt-3"><i class="fas fa-user right p-1"></i> <?= $this->session->userdata('nama'); ?></h4> 
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <br>

            <ul class="list-unstyled components">
                <li>
                    <a href="<?= base_url('guru/profil') ?>"><i class="fas fa-user"></i> Profil</a>
                </li>
                <li>
                    <a href="#pageSubmenu" role="button" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="fas fa-book"></i> Input Nilai</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="<?= base_url('guru/nilai/siswa/') . 10 ?>"><i class="fas fa-book-open"></i> Kelas 10</a>
                        </li>
                        <li>
                            <a href="<?= base_url('guru/nilai/siswa/') . 11 ?>"><i class="fas fa-book-open"></i> Kelas 11</a>
                        </li>
                        <li>
                            <a href="<?= base_url('guru/nilai/siswa/') . 12 ?>"><i class="fas fa-book-open"></i> Kelas 12</a>
                        </li>
                    </ul>
                </li>
            </ul>
      <?php elseif($this->session->userdata('level') == 'walikelas'): ?>
        <img class="img-circle" src="<?= base_url('asset/img/guru/') . $guru->foto  ?>" />
                                <h4 class="mt-3"><i class="fas fa-user right p-1"></i> <?= $this->session->userdata('nama'); ?></h4> 
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <br>
            <ul class="list-unstyled components">
                <li>
                    <a href="<?= base_url('walikelas/profil') ?>"><i class="fas fa-user"></i> Profil</a>
                </li>
                <li>
                    <a href="<?= base_url('walikelas/nilai') ?>"><i class="fas fa-book"></i> Nilai</a>
                </li>
            </ul>
      <?php elseif($this->session->userdata('level') == 'walimurid'): ?>
        <img class="img-circle" src="<?= base_url('asset/img/siswa/') . $siswa->foto  ?>" />
        <h4 class="mt-3"><i class="fas fa-user right p-1"></i> <?= $this->session->userdata('nama'); ?></h4> 
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <br>

            <ul class="list-unstyled components">
                <li>
                    <a href="<?= base_url('siswa/profil') ?>"><i class="fas fa-user"></i> Profil</a>
                </li>
                <li>
                    <a href="#pageSubmenu" role="button" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="fas fa-book"></i> Lihat Nilai</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="<?= base_url('siswa/nilai/kelas/') . 10 ?>"><i class="fas fa-book-open"></i> Kelas 10</a>
                        </li>
                        <li>
                            <a href="<?= base_url('siswa/nilai/kelas/') . 11 ?>"><i class="fas fa-book-open"></i> Kelas 11</a>
                        </li>
                        <li>
                            <a href="<?= base_url('siswa/nilai/kelas/') . 12 ?>"><i class="fas fa-book-open"></i> Kelas 12</a>
                        </li>
                    </ul>
                </li>
            </ul>
      <?php endif; ?>


</nav>
    