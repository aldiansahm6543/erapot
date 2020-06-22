<div class="row">
        <div class="col-4">
          <a href="<?= base_url('admin/siswa'); ?>" class="btn btn-info btn-lg btn-block  shadow">Kembali</a>
        </div>
      </div>
      <div class="line"></div>
      <section id=" datauser" class="bd-callout bd-callout-info container
      ">

          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="nama" class="form-control" id="nama" value="<?= $siswa->nama ?>" readonly  placeholder="Nama Lengkap" name="nama">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="nisn">Nisn</label>
                <input type="nisn" class="form-control" id="nisn" value="<?= $siswa->nisn ?>" readonly placeholder="nisn" name="nisn">

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label for="agama">tahunajaran</label>
                <input type="tahunajaran" class="form-control" id="tahunajaran" value="<?= $siswa->tahunajaran ?>" readonly placeholder="tahunajaran" name="tahunajaran">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="agama">jeniskelamin</label>
                <input type="jeniskelamin" class="form-control" id="jeniskelamin" value="<?= $siswa->jeniskelamin ?>" readonly placeholder="jeniskelamin" name="jeniskelamin">
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label for="agama">kodekelas</label>
                <input type="kodekelas" class="form-control" id="kodekelas" value="<?= $siswa->tingkat ?> <?= $siswa->jurusan ?> <?= $siswa->ruangkelas ?>" readonly placeholder="kodekelas" name="kodekelas">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="agama">agama</label>
                <input type="agama" class="form-control" id="agama" value="<?= $siswa->agama ?>" readonly placeholder="agama" name="agama">

              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="tempatlahir">tempatlahir</label>
                <input type="tempatlahir" class="form-control" value="<?= $siswa->ttl ?>" readonly id="tempatlahir" placeholder="tempatlahir" name="ttl1">

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Alamat</label>
                <textarea class="form-control" id="exampleFormControlTextarea1"  rows="3" name="alamat" readonly><?= $siswa->nama ?></textarea>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
              	<label for="exampleFormControlTextarea1">Foto</label>
                <img src="<?= base_url('asset/img/siswa/') . $siswa->foto; ?>" width="100rm">
              </div>
            </div>
          </div>
      </section>