 <div class="line"></div>
      <section id=" datauser" class="bd-callout bd-callout-info container">
        <form action="<?= base_url('admin/kelas/update/') . $kelas->kodekelas; ?>" method="post">
          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                <label for="kodekelas">Kode kelas</label>
                <input type="text" class="form-control" id="kodekelas" value="<?= $kelas->kodekelas; ?>" name="kodekelas" readonly>
                <?= form_error('kodekelas', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                <label for="tingkat">Tingkat kelas</label>
                <input type="number" class="form-control" id="tingkat" value="<?= $kelas->tingkat; ?>" name="tingkat" placeholder="Tingkat kelas">
                <?= form_error('tingkat', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" value="<?= $kelas->jurusan; ?>" name="jurusan" placeholder="Jurusan">
                <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                <label for="Ruang kelas">Ruang kelas</label>
                <input type="number" class="form-control" id="ruangkelas" value="<?= $kelas->ruangkelas; ?>" name="ruangkelas" placeholder="Ruang kelas">
                <?= form_error('ruangkelas', '<small class="text-danger pl-3">', '</small>'); ?>
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