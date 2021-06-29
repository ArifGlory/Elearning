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
                                    <h1 class="h4 text-gray-900">Tambah Tugas / Ujian</h1>
                                </div>

                                <form class="user" method="post" enctype="multipart/form-data">
                                    <div class="form-group">  
                                    <div class="form-group">
                                      <input type="text" class="form-control form-control-user" id="hari_tugas_ujian" name="hari_tugas_ujian" placeholder="Hari" value="<?= $value['hari_tugas_ujian']?>">
                                        <?= form_error('hari_tugas_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <input type="date" class="form-control form-control-user" id="tanggal_tugas_ujian" name="tanggal_tugas_ujian" value="<?= $value['tanggal_tugas_ujian']?>">
                                        <?= form_error('tanggal_tugas_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
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
                                                <option value="<?= $map['id_mapel']?>" <?php if($map['id_mapel']==$value['id_mapel']){ echo 'selected';}?>><?= $map['mapel']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="subjek_tugas_ujian" name="subjek_tugas_ujian" placeholder="Subjek Tugas / Ujian" value="<?= $value['subjek_tugas_ujian']?>">
                                        <?= form_error('subjek_tugas_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" step="2" value="<?= $value['waktu_mulai']?>">
                                        <?= form_error('waktu_mulai', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" step="2" value="<?= $value['waktu_selesai']?>">
                                        <?= form_error('waktu_selesai', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <input type="number" class="form-control form-control-user" id="pertemuan_tugas_ujian" name="pertemuan_tugas_ujian" placeholder="Pertemuan Ke" value="<?= $value['pertemuan_tugas_ujian']?>">
                                        <?= form_error('pertemuan_tugas_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <textarea id="keterangan_tugas_ujian" name="keterangan_tugas_ujian" class="form-control" placeholder="Keterangan"><?= $value['keterangan_tugas_ujian']?></textarea>
                                    </div>
                                    
                                    <button name="update_tugas_ujian" type="submit" class="btn btn-primary btn-user btn-block">
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