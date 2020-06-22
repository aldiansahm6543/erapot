      <div class="row">
        <div class="col">
          <a href="<?= base_url('guru/nilai/kelas/') . $id; ?>" class="btn btn-success btn-lg btn-block  shadow">Input nilai</a>
        </div>
        <div class="col">
          <a href="<?= base_url('guru/nilai/siswa/') . $id; ?>" class="btn btn-info btn-lg btn-block  shadow">Lihat nilai</a>
        </div>
      </div>
      <div class="line"></div>
      <?php if (!$user): ?>
        <div class="alert alert-danger" role="alert">
          Tidak ada data nilai!
        </div>
      <?php endif; ?>
      <section id=" datauser" class="bd-callout bd-callout-info container">
        <div class="tabhead">
            <div >
              <button type="button" class="btn btn-primary" disabled> Kelas <?= $id ?> </button>
            </div>
          <div class="row">
            <div class="col">
              <form class="form-inline justify-content-end mb-2 cari" action="<?= base_url('guru/nilai/siswa/') . $id; ?>" method="post">
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
                <th scope="col">Jurusan</th>
                <th scope="col">Mata pelajaran</th>
                <th scope="col">Semester</th>
                <th scope="col">Tugas</th>
                <th scope="col">Uts</th>
                <th scope="col">Uas</th>
                <th scope="col">Rata-rata</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($user as $u): ?>
                <?php foreach ($siswa as $s): ?>
                  <?php if ($u->idsiswa == $s->idsiswa): ?>
              <tr>
                <th><?= $no++; ?></th>
                <td><?= $s->nama; ?></td>
                <td><?= $u->jurusan ?> <?= $u->ruangkelas ?></td>
                <td><?= $u->namamapel; ?></td>
                <td><?= $u->semester ?></td>
                <td><?= $u->tugas; ?></td>
                <td><?= $u->uts; ?></td>
                <td><?= $u->uas; ?></td>
                <td><?= $u->rata; ?></td>
                <td><button class="badge btn-warning" onclick="window.location.href='<?= base_url('guru/nilai/update/') . $u->idnilai . '/' . $id ; ?>'">Update</button>
                <?php if ($id == 10): ?>
                  <button class="badge btn-danger" onclick="if(confirm('anda yakin ingin menghapus nilai <?= $s->nama ?> ?'))window.location.href='<?= base_url('guru/nilai/delete10/') . $u->idnilai; ?>' ">Delete</button>
                <?php endif ?>
                <?php if ($id == 11): ?>
                  <button class="badge btn-danger" onclick="if(confirm('anda yakin ingin menghapus nilai <?= $s->nama ?> ?'))window.location.href='<?= base_url('guru/nilai/delete11/') . $u->idnilai; ?>' ">Delete</button>
                <?php endif ?>
                <?php if ($id == 12): ?>
                  <button class="badge btn-danger" onclick="if(confirm('anda yakin ingin menghapus nilai <?= $s->nama ?> ?'))window.location.href='<?= base_url('guru/nilai/delete12/') . $u->idnilai; ?>' ">Delete</button>
                <?php endif ?>
                 </td>
              </tr>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php endforeach; ?>
              <tr>
                
            </tbody>
          </table>
        </div>
      </section>