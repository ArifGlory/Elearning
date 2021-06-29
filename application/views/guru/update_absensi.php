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
                                    <h1 class="h4 text-gray-900">Update Absensi</h1>
                                </div>

                                <form class="user" method="post">
                                    <div class="form-group">  
                                    <label>Kelas</label>                                      
                                        <select class="form-control" id="id_kelas" name="id_kelas">
                                            <?php foreach($dd_kelas as $kel):?>
                                                <option value="<?= $kel['id_kelas']?>" <?php if($kel['id_kelas']==$values['id_kelas']){echo "selected";}?>><?= $kel['kelas']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">  
                                    <label>Mata Pelajaran</label>                                      
                                        <select class="form-control" id="id_mapel" name="id_mapel">
                                            <?php foreach($dd_mapel as $map):?>
                                                <option value="<?= $map['id_mapel']?>" <?php if($map['id_mapel']==$values['id_mapel']){echo "selected";}?>><?= $map['mapel']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">                                        
                                        <select class="form-control" id="id_siswa" name="id_siswa">
                                            <?php foreach($users as $use):?>
                                                <option value="<?= $use['id']?>" <?php if($use['id']==$values['id_siswa']){echo "selected";}?>><?=$use['name']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <input type="number" class="form-control form-control-user" id="pertemuan_ke" name="pertemuan_ke" placeholder="Pertemuan Ke" value="<?= $values['pertemuan_ke']?>">
                                        <?= form_error('pertemuan_ke', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">                                        
                                        <select class="form-control" id="id_status" name="id_status">
                                          <?php if($values['id_status']==0){?>
                                                <option value="0" selected>Tidak Hadir</option>
                                                <option value="1">Hadir</option>
                                                <option value="2">Izin</option>
                                          <?php }elseif($values['id_status']==1){?>
                                                <option value="0">Tidak Hadir</option>
                                                <option value="1" selected>Hadir</option>
                                                <option value="2">Izin</option>
                                          <?php }else{?>
                                                <option value="0">Tidak Hadir</option>
                                                <option value="1">Hadir</option>
                                                <option value="2" selected>Izin</option>
                                          <?php }?>
                                        </select>
                                        <?= form_error('id_status', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <textarea id="keterangan_absensi" name="keterangan_absensi" class="form-control" placeholder="Keterangan"><?= $values['keterangan_absensi']?></textarea>
                                    </div>
                                    
                                    <button name="update_absensi" type="submit" class="btn btn-primary btn-user btn-block">
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