<div class="row">
        <div class="col">
          <a href="<?= base_url('admin/siswa/input'); ?>" class="btn btn-success btn-lg btn-block  shadow">Input siswa</a>
        </div>
        <div class="col">
          <a href="<?= base_url('admin/siswa'); ?>" class="btn btn-info btn-lg btn-block  shadow">Lihat siswa</a>
        </div>
      </div>
      <div class="line"></div>

      <section id=" datauser" class="bd-callout bd-callout-info container">
        <div class="tabhead">
          <div class="row">
            <div class="col">
              <form class="form-inline justify-content-end mb-2 cari" method="post" action="<?= base_url('admin/siswa'); ?>">
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
                <th>No</th>
                <th>Nama</th>
                <th>Nisn</th>
                <th>Kelas</th>
                <th>Agama</th>
                <th>Tempat tanggal lahir</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach ($siswa as $s): ?>
              <tr>
                <th><?= $no++; ?></th>
                <td><?= $s->nama; ?></td>
                <td><?= $s->nisn; ?></td>
                <td><?= $s->tingkat ?> <?= $s->jurusan ?> <?= $s->ruangkelas ?></td>
                <td><?= $s->agama; ?></td>
                <td><?= $s->ttl; ?></td>
                <td><button class="badge btn-primary" onclick="window.location.href='<?= base_url('admin/siswa/detail/') . $s->idsiswa ; ?>'">Detail</button>
                    <button class="badge btn-warning" onclick="window.location.href='<?= base_url('admin/siswa/update/') . $s->idsiswa ; ?>'">Update</button>
                    <button class="badge btn-danger" onclick="if(confirm('anda yakin ingin menghapus <?= $s->nama ?> ?'))window.location.href='<?= base_url('admin/siswa/delete/') . $s->idsiswa ; ?>' ">Delete</button></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>
