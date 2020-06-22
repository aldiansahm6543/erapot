 <div class="line"></div>
      <section id=" datauser" class="bd-callout bd-callout-info container">
        <form action="<?= base_url('admin/user/create/') . $user->iduser ; ?>" method="post">
          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                  <label for="nama">Nama</label>
                <input type="nama" class="form-control" id="nama" value="<?= $user->nama; ?>" name="nama" readonly>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                <?php if ($user->level == 'walimurid'): ?>
                  <label for="username">NISN</label>
                <?php else: ?> 
                  <label for="username">NIP</label>
                <?php endif; ?>
                <input type="username" class="form-control" id="username" value="<?= $user->username; ?>" name="username" readonly>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                  <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password1" placeholder="Buat password..">
                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg">
              <div class="form-group">
                  <label for="password">Repeat Password</label>
                <input type="password" class="form-control" id="password" name="password2" placeholder="Buat password..">
                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
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