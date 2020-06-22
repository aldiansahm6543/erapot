<div class="jumbotron jumbotron-fluid bg-info text-white mb-5 rounded-lg shadow">
    <div class="container">
      <h3 class="display-4 text-center text-monospace">Dashboard Admin</h3>
    </div>
</div>
      <div class="line"></div>
<div class="row">
    <div class="col-lg-3">
    <a href="<?= base_url('admin/guru'); ?>">
      <div class="card text-white bg-primary shadow  mb-3" style="max-width: 18rem; ">
        <div class="card-header">Data Guru <i class="fas fa-arrow-right"></i></div>
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-user-tie"></i> Guru : <?= $total_guru ?></h5>
        </div>
      </div>
    </a>
    </div>
    <div class="col-lg-3">
    <a href="<?= base_url('admin/siswa'); ?>">
      <div class="card text-white bg-success shadow  mb-3" style="max-width: 18rem;">
        <div class="card-header">Data Siswa <i class="fas fa-arrow-right"></i></div>
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-user-tie"></i> Siswa : <?= $total_siswa ?></h5>
        </div>
      </div>
    </a>
    </div>
    <div class="col-lg-3">
    <a href="<?= base_url('admin/mapel'); ?>">
      <div class="card text-white bg-warning shadow  mb-3" style="max-width: 18rem;">
        <div class="card-header">Data Mapel <i class="fas fa-arrow-right"></i></div>
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-user-tie"></i> Mapel : <?= $total_mapel ?></h5>
        </div>
      </div>
    </a>
    </div>
    <div class="col-lg-3">
    <a href="<?= base_url('admin/kelas'); ?>">
      <div class="card text-white bg-danger  shadow mb-3" style="max-width: 18rem;">
        <div class="card-header">Data Kelas <i class="fas fa-arrow-right"></i></div>
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-user-tie"></i> Kelas : <?= $total_kelas ?></h5>
        </div>
      </div>
    </a>
    </div>
</div>

    <div class="line"></div>