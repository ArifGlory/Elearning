<?= $this->session->flashdata('message'); ?><div class="container-fluid">

  <?php 
  $id_saya = $this->session->userdata('id');
  // echo $id_saya;
  ?>

    <!-- content here -->
    <div class="card shadow mb-4 mt-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?= "Absensi Saya"?></h6>
      </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                      <th>Hari / Tanggal</th>
                      <th>Nama Kelas</th>
                      <th>Nama Mapel</th>
                      <th>Pertemuan</th>
                      <th>Waktu mulai</th>
                      <th>Waktu selesai</th>
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($values as $val):?>
                      <tr>
                          <td><?= $val['hari_absensi'].' / '.$val['tanggal_absensi']?></td>
                          <td><?= $val['kelas']?></td>
                          <td><?= $val['mapel']?></td>
                          <td><?= $val['pertemuan_ke']?></td>
                          <td><?= $val['mulai']?></td>
                          <td><?= $val['selesai']?></td>
                          <td style="width: 18%">
                            <a href="<?= site_url('siswa/lihat_absensi/'.$val['id_absensi'])?>" class="btn btn-small"><i class="fas fa-eye"></i></a>
                          </td>
                      </tr>
                <?php endforeach;?>
                </tbody>
            </table>
          </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->