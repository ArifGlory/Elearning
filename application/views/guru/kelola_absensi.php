<?= $this->session->flashdata('message'); ?><div class="container-fluid">
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
                                    <h1 class="h4 text-gray-900">Tambah Absensi</h1>
                                </div>

                                <form class="user" method="post">
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
                                    <label>Mata Pelajaran</label>                                      
                                        <select class="form-control" id="id_mapel" name="id_mapel">
                                            <?php foreach($dd_mapel as $map):?>
                                                <option value="<?= $map['id_mapel']?>"><?= $map['mapel']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <!-- <div class="form-group">                                        
                                        <select class="form-control" id="id_siswa" name="id_siswa">
                                            <?php foreach($users as $use):?>
                                                <option value="<?= $use['id']?>"><?=$use['name']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div> -->
                                    <div class="form-group">
                                      <label>Hari</label>
                                      <input type="text" class="form-control form-control-user" id="hari_absensi" name="hari_absensi" placeholder="Hari">
                                        <?= form_error('pertemuan_ke', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <label>Tanggal</label>
                                      <input type="date" class="form-control form-control-user" id="tanggal_absensi" name="tanggal_absensi">
                                        <?= form_error('pertemuan_ke', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <label>Mulai absensi</label>
                                        <br>
                                        <small> Format Waktu Jam-Menit-detik </small>
                                      <input type="time" class="form-control form-control-user" id="mulai" name="mulai" step="2" >
                                        <?= form_error('mulai', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <label>Selesai absensi</label>
                                        <br>
                                        <small> Format Waktu Jam-Menit-detik </small>
                                      <input type="time" class="form-control form-control-user" id="selesai" name="selesai" step="2" >
                                        <?= form_error('selesai', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <label>Pertemuan ke</label>
                                      <input type="number" class="form-control form-control-user" id="pertemuan_ke" name="pertemuan_ke" placeholder="Pertemuan Ke">
                                        <?= form_error('pertemuan_ke', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <!-- <div class="form-group">                                        
                                        <select class="form-control" id="id_status" name="id_status">
                                                <option value="1">Hadir</option>
                                                <option value="0">Tidak Hadir</option>
                                                <option value="2">Izin</option>
                                        </select>
                                        <?= form_error('id_status', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <textarea id="keterangan_absensi" name="keterangan_absensi" class="form-control" placeholder="Keterangan"></textarea>
                                    </div> -->
                                    
                                    <button name="submit_absensi" type="submit" class="btn btn-primary btn-user btn-block">
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
                      <th>Hari / Tanggal</th>
                      <th>Nama Kelas</th>
                      <th>Nama Mapel</th>
                      <!-- <th>NISN</th>
                      <th>Nama Murid</th> -->
                      <th>Pertemuan</th>
                      <th>Mulai Absensi</th>
                      <th>Selesai Absensi</th>
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($values as $val):?>
                      <tr>
                          <td><?= $val['hari_absensi'].' / '.$val['tanggal_absensi']?></td>
                          <td><?= $val['kelas']?></td>
                          <td><?= $val['mapel']?></td>
                          <!-- <td><?= $val['nisn']?></td>
                          <td><?= $val['name']?></td> -->
                          <td><?= $val['pertemuan_ke']?></td>
                          <td><?= $val['mulai']?></td>
                          <td><?= $val['selesai']?></td>
                          <!-- <td><?php if($val['id_status']==1){ echo "Tidak Hadir";}elseif($val['id_status']==2){echo "Hadir";}elseif($val['id_status']==3){echo "Izin";}elseif($val['id_status']==0){echo " ";}?></td>
                          <td><?= $val['keterangan_absensi']?></td> -->
                          <td style="width: 15%">
                            <a href="<?= site_url('guru_report/detail_absensi/'.$val['id_absensi'])?>" class="btn btn-small"><i class="fas fa-eye"></i></a>
                            <!-- <a href="<?= site_url('guru_report/delete_absensi/'.$val['id_absensi'])?>" class="btn btn-small"><i class="fas fa-trash"></i></a> -->
                            <a href="<?php echo site_url('guru_report/delete_absensi/'.$val['id_absensi']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ini?');" class="btn btn-small" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
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
<!-- End of Main Content