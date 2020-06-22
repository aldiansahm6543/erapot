      <div class="line"></div>
      <?php if (!$nilai): ?>
        <div class="alert alert-danger" role="alert">
          Tidak ada data siswa  !
        </div>
      <?php endif; ?>
      <section id=" datauser" class="bd-callout bd-callout-info container">
        <div class="tabhead">
          <div class="row">
            <div class="col">
              <form class="form-inline justify-content-end mb-2 cari" action="<?= base_url('walikelas/nilai/'); ?>" method="post">
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
                <th scope="col">Nisn</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1;  foreach ($nilai as $u): ?>
              <tr>
                <th><?= $no++; ?></th>
                <td><?= $u->nama ?></td>
                <td><?= $u->nisn ?></td>
                <td> <a class="badge badge-info p-2" href="<?= base_url('walikelas/nilai/upload/') . $u->idsiswa ?>" title="">upload nilai</a></td>
              </tr> 
              <?php endforeach; ?>
              <tr>
                
            </tbody>
          </table>
        </div>
      </section>