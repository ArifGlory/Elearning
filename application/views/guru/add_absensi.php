<?= $this->session->flashdata('message'); ?>
<div class="container-fluid">
    <a href="<?= site_url('guru_report/kelola_absensi/')?>" class="btn btn-secondary btn-icon-split">
      <span class="icon text-white-50">
        <i class="fas fa-arrow-left"></i>
      </span>
      <span class="text">Back</span>
    </a>

    <!-- content here -->
    <div class="card shadow mb-4 mt-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?= "Daftar Siswa"?></h6>
      </div>
      <?php
      $hari_absensi = $this->uri->segment(3);
      $tanggal_absensi = $this->uri->segment(4);
      $id_mapel = $this->uri->segment(5);
      $id_kelas = $this->uri->segment(6);
      $pertemuan_ke = $this->uri->segment(7);
      ?>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                      <th>NISN</th>
                      <th>Nama Murid</th>
                      <th>Kelas</th>
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($users as $use):?>
                      <tr>
                          <td><?= $use['nisn']?></td>
                          <td><?= $use['name']?></td>
                          <td><?= $use['kelas']?></td>
                          <td style="width: 18%">
                            <?php if(isset($use['waiki'])){?>
                              <a href="#" class="btn btn-disabled btn-icon-split">
                              <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                              </span>
                              <span class="text">Added</span>
                            </a>
                            <?php }else{?>
                            <a href="<?= site_url('guru_report/add_siswa/'.$hari_absensi.'/'.$tanggal_absensi.'/'.$id_mapel.'/'.$use['id'].'/'.$id_kelas.'/'.$pertemuan_ke.'/')?>" class="btn btn-success btn-icon-split">
                              <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                              </span>
                              <span class="text">Add</span>
                            </a>
                          <?php }?>
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

<?= var_dump($users)?>