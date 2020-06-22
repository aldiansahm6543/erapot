 <div class="line"></div>
      <section id=" datauser" class="bd-callout bd-callout-info container">
        <form action="<?= base_url('admin/walikelas/update/') . $walas->idwalikelas ?>" method="post">
          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                <label for="idguru">Guru</label>
                  <?php foreach( $guru as $g ) : ?>
                      <?php if( $walas->idguru == $g->idguru ) : ?>
                          <input type="text" class="form-control" name="idguru" value="<?= $g->nama; ?>" readonly>
                      <?php endif; ?>
                  <?php endforeach; ?>
                <?= form_error('idguru', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                <label for="kodekelas">Kelas</label>
                 <select class="form-control" id="kodekelas" name="kodekelas">
                  <?php foreach( $kelas as $k ) : ?>
                      <?php if( $walas->kodekelas == $k->kodekelas ) : ?>
                          <option value="<?= $k->kodekelas; ?>" selected><?= $k->tingkat ?> <?= $k->jurusan ?> <?= $k->ruangkelas ?></option>
                      <?php else : ?>
                          <option value="<?= $k->kodekelas; ?>"><?= $k->tingkat ?> <?= $k->jurusan ?> <?= $k->ruangkelas ?></option>
                      <?php endif; ?>
                  <?php endforeach; ?>
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