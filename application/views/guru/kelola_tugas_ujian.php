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
                                    <h1 class="h4 text-gray-900">Tambah Tugas / Ujian</h1>
                                </div>

                                <form class="user" method="post" enctype="multipart/form-data">
                                    <div class="form-group">  
                                    <div class="form-group">
                                        <label>Hari</label>
                                      <input type="text" class="form-control form-control-user" id="hari_tugas_ujian" name="hari_tugas_ujian" placeholder="Hari">
                                        <?= form_error('hari_tugas_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                      <input type="date" class="form-control form-control-user" id="tanggal_tugas_ujian" name="tanggal_tugas_ujian">
                                        <?= form_error('tanggal_tugas_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
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
                                    <div class="form-group">
                                        <label>Subjek</label>
                                      <input type="text" class="form-control" id="subjek_tugas_ujian" name="subjek_tugas_ujian" placeholder="Subjek Tugas / Ujian">
                                        <?= form_error('subjek_tugas_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Waktu Mulai</label>
                                        <br>
                                        <small> Format Waktu Jam-Menit-detik </small>
                                      <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" step="2">
                                        <?= form_error('waktu_mulai', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Waktu Selesai</label>
                                        <br>
                                        <small> Format Waktu Jam-Menit-detik </small>
                                      <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" step="2">
                                        <?= form_error('waktu_selesai', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Pertemuan</label>
                                      <input type="number" class="form-control form-control-user" id="pertemuan_tugas_ujian" name="pertemuan_tugas_ujian" placeholder="Pertemuan Ke">
                                        <?= form_error('pertemuan_tugas_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>File Soal</label>
                                      <input type="file" class="form-control form-control-user" id="file_tugas_ujian" name="file_tugas_ujian" placeholder="Pertemuan Ke">
                                        <?= form_error('file_tugas_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                      <textarea id="keterangan_tugas_ujian" name="keterangan_tugas_ujian" class="form-control" placeholder="Keterangan"></textarea>
                                    </div>
                                    
                                    <button name="kelola_tugas_ujian" type="submit" class="btn btn-primary btn-user btn-block">
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
                      <th>Subjek Tugas Ujian</th>
                      <th>Waktu Mulai</th>
                      <th>Waktu Selesai</th>
                      <th>Pertemuan</th>
                      <th>Keterangan</th>
                      <th>File</th>
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($values as $val):?>
                      <tr>
                          <td><?= $val['hari_tugas_ujian'].' / '.$val['tanggal_tugas_ujian']?></td>
                          <td><?= $val['kelas']?></td>
                          <td><?= $val['mapel']?></td>
                          <td><?= $val['subjek_tugas_ujian']?></td>
                          <td><?= $val['waktu_mulai']?></td>
                          <td><?= $val['waktu_selesai']?></td>
                          <td><?= $val['pertemuan_tugas_ujian']?></td>
                          <td><?= $val['keterangan_tugas_ujian']?></td>
                          <td><a target="_blank" class="btn btn-primary" href="<?= site_url('guru_report/download_tugas_ujian/'.$val['id_tugas_ujian'])?>">Download File Tugas</a></td>
                          <td style="width: 18%">
                            <a href="<?= site_url('guru_report/detail_tugas_ujian/'.$val['id_tugas_ujian'])?>" class="btn btn-small"><i class="fas fa-eye"></i></a>
                            <a href="<?= site_url('guru_report/update_tugas_ujian/'.$val['id_tugas_ujian'])?>" class="btn btn-small"><i class="fas fa-edit"></i></a>
                            <!-- <a href="<?= site_url('guru_report/delete_tugas_ujian/'.$val['id_tugas_ujian'])?>" class="btn btn-small"><i class="fas fa-trash"></i></a> -->
                            <a href="<?php echo site_url('guru_report/delete_tugas_ujian/'.$val['id_tugas_ujian']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ini?');" class="btn btn-small" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
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
<!-- End of Main Content -->