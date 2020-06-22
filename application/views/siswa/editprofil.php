 <div class="row">
    <div class="col-lg-3 ml-3 mt-3">
        <img src="<?= base_url('asset/img/siswa/') . $siswa->foto ?> " alt="" class="profil img-thumbnail mb-4 shadow">
</div>



    <div class="col-lg-8 mt-3 bd-callout bd-callout-info">
        <div class="row">
    <div class="col-lg border-right">
    <form method="post" action="<?= base_url('siswa/profil/ubah') ?>">
        <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="nama" class="form-control" id="nama" value="<?= $this->session->userdata('nama'); ?>" placeholder="Nama Lengkap" name="nama">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
              <div class="form-group">
                <?php if (!$siswa->email): ?>
                <label for="email" class="text-danger">*Tambahkan Alamat Email</label>
                <input type="email" class="form-control" id="email" value="<?= set_value('email'); ?>" placeholder="email" name="email">
                <?php else: ?>
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" value="<?= $siswa->email; ?>" placeholder="email" name="email">
                <?php endif ?>
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>  
              </div>
            </div>
        </div>
    <input type="submit" class="btn btn-primary" value="Ubah">
    </form>
    </div>

    <div class="col-lg ">
    <form method="post" action="<?= base_url('siswa/profil/password') ?>">
        <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="password">password</label>
                <input type="text" class="form-control" id="password" placeholder="password" name="password1">
                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="password">Repeat password</label>
                <input type="text" class="form-control" id="password" placeholder="repeat password" name="password2">
                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Change password">
    </form>
    </div>

</div>

    
    </div>
</div>