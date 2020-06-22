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
        <form action="<?= base_url('admin/mapel/input'); ?>" method="post">
          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                <label for="namamapel">Nama mapel</label>
                <input type="namamapel" class="form-control" id="namamapel" value="<?= set_value('namamapel'); ?>" name="namamapel" placeholder="Mata pelajaran">
                <?= form_error('namamapel', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                <label for="namamapel">Kelompok</label>
                 <select class="form-control" id="kelompok" name="kelompok">
                  <option disabled selected>- Pilih kelompok -</option>
                  <option value="Muatan nasional">Muatan nasional</option>
                  <option value="Kejuruan">Kejuruan</option>
                  <option value="Muatan lokal">Muatan lokal</option>
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