
      <div class="line"></div>
        <div class="alert alert-info  " role="alert">
          <?= $siswa->nama; ?>
        </div>
      <section id=" datauser" class="bd-callout bd-callout-info container"> 


        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead>
              <tr class="thead">
                <th scope="col">No</th>
                <th scope="col">Mata pelajaran</th>
                <th scope="col">Semester</th>
                <th scope="col">Tugas</th>
                <th scope="col">Uts</th>
                <th scope="col">Uas</th>
                <th scope="col">Rata-rata</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($nilai as $u): ?>
              <tr>
                <th><?= $no++; ?></th>
                <td><?= $u->namamapel; ?></td>
                <td><?= $u->semester ?></td>
                <td><?= $u->tugas; ?></td>
                <td><?= $u->uts; ?></td>
                <td><?= $u->uas; ?></td>
                <td><?= $u->rata; ?></td>
              <tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <button class="btn btn-primary" onclick="if(confirm('kamu yakin ingin upload nilai <?= $siswa->nama ?> ?'))window.location.href='<?= base_url('walikelas/nilai/send/') . $siswa->idsiswa ; ?>' ">Upload</button></td>
        </div>
      </section>