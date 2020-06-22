      <div class="row">
        <div class="col-4">
          <a href="<?= base_url('admin/guru'); ?>" class="btn btn-info btn-lg btn-block  shadow">Lihat Guru</a>
        </div>
      </div>
      <div class="line"></div>
      <section id=" datauser" class="bd-callout bd-callout-info container
      ">

          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="nama" class="form-control" id="nama" value="<?= $guru->nama ?>" readonly placeholder="Nama Lengkap" name="nama">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="nip">NIP</label>
                <input type="nip" class="form-control" id="nip" value="<?= $guru->nip ?>" readonly placeholder="NIP" name="nip">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="tempatlahir">jeniskelamin</label>
                <input type="jeniskelamin" class="form-control" value="<?= $guru->jeniskelamin ?>" readonly placeholder="jeniskelamin" name="ttl1">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="tempatlahir">namamapel</label>
                <input type="namamapel" class="form-control" value="<?= $guru->namamapel ?>" readonly placeholder="namamapel" name="ttl1">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="agama">agama</label>
                <input type="agama" class="form-control" id="agama" value="<?= $guru->agama ?>" readonly placeholder="agama" name="agama">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="tempatlahir">tempatlahir</label>
                <input type="tempatlahir" class="form-control" value="<?= $guru->ttl ?>" readonly placeholder="tempatlahir" name="ttl1">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Alamat</label>
                <textarea class="form-control" id="exampleFormControlTextarea1"  rows="3" name="alamat" readonly><?= $guru->nama ?></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
              	<label for="exampleFormControlTextarea1">Foto</label>
                <img src="<?= base_url('asset/img/guru/') . $guru->foto; ?>" width="100rm">
              </div>
            </div>
          </div>
      </section>