<div class="row">
        <div class="col">
          <a href="<?= base_url('admin/siswa/input'); ?>" class="btn btn-success btn-lg btn-block  shadow">Input siswa</a>
        </div>
        <div class="col">
          <a href="<?= base_url('admin/siswa'); ?>" class="btn btn-info btn-lg btn-block  shadow">Lihat siswa</a>
        </div>
      </div>
      <div class="line"></div>
      <section id=" datauser" class="bd-callout bd-callout-info container
      ">
        <form action="<?= base_url('admin/siswa/input'); ?>" method="post" enctype="multipart/form-data">

          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="nama" class="form-control" id="nama" value="<?= set_value('nama'); ?>" placeholder="Nama Lengkap" name="nama">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="nisn">Nisn</label>
                <input type="nisn" class="form-control" id="nisn" value="<?= set_value('nisn'); ?>" placeholder="nisn" name="nisn">
                <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label for="tahunajaran">Tahun ajaran</label>
                <select class="form-control" id="tahunajaran" name="tahunajaran">
                  <option disabled selected>- Pilih tahun -</option>
                  <?php for($i=2019;$i<=2100;$i++){$a = $i+1; echo "<option>$i-$a</option>";}?>
                </select>
                <?= form_error('tahunajaran', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="jeniskelamin">Jenis Kelamin</label>
                <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                  <option disabled selected>- Pilih jeniskelamin -</option>
                  <option value="laki-laki">Laki-Laki</option>
                  <option value="perempuan">Perempuan</option>
                </select>
                <?= form_error('jeniskelamin', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="kodekelas">Kelas</label>
                <select class="form-control" id="kodekelas" name="kodekelas">
                	<option disabled selected>- Pilih kelas -</option>
                  <?php foreach($kelas as $k) : ?>
                	<option value="<?=$k->kodekelas;?>"><?= $k->tingkat ?> <?= $k->jurusan ?> <?= $k->ruangkelas ?></option>
           		 <?php endforeach;?>
                </select>
                <?= form_error('kodekelas', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label for="agama">agama</label>
                <input type="agama" class="form-control" id="agama" value="<?= set_value('agama'); ?>" placeholder="agama" name="agama">
                <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="tempatlahir">tempatlahir</label>
                <input type="tempatlahir" class="form-control" value="<?= set_value('ttl1'); ?>" id="tempatlahir" placeholder="tempatlahir" name="ttl1">
                <?= form_error('ttl1', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="tanggal">tanggal lahir</label>
                <input type="date" class="form-control" id="tanggal" value="<?= set_value('ttl2'); ?>" placeholder="tanggal" name="ttl2">
                <?= form_error('ttl2', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Alamat</label>
                <textarea class="form-control" id="exampleFormControlTextarea1"  rows="3" name="alamat"><?= set_value('alamat'); ?></textarea>
                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
              	<label for="exampleFormControlTextarea1">Foto</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto">
                <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary ">Submit</button>

        </form>
      </section>