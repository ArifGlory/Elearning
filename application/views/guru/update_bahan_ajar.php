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
                                    <h1 class="h4 text-gray-900">Tambah Bahan Ajar</h1>
                                </div>

                                <form class="user" method="post" enctype="multipart/form-data">
                                    <div class="form-group">  
                                    <div class="form-group">
                                      <input type="text" class="form-control form-control-user" id="hari_bahan_ajar" name="hari_bahan_ajar" placeholder="Hari" value="<?= $val['hari_bahan_ajar']?>">
                                        <?= form_error('hari_bahan_ajar', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <input type="date" class="form-control form-control-user" id="tanggal_bahan_ajar" name="tanggal_bahan_ajar" value="<?= $val['tanggal_bahan_ajar']?>">
                                        <?= form_error('tanggal_bahan_ajar', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <label>Kelas</label>
                                        <select class="form-control" id="id_kelas" name="id_kelas">
                                            <?php foreach($dd_kelas as $kel):?>
                                                <option value="<?= $kel['id_kelas']?>" <?php if($kel['id_kelas']==$val['id_kelas']){ echo 'selected';}?> ><?= $kel['kelas']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">  
                                    <label>Mata Pelajaran</label>                                      
                                        <select class="form-control" id="id_mapel" name="id_mapel">
                                            <?php foreach($dd_mapel as $map):?>
                                                <option value="<?= $map['id_mapel']?>" <?php if($map['id_mapel']==$val['id_mapel']){ echo 'selected';}?>><?= $map['mapel']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <input type="hidden" class="form-control" id="file_bahan_ajar_old" name="file_bahan_ajar_old" value="<?= $val['file_bahan_ajar']?>">
                                      <input type="file" class="form-control" id="file_bahan_ajar" name="file_bahan_ajar" value="<?= $val['file_bahan_ajar']?>">
                                        <?= form_error('file_bahan_ajar', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <input type="number" class="form-control form-control-user" id="pertemuan_bahan_ajar" name="pertemuan_bahan_ajar" placeholder="Pertemuan Ke" value="<?= $val['pertemuan_bahan_ajar']?>">
                                        <?= form_error('pertemuan_bahan_ajar', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <textarea id="keterangan_bahan_ajar" name="keterangan_bahan_ajar" class="form-control" placeholder="Keterangan"><?= $val['keterangan_bahan_ajar']?></textarea>
                                    </div>
                                    
                                    <button name="update_bahan_ajar" type="submit" class="btn btn-primary btn-user btn-block">
                                        next
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