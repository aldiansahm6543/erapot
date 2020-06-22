 <div class="line"></div>
      <section id=" datauser" class="bd-callout bd-callout-info container">
        <form action="<?= base_url('admin/mapel/update/') . $mapel->kodemapel; ?>" method="post">
          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                <label for="kodemapel">Kode mapel</label>
                <input type="kodemapel" class="form-control" id="kodemapel" value="<?= $mapel->kodemapel; ?>" name="kodemapel" placeholder="Kode matapelajaran">
                <?= form_error('kodemapel', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                <label for="namamapel">Nama mapel</label>
                <input type="namamapel" class="form-control" id="namamapel" name="namamapel" value="<?= $mapel->namamapel; ?>" placeholder="Mata pelajaran">
                <?= form_error('namamapel', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                <label for="kelompok">Jenis Kelamin</label>
                <select class="form-control" id="kelompok" name="kelompok">
                  <?php foreach( $kelompok as $k ) : ?>
                      <?php if( $k == $mapel->kelompok ) : ?>
                          <option value="<?= $k; ?>" selected><?= $k; ?></option>
                      <?php else : ?>
                          <option value="<?= $k; ?>"><?= $k; ?></option>
                      <?php endif; ?>
                  <?php endforeach; ?>
                </select>
                <?= form_error('kelompok', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <button type="submit" class="btn btn-primary ">Submit</button>
            </div>
          </div>
        </form>
      </section>