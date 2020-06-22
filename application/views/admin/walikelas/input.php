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
        <form action="<?= base_url('admin/walikelas/input'); ?>" method="post">
          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                <label for="idguru">Guru</label>
                 <select class="form-control" id="idguru" name="idguru">
                  <option disabled selected>- Pilih guru -</option>
                  <?php foreach ($guru as $g ): ?>
                    <option value="<?= $g->idguru ?>"><?= $g->nama ?></option>
                  <?php endforeach ?>
                </select>
                <?= form_error('idguru', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                <label for="kodekelas">Kelas</label>
                 <select class="form-control" id="kodekelas" name="kodekelas">
                  <option disabled selected>- Pilih Kelas -</option>
                  <?php foreach ($kelas as $k ): ?>
                    <option value="<?= $k->kodekelas ?>"><?= $k->tingkat ?> <?= $k->jurusan ?> <?= $k->ruangkelas ?></option>
                  <?php endforeach ?>
                </select>
                <?= form_error('kodekelas', '<small class="text-danger pl-3">', '</small>'); ?>
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