
      <div class="line"></div>
      <section id=" datauser" class="bd-callout bd-callout-info container
      ">
        <form action="<?= base_url('admin/siswa/update/') . $siswa->idsiswa; ?>" method="post" enctype="multipart/form-data">

          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="hidden" name="idsiswa" value="<?= $siswa->idsiswa; ?>">
                <input type="nama" class="form-control" id="nama" value="<?= $siswa->nama; ?>" placeholder="Nama Lengkap" name="nama">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
                <input type="hidden" class="form-control" id="nisn" value="<?= $siswa->nisn; ?>" placeholder="nisn" name="nisn">
            <div class="col-lg-4">
              <div class="form-group">
                <label for="tahunajaran">Tahun ajaran</label>
                <select class="form-control" id="tahunajaran" name="tahunajaran">
                  <option value="<?= $siswa->tahunajaran; ?>" selected><?= $siswa->tahunajaran; ?></option>
                  <?php for($i=2019;$i<=2100;$i++){$a = $i+1; echo "<option>$i-$a</option>";}?>
                </select>
                <?= form_error('tahunajaran', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="jeniskelamin">Jenis Kelamin</label>
                <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                  <?php foreach( $jeniskelamin as $j ) : ?>
                      <?php if( $j == $siswa->jeniskelamin ) : ?>
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
                <label for="kodekelas">Kelas</label>
                <select class="form-control" id="kodekelas" name="kodekelas">
                  <?php foreach( $kelas as $k ) : ?>
                      <?php if( $k->kodekelas == $siswa->kodekelas ) : ?>
                          <option value="<?= $k->kodekelas; ?>" selected><?= $k->tingkat ?> <?= $k->jurusan ?> <?= $k->ruangkelas ?></option>
                      <?php else : ?>
                          <option value="<?= $k->kodekelas; ?>"><?= $k->tingkat ?> <?= $k->jurusan ?> <?= $k->ruangkelas ?></option>
                      <?php endif; ?>
                  <?php endforeach; ?>
                </select>
                <?= form_error('kodekelas', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="agama">agama</label>
                <input type="agama" class="form-control" id="agama" value="<?= $siswa->agama; ?>" placeholder="agama" name="agama">
                <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="tempatlahir">Tempat Tanggal Lahir</label>
                <input type="tempatlahir" class="form-control" value="<?= $siswa->ttl; ?>" id="tempatlahir" placeholder="tempatlahir" name="ttl">
                <?= form_error('ttl', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Alamat</label>
                <textarea class="form-control" id="exampleFormControlTextarea1"  rows="3" name="alamat"><?= $siswa->alamat; ?></textarea>
                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
              	<label for="exampleFormControlTextarea1">Foto</label>
                <img src="<?= base_url('asset/img/siswa/') . $siswa->foto; ?>" width="100rm">
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto">
                <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>

          <input type="submit" name="submit" class="btn btn-primary " value="simpan">

        </form>
      </section>