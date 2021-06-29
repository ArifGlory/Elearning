<?= $this->session->flashdata('message'); ?><!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900">Update Jadwal Vicon</h1>
                                </div>

                                <form class="user" method="post">
                                    <div class="form-group">
                                      <input type="text" class="form-control form-control-user" id="room_meeting" name="room_meeting" placeholder="Room Meeting" value="<?= $values['room_meeting']?>">
                                        <?= form_error('room_meeting', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <input type="text" class="form-control form-control-user" id="url_vicon" name="url_vicon" placeholder="Room Meeting" value="<?= $values['url_vicon']?>">
                                        <?= form_error('url_vicon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <input type="text" class="form-control form-control-user" id="password_vicon" name="password_vicon" placeholder="Password Vicon" value="<?= $values['password_vicon']?>">
                                        <?= form_error('password_vicon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <input type="text" class="form-control form-control-user" id="host_vicon" name="host_vicon" placeholder="Host" value="<?= $values['host_vicon']?>">
                                        <?= form_error('host_vicon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                      <input type="date" class="form-control form-control-user" id="tanggal_kelas_vicon" name="tanggal_kelas_vicon" placeholder="Tanggal Kelas" value="<?= date('Y-m-d', strtotime($values['tanggal_kelas_vicon']))?>">
                                        <?= form_error('tanggal_kelas_vicon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">  
                                    <label>Kelas</label>                                      
                                        <select class="form-control" id="id_kelas" name="id_kelas">
                                            <?php foreach($dd_kelas as $kel):?>
                                                <option value="<?= $kel['id_kelas']?>" <?php if($kel['id_kelas'] == $values['id_kelas']){ echo "selected";}?>><?= $kel['kelas']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <input type="time" class="form-control form-control-user" id="waktu_vicon" name="waktu_vicon" step="2" placeholder="Waktu Vicon" value="<?= $values['waktu_vicon']?>">
                                        <?= form_error('waktu_vicon', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    
                                    <button name="update_jadwal_vicon" type="submit" class="btn btn-primary btn-user btn-block">
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->