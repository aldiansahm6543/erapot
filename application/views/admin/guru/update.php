
      <div class="line"></div>
      <section id=" datauser" class="bd-callout bd-callout-info container
      ">
        <form action="<?= base_url('admin/guru/update/') . $guru->idguru; ?>" method="post" enctype="multipart/form-data">

          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="hidden" name="idguru" value="<?= $guru->idguru; ?>">
                <input type="nama" class="form-control" id="nama" value="<?= $guru->nama; ?>" placeholder="Nama Lengkap" name="nama">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
                <input type="hidden" class="form-control" id="nip" value="<?= $guru->nip; ?>" placeholder="NIP" name="nip">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="jeniskelamin">Jenis Kelamin</label>
                <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                  <?php foreach( $jeniskelamin as $j ) : ?>
                      <?php if( $j == $guru->jeniskelamin ) : ?>
                          <option value="<?= $j; ?>" selected><?= $j; ?></option>
                      <?php else : ?>
                          <option value="<?= $j; ?>"><?= $j; ?></option>
                      <?php endif; ?>
                  <?php endforeach; ?>
                </select>
                <?= form_error('jeniskelamin', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="kodemapel">Mata pelajaran</label>
                <select class="form-control" id="kodemapel" name="kodemapel">
                  <?php foreach( $mapel as $m ) : ?>
                      <?php if( $m->kodemapel == $guru->kodemapel ) : ?>
                          <option value="<?= $m->kodemapel; ?>" selected><?= $m->namamapel; ?></option>
                      <?php else : ?>
                          <option value="<?= $m->kodemapel; ?>"><?= $m->namamapel; ?></option>
                      <?php endif; ?>
                  <?php endforeach; ?>
                </select>
                <?= form_error('kodemapel', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="agama">agama</label>
                <input type="agama" class="form-control" id="agama" value="<?= $guru->agama; ?>" placeholder="agama" name="agama">
                <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="tempatlahir">Tempat Tanggal Lahir</label>
                <input type="tempatlahir" class="form-control" value="<?= $guru->ttl; ?>" id="tempatlahir" placeholder="tempatlahir" name="ttl">
                <?= form_error('ttl', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Alamat</label>
                <textarea class="form-control" id="exampleFormControlTextarea1"  rows="3" name="alamat"><?= $guru->alamat; ?></textarea>
                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
              	<label for="exampleFormControlTextarea1">Foto</label>
                <img src="<?= base_url('asset/img/guru/') . $guru->foto; ?>" width="100rm">
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto">
                <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>

          <input type="submit" name="submit" class="btn btn-primary " value="simpan">

        </form>
      </section>