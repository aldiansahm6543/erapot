
      <section id=" datauser" class="bd-callout bd-callout-info container">
        <div class="tabhead">
          <div class="row">

            <div class="col">
              <form class="form-inline justify-content-end mb-2 cari" action="<?= base_url('admin/user'); ?>" method="post">
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
                <th scope="col">Nip / Nisn</th>
                <th scope="col">Level</th>
                <th scope="col">Buat Akun</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($user as $u): ?>
              <?php if ($u->level != 'admin'): ?>
              <tr>
                <th><?= $no++; ?></th>
                <td><?= $u->nama; ?></td>
                <td><?= $u->username; ?></td>
                <td><?= $u->level; ?></td>
                <td>
                  <?php if ($u->__active == '1'): ?>
                    <button type="button" class="badge badge-default" disabled>Created</button>
                    <a href="<?= base_url('admin/user/delete/') . $u->iduser ?>" class="badge badge-danger p-1">Nonaktif</a>
                  <?php else: ?>
                    <a href="<?= base_url('admin/user/create/') . $u->iduser ?>" class="badge badge-success p-1">Create</a>
                    <button type="button" class="badge badge-default" disabled>Nonaktif</button>
                  <?php endif; ?>
                  
                </td>
              </tr>
              <?php endif ?>
              <?php endforeach; ?>
              <tr>
            </tbody>
          </table>
        </div>
      </section>  