<?= $this->session->flashdata('message'); ?><!-- Begin Page Content -->
<div class="container-fluid">
  <p>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      Tambah
    </button>
  </p>

  <!-- Outer Row -->
    <div class="row justify-content-center collapse" id="collapseExample">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900">Tambah Jadwal Vicon</h1>
                                </div>

                                <form class="user" method="post">
                                    <div class="form-group">
                                      <input type="text" class="form-control form-control-user" id="room_meeting" name="room_meeting" placeholder="Room Meeting">
                                        <?= form_error('room_meeting', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <input type="url" class="form-control form-control-user" id="url_vicon" name="url_vicon" placeholder="Url">
                                        <?= form_error('url_vicon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <input type="text" class="form-control form-control-user" id="password_vicon" name="password_vicon" placeholder="Password Vicon">
                                        <?= form_error('password_vicon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <input type="text" class="form-control form-control-user" id="host_vicon" name="host_vicon" placeholder="Host">
                                        <?= form_error('host_vicon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                      <input type="date" class="form-control form-control-user" id="tanggal_kelas_vicon" name="tanggal_kelas_vicon" placeholder="Tanggal Kelas">
                                        <?= form_error('tanggal_kelas_vicon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">  
                                    <label>Kelas</label>                                      
                                        <select class="form-control" id="id_kelas" name="id_kelas">
                                            <?php foreach($dd_kelas as $kel):?>
                                                <option value="<?= $kel['id_kelas']?>"><?= $kel['kelas']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Waktu</label>
                                        <br>
                                        <small> Format Waktu Jam-Menit-detik </small>
                                      <input type="time" class="form-control form-control-user" id="waktu_vicon" name="waktu_vicon" step="2" placeholder="Waktu Vicon">
                                        <?= form_error('waktu_vicon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    
                                    <button name="submit_jadwal_vicon" type="submit" class="btn btn-primary btn-user btn-block">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

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
                      <th>url</th>
                      <th>Password</th>
                      <th>Host</th>
                      <th>Tanggal Kelas</th>
                      <th>Nama Kelas</th>
                      <th>Waktu</th>
                      <th>Aksi</th>
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
                          <td style="width: 18%">
                            <a href="<?= site_url('guru_report/update_jadwal_vicon/'.$val['id_jadwal_vicon'])?>" class="btn btn-small"><i class="fas fa-edit"></i></a>
                            <!-- <a href="<?= site_url('guru_report/delete_jadwal_vicon/'.$val['id_jadwal_vicon'])?>" class="btn btn-small"><i class="fas fa-trash"></i></a> -->
                            <a href="<?php echo site_url('guru_report/delete_jadwal_vicon/'.$val['id_jadwal_vicon']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ini?');" class="btn btn-small" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
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