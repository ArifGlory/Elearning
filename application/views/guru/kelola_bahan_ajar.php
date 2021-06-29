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
                                    <h1 class="h4 text-gray-900">Tambah Bahan Ajar</h1>
                                </div>

                                <form class="user" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                    <div class="form-group">
                                        <label>Hari</label>
                                        <input type="text" class="form-control form-control-user" id="hari_bahan_ajar" name="hari_bahan_ajar" placeholder="Hari">
                                        <?= form_error('hari_bahan_ajar', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control form-control-user" id="tanggal_bahan_ajar" name="tanggal_bahan_ajar">
                                        <?= form_error('tanggal_bahan_ajar', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                        <label>File</label>
                                        <input type="file" class="form-control" id="file_bahan_ajar" name="file_bahan_ajar">
                                        <?= form_error('file_bahan_ajar', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Pertemuan ke</label>
                                        <input type="number" class="form-control form-control-user" id="pertemuan_bahan_ajar" name="pertemuan_bahan_ajar" placeholder="Pertemuan Ke">
                                        <?= form_error('pertemuan_bahan_ajar', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea id="keterangan_bahan_ajar" name="keterangan_bahan_ajar" class="form-control" placeholder="Keterangan"></textarea>
                                    </div>
                                    
                                    <button name="submit_bahan_ajar" type="submit" class="btn btn-primary btn-user btn-block">
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
                      <th>Bahan Ajar</th>
                      <th>Pertemuan</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($values as $val):?>
                      <tr>
                          <td><?= $val['hari_bahan_ajar'].' / '.$val['tanggal_bahan_ajar']?></td>
                          <td><?= $val['kelas']?></td>
                          <td><?= $val['mapel']?></td>
                          <td>
                            <a href="<?= site_url('upload/bahan_ajar/'.$val['file_bahan_ajar'])?>" class="btn btn-primary btn-icon-split">
                              <span class="icon text-white-50">
                                <i class="fas fa-file"></i>
                              </span>
                              <span class="text"><?= $val['file_bahan_ajar']?></span>
                            </a>
                          </td>
                          <td><?= $val['pertemuan_bahan_ajar']?></td>
                          <td><?= $val['keterangan_bahan_ajar']?></td>
                          <td style="width: 18%">
                            <a href="<?= site_url('guru_report/update_bahan_ajar/'.$val['id_bahan_ajar'])?>" class="btn btn-small"><i class="fas fa-edit"></i></a>
                            <!-- <a href="<?= site_url('guru_report/delete_bahan_ajar/'.$val['id_bahan_ajar'])?>" class="btn btn-small"><i class="fas fa-trash"></i></a> -->
                            <a href="<?php echo site_url('guru_report/delete_bahan_ajar/'.$val['id_bahan_ajar']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ini?');" class="btn btn-small" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
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