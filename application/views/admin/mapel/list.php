<div class="row">
        <div class="col">
          <a href="<?= base_url('admin/mapel/input'); ?>" class="btn btn-success btn-lg btn-block  shadow">Input mapel</a>
        </div>
        <div class="col">
          <a href="<?= base_url('admin/mapel'); ?>" class="btn btn-info btn-lg btn-block  shadow">Lihat mapel</a>
        </div>
      </div>
      <div class="line"></div>
      <section id=" datauser" class="bd-callout bd-callout-info container">
        <div class="tabhead">
          <div class="row">

            <div class="col">
              <form class="form-inline justify-content-end mb-2 cari" action="<?= base_url('admin/mapel'); ?>" method="post">
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
                <th scope="col">Kode mapel</th>
                <th scope="col">Nama mapel</th>
                <th scope="col">Kelompok</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($mapel as $m): ?>
              <tr>
                <th><?= $m->kodemapel; ?></th>
                <td><?= $m->namamapel; ?></td>
                <td><?= $m->kelompok ?></td>
                <td>
                  <button class="badge btn-warning" onclick="window.location.href='<?= base_url('admin/mapel/update/') . $m->kodemapel ; ?>'">Update</button>
                  <button class="badge btn-danger" onclick="if(confirm('anda yakin ingin menghapus mapel <?= $m->namamapel ?> ?'))window.location.href='<?= base_url('admin/mapel/delete/') . $m->kodemapel ; ?>' ">Delete</button>
                </td>
              </tr>
              <?php endforeach; ?>
              <tr>
            </tbody>
          </table>
        </div>
      </section>