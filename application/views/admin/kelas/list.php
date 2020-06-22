<div class="row">
        <div class="col">
          <a href="<?= base_url('admin/kelas/input'); ?>" class="btn btn-success btn-lg btn-block  shadow">Input kelas</a>
        </div>
        <div class="col">
          <a href="<?= base_url('admin/kelas'); ?>" class="btn btn-info btn-lg btn-block  shadow">Lihat kelas</a>
        </div>
      </div>
      <div class="line"></div>
      <section id=" datauser" class="bd-callout bd-callout-info container">
        <div class="tabhead">
          <div class="row">

            <div class="col">
              <form class="form-inline justify-content-end mb-2 cari" action="<?= base_url('admin/kelas'); ?>" method="post">
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
                <th scope="col">Kode kelas</th>
                <th scope="col">Tingkat</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Ruang kelas</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($kelas as $k): ?>
              <tr>
                <th><?= $k->kodekelas; ?></th>
                <td><?= $k->tingkat; ?></td>
                <td><?= $k->jurusan; ?></td>
                <td><?= $k->ruangkelas; ?></td>
                <td>
                  <button class="badge btn-warning" onclick="window.location.href='<?= base_url('admin/kelas/update/') . $k->kodekelas ; ?>'">Update</button>
                  <button class="badge btn-danger" onclick="if(confirm('anda yakin ingin menghapus kelas <?= $k->jurusan ?> ?'))window.location.href='<?= base_url('admin/kelas/delete/') . $k->kodekelas ; ?>' ">Delete</button>
                </td>
              </tr>
              <?php endforeach; ?>
              <tr>
            </tbody>
          </table>
        </div>
      </section>  