 <div class="row">
    <div class="col-lg-3 ml-3 mt-3">
        <img src="<?= base_url('asset/img/siswa/') . $siswa->foto ?> " alt="" class="profil img-thumbnail shadow">
    </div>

    <div class="col-lg-8 mt-3">
        <ul class="list-group list-group-flush shadow">
            <li class="list-group-item text-uppercase font-weight-bold"><?= $this->session->userdata('nama'); ?></li>
            <li class="list-group-item"><?= $this->session->userdata('username'); ?></li>
            <li class="list-group-item"><?= $siswa->tingkat ?> - <?= $siswa->ruangkelas ?></li>
            <li class="list-group-item"><?= $siswa->agama ?></li>
            <li class="list-group-item"><?= $siswa->jurusan ?></li>
            <li class="list-group-item"><?= $siswa->alamat ?></li>
            <li class="list-group-item"><?= $siswa->jeniskelamin ?></li>
            <li class="list-group-item"><?= $siswa->ttl ?></li>
            <li class="list-group-item"><?= $siswa->tahunajaran ?></li>
        </ul>
    </div>
</div>