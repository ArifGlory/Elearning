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
                                    <h1 class="h4 text-gray-900">Tambah Kalender Kelas</h1>
                                </div>

                                <form class="user" method="post">
                                    <div class="form-group">
                                        <label> Hari </label>
                                      <input type="text" class="form-control form-control-user" id="hari_kalender_kelas" name="hari_kalender_kelas" placeholder="Hari">
                                        <?= form_error('hari_kalender_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label> Tangggal </label>
                                      <input type="date" class="form-control form-control-user" id="tanggal_kalender_kelas" name="tanggal_kalender_kelas" placeholder="Tanggal">
                                        <?= form_error('tanggal_kalender_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label> Jam </label>
                                        <br>
                                        <small> Format Waktu Jam-Menit-detik </small>
                                      <input type="time" class="form-control form-control-user" id="jam_kalender_kelas" name="jam_kalender_kelas" step="2" placeholder="Tanggal">
                                        <?= form_error('jam_kalender_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                    <label>Mata Pelajaran</label>                                      
                                        <select class="form-control" id="id_mapel" name="id_mapel">
                                            <?php foreach($dd_mapel as $map):?>
                                                <option value="<?= $map['id_mapel']?>"><?= $map['mapel']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label> Deskripsi </label>
                                      <textarea id="deskripsi_kalender_kelas" name="deskripsi_kalender_kelas" class="form-control" placeholder="Deskripsi"></textarea>
                                    </div>
                                    
                                    <button name="submit_kalender_kelas" type="submit" class="btn btn-primary btn-user btn-block">
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
                      <th>Hari / Tanggal</th>
                      <th>Jam</th>
                      <th>Nama Kelas</th>
                      <th>Nama Mapel</th>
                      <th>Guru</th>
                      <th>Deskripsi</th>
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($value as $val):?>
                      <tr>
                          <td><?= $val['hari_kalender_kelas'].' / '.$val['tanggal_kalender_kelas']?></td>
                          <td><?= $val['jam_kalender_kelas']?></td>
                          <td><?= $val['kelas']?></td>
                          <td><?= $val['mapel']?></td>
                          <td><?= $val['name']?></td>
                          <td><?= $val['deskripsi_kalender_kelas']?></td>
                          <td style="width: 18%">
                            <a href="<?= site_url('guru_report/update_kalender_kelas/'.$val['id_kalender_kelas'])?>" class="btn btn-small"><i class="fas fa-edit"></i></a>
                            <!-- <a href="<?= site_url('guru_report/delete_kalender_kelas/'.$val['id_kalender_kelas'])?>" class="btn btn-small"><i class="fas fa-trash"></i></a> -->
                            <a href="<?php echo site_url('guru_report/delete_kalender_kelas/'.$val['id_kalender_kelas']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ini?');" class="btn btn-small" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
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