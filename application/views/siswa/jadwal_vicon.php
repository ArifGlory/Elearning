<?= $this->session->flashdata('message'); ?><!-- Begin Page Content -->
<div class="container-fluid">

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
                      <th>Room Meeting</th>
                      <th>Url</th>
                      <th>Password</th>
                      <th>Host</th>
                      <th>Tanggal Kelas</th>
                      <th>Nama Kelas</th>
                      <th>Waktu</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($values as $val):?>
                      <tr>
                          <td><?= $val['room_meeting']?></td>
                          <td><a href="<?= $val['url_vicon']?>" target="_blank"><?= $val['url_vicon']?></a> </td>
                          <td><?= $val['password_vicon']?></td>
                          <td><?= $val['host_vicon']?></td>
                          <td><?= $val['tanggal_kelas_vicon']?></td>
                          <td><?= $val['kelas']?></td>
                          <td><?= $val['waktu_vicon']?></td>
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