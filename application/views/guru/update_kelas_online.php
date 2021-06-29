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
                                    <h1 class="h4 text-gray-900">Tambah Kelas Online</h1>
                                </div>

                                <form class="user" method="post">
                                    <div class="form-group">  
                                    <label>Kelas</label>                                      
                                        <select class="form-control" id="id_kelas" name="id_kelas">
                                            <?php foreach($dd_kelas as $kel):?>
                                                <option value="<?= $kel['id_kelas']?>" <?php if($kel['id_kelas']== $var['id_kelas']){ echo 'selected';}?>><?= $kel['kelas']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">  
                                    <label>Mata Pelajaran</label>                                      
                                        <select class="form-control" id="id_mapel" name="id_mapel">
                                            <?php foreach($dd_mapel as $map):?>
                                                <option value="<?= $map['id_mapel']?>" <?php if($map['id_mapel']== $var['id_mapel']){ echo 'selected';}?>><?= $map['mapel']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group"> 
                                    <label>Tahun / Semester</label>                                       
                                        <select class="form-control" id="id_tahun" name="id_tahun">
                                            <?php foreach($dd_tahun as $tah):?>
                                                <option value="<?= $tah['id_tahun']?>" <?php if($tah['id_tahun']==$var['id_tahun']){echo 'selected';}?>><?=$tah['tahun']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_tahun', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea id="deskripsi" name="deskripsi" class="form-control"><?= $var['deskripsi']?></textarea>
                                    </div>
                                    
                                    <button name="update_kelas_online" type="submit" class="btn btn-primary btn-user btn-block">
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

<?= var_dump($var)?>