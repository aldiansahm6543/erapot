      <div class="row">
        <div class="col">
          <a href="<?= base_url('admin/guru/input'); ?>" class="btn btn-success btn-lg btn-block  shadow">Input Guru</a>
        </div>
        <div class="col">
          <a href="<?= base_url('admin/guru'); ?>" class="btn btn-info btn-lg btn-block  shadow">Lihat Guru</a>
        </div>
      </div>
      <div class="line"></div>

      <section id=" datauser" class="bd-callout bd-callout-info container">
        <div class="tabhead">
          <div class="row">
            <div class="col">
              <form class="form-inline justify-content-end mb-2 cari" method="post" action="<?= base_url('admin/guru'); ?>">
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
                <th>Nip</th>
                <th>Mapel</th>
                <th>Agama</th>
                <th>Tempat tanggal lahir</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach ($guru as $g): ?>
              <tr>
                <th><?= $no++; ?></th>
                <td><?= $g->nama; ?></td>
                <td><?= $g->nip; ?></td>
                <td><?= $g->kodemapel; ?></td>
                <td><?= $g->agama; ?></td>
                <td><?= $g->ttl; ?></td>
                <td><button class="badge btn-primary" onclick="window.location.href='<?= base_url('admin/guru/detail/') . $g->idguru ; ?>'">Detail</button>
                    <button class="badge btn-warning" onclick="window.location.href='<?= base_url('admin/guru/update/') . $g->idguru ; ?>'">Update</button>
                    <button class="badge btn-danger" onclick="if(confirm('anda yakin ingin menghapus <?= $g->nama ?> ?'))window.location.href='<?= base_url('admin/guru/delete/') . $g->idguru ; ?>' ">Delete</button></td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>
