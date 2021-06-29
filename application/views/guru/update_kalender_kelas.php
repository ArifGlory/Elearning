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
                                    <h1 class="h4 text-gray-900">Update Kalender Kelas</h1>
                                </div>

                                <form class="user" method="post">
                                    <div class="form-group">
                                        <label>Hari</label>
                                        <input type="text" class="form-control form-control-user" id="hari_kalender_kelas" name="hari_kalender_kelas" placeholder="Hari" value="<?= $value['hari_kalender_kelas']?>">
                                        <?= form_error('hari_kalender_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control form-control-user" id="tanggal_kalender_kelas" name="tanggal_kalender_kelas" placeholder="Tanggal" value="<?= date('Y-m-d', strtotime($value['tanggal_kalender_kelas']))?>">
                                        <?= form_error('tanggal_kalender_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Jam</label>
                                        <input type="time" class="form-control form-control-user" id="jam_kalender_kelas" name="jam_kalender_kelas" placeholder="Tanggal" value="<?= $value['jam_kalender_kelas']?>">
                                        <?= form_error('jam_kalender_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">  
                                    <label>Kelas</label>                                      
                                        <select class="form-control" id="id_kelas" name="id_kelas">
                                            <?php foreach($dd_kelas as $kel):?>
                                                <option value="<?= $kel['id_kelas']?>" <?php if($kel['id_kelas']==$value['id_kelas']){ echo 'selected';}?>><?= $kel['kelas']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">  
                                    <label>Mata Pelajaran</label>                                      
                                        <select class="form-control" id="id_mapel" name="id_mapel">
                                            <?php foreach($dd_mapel as $map):?>
                                                <option value="<?= $map['id_mapel']?>" <?php if($map['id_mapel'] == $value['id_mapel']){ echo 'selected';}?>><?= $map['mapel']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea id="deskripsi_kalender_kelas" name="deskripsi_kalender_kelas" class="form-control" placeholder="Deskripsi"> <?= $value['deskripsi_kalender_kelas']?></textarea>
                                    </div>
                                    
                                    <button name="update_kalender_kelas" type="submit" class="btn btn-primary btn-user btn-block">
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