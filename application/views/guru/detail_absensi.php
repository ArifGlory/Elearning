<?= $this->session->flashdata('message'); ?>
<div class="container-fluid">

    <!-- content here -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?= "Daftar Hadir Murid"?></h6>
      </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                      <th>Hari / Tanggal</th>
                      <th>Waktu Absensi</th>
                      <th>NISN</th>
                      <th>Nama Murid</th>
                      <th>Status</th>
                      <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($values as $val):?>
                      <tr>
                          <td><?= $val['hari_absensi'].' / '.$val['tanggal_absensi']?></td>
                          <td>
                              <?php echo date( 'j F, Y | H:i:s', strtotime($val['waktu'])); ?>
                          </td>
                          <td><?= $val['nisn']?></td>
                          <td><?= $val['name']?></td>
                          <td><?php if($val['id_status']==1){ echo "Tidak Hadir";}elseif($val['id_status']==2){echo "Hadir";}elseif($val['id_status']==3){echo "Izin";}elseif($val['id_status']==0){echo " ";}?></td>
                          <td><?= $val['keterangan_isi_absensi']?></td>
                      </tr>
                <?php endforeach;?>
                </tbody>
            </table>
          </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<p style="margin-left: 25px">halaman ini list murid yg sudah mengisi absensi</p>

</div>