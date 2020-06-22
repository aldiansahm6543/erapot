      <button type="button" class="btn btn-primary" disabled> Kelas <?= $id ?> </button>
      <div class="line"></div>
      <h3 class="text-muted">Semester ganjil</h3>
      <?php if (!$ganjil) : ?>
        <div class="alert alert-danger" role="alert">
          Tidak ada data nilai semester ganjil!
        </div>
      <?php endif; ?>
      <section id=" datauser" class="bd-callout bd-callout-info container">
        <div class="tabhead">
            <div >
              <?php if ($ganjil): ?>
              <a href="<?= base_url('siswa/nilai/cetak/') .  $id ?>" class="btn btn-success ml-3"><i class="fas fa-print"></i> Print </a>
              <?php else: ?>
                <button  class="btn btn-success ml-3" disabled><i class="fas fa-print"></i> Print</button>
              <?php endif ?>
            </div>
          <div class="row">
            <div class="col">
              <form class="form-inline justify-content-end mb-2 cari" action="<?= base_url('siswa/nilai/kelas/') . $id; ?>" method="post">
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
                <th scope="col">Mata pelajaran</th>
                <th scope="col">Semester</th>
                <th scope="col">Tugas</th>
                <th scope="col">Uts</th>
                <th scope="col">Uas</th>
                <th scope="col">Rata-rata</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($ganjil as $u): ?>
              <?php if ($u->status == 0): ?>
              <?php elseif($u->status == 1): ?>
              <tr>
                <th><?= $no++; ?></th>
                <td><?= $u->namamapel; ?></td>
                <td><?= $u->semester ?></td>
                <td><?= $u->tugas; ?></td>
                <td><?= $u->uts; ?></td>
                <td><?= $u->uas; ?></td>
                <td><?= $u->rata; ?></td>
              <tr>
              <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>
      <div class="line"></div>


      <h3 class="text-muted">Semester genap</h3>
      <?php if (!$genap) : ?>
        <div class="alert alert-danger" role="alert">
          Tidak ada data nilai semester genap!
        </div>
      <?php endif; ?>
      <section id=" datauser" class="bd-callout bd-callout-info container">
        <div class="tabhead">
            <div >
              <?php if ($genap): ?>
              <a href="<?= base_url('siswa/nilai/cetakg/') .  $id ?>" class="btn btn-success ml-3"><i class="fas fa-print"></i> Print </a>
              <?php else: ?>
                <button  class="btn btn-success ml-3" disabled><i class="fas fa-print"></i> Print</button>
              <?php endif ?>
            </div>
          <div class="row">
            <div class="col">
              <form class="form-inline justify-content-end mb-2 cari" action="<?= base_url('siswa/nilai/kelas/') . $id; ?>" method="post">
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
                <th scope="col">Mata pelajaran</th>
                <th scope="col">Semester</th>
                <th scope="col">Tugas</th>
                <th scope="col">Uts</th>
                <th scope="col">Uas</th>
                <th scope="col">Rata-rata</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($genap as $u): ?>
               <?php if ($u->status == 0): ?>
              <?php elseif($u->status == 1): ?>
              <tr>
                <th><?= $no++; ?></th>
                <td><?= $u->namamapel; ?></td>
                <td><?= $u->semester ?></td>
                <td><?= $u->tugas; ?></td>
                <td><?= $u->uts; ?></td>
                <td><?= $u->uas; ?></td>
                <td><?= $u->rata; ?></td>
              <tr>
              <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>