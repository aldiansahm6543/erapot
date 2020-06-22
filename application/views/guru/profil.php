 <div class="row">
    <div class="col-lg-3 ml-3 mt-3">
        <img src="<?= base_url('asset/img/guru/') . $guru->foto ?> " alt="" class="profil img-thumbnail shadow">
    </div>

    <div class="col-lg-8 mt-3">
        <ul class="list-group list-group-flush shadow">
            <li class="list-group-item text-uppercase font-weight-bold"><?= $this->session->userdata('nama'); ?></li>
            <li class="list-group-item"><?= $this->session->userdata('username'); ?></li>
            <li class="list-group-item"><?= $guru->namamapel ?></li>
            <li class="list-group-item"><?= $guru->agama ?></li>
            <li class="list-group-item"><?= $guru->alamat ?></li>
            <li class="list-group-item"><?= $guru->jeniskelamin ?></li>
            <li class="list-group-item"><?= $guru->ttl ?></li>
        </ul>
    </div>
</div>