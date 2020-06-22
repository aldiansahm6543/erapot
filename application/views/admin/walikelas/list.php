
<div class="row">
        <div class="col">
          <a href="<?= base_url('admin/walikelas/input'); ?>" class="btn btn-success btn-lg btn-block  shadow">Input walikelas</a>
        </div>
        <div class="col">
          <a href="<?= base_url('admin/walikelas'); ?>" class="btn btn-info btn-lg btn-block  shadow">Lihat walikelas</a>
        </div>
      </div>
      <div class="line"></div>
      <section id=" datauser" class="bd-callout bd-callout-info container">
        <div class="tabhead">
          <div class="row">

            <div class="col">
              <form class="form-inline justify-content-end mb-2 cari" action="<?= base_url('admin/walikelas'); ?>" method="post">
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
                <th scope="col">Nama guru</th>
                <th scope="col">Kelas</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($walas as $w): ?>
              <tr>
                <th><?= $no++; ?></th>
                <td><?= $w->nama; ?></td>
                <td><?= $w->tingkat ?> <?= $w->jurusan ?> <?= $w->ruangkelas ?></td>
                <td>
                  <button class="badge btn-warning" onclick="window.location.href='<?= base_url('admin/walikelas/update/') . $w->idwalikelas ; ?>'">Update</button>
                  <button class="badge btn-danger" onclick="if(confirm('anda yakin ingin menghapus walikelas <?= $w->jurusan ?> ?'))window.location.href='<?= base_url('admin/walikelas/delete/') . $w->idwalikelas ; ?>' ">Delete</button>
                </td>
              </tr>
              <?php endforeach; ?>
              <tr>
            </tbody>
          </table>
        </div>
      </section>  