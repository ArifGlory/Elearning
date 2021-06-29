<?= $this->session->flashdata('message'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- <?= var_dump($siswa[0])?> -->
    <!-- content here -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?= $title?></h6>
      </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                      <th>Nama Kelas</th>
                      <th>NISN</th>
                      <th>Nama Siswa</th>
                      <th>Jenis Kelamin</th>
                      <th>TTL</th>
                      <th>Foto Profil</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($siswa as $sis):?>
                      <tr>
                          <td><?= $sis['kelas']?></td>
                          <td><?= $sis['nisn']?></td>
                          <td><?= $sis['name']?></td>
                          <td><?= $sis['jenis_kelamin']?></td>
                          <td><?= $sis['tempat_lahir'].', '.$sis['tanggal_lahir']?></td>
                          <td style="width: 18%">
                            <img style="width: 35px" src="<?= base_url('assets/img/profile/').$sis['image']?>">
                          </td>
                      </tr>
                <?php endforeach;?>
                </tbody>
            </table>
          </div>
        </div>
    </div>
<!-- <?=var_dump($rata_rata)?> -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
