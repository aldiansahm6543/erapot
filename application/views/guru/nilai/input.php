      <div class="row">
        <div class="col">
          <a href="<?= base_url('guru/nilai/kelas/') . $id; ?>" class="btn btn-success btn-lg btn-block  shadow">Input nilai</a>
        </div>
        <div class="col">
          <a href="<?= base_url('guru/nilai/siswa/') . $id; ?>" class="btn btn-info btn-lg btn-block  shadow">Lihat nilai</a>
        </div>
      </div>
      <div class="line"></div>
      <section id=" datauser" class="bd-callout bd-callout-info container">
        <div class="tabhead">
          <div class="row">

            <div class="col">
              <form class="form-inline justify-content-end mb-2 cari" action="<?= base_url('guru/nilai'); ?>" method="post">
                <div class="form-group mx-sm-3">
                  <label for="inputCari2" class="sr-only">Cari</label>
                  <input type="text" name="cari" class="form-control" id="inputCari2" placeholder="Cari">
                </div>
                <button type="submit" class="btn btn-outline-info">Cari</button>
              </form>
            </div>
          </div>
        </div>


        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead>
              <tr class="thead">
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($user as $u): ?>
              <tr>
                <th><?= $no++; ?></th>
                <td><?= $u->nama; ?></td>
                <td><?= $u->jurusan; ?> <?= $u->ruangkelas; ?></td>
                <td><a class="badge badge-warning p-2" href="<?= base_url('guru/nilai/input/') . $u->idsiswa ?>">Input nilai</a></td>
              </tr>
              <?php endforeach; ?>
              <tr>
            </tbody>
          </table>
        </div>
      </section>