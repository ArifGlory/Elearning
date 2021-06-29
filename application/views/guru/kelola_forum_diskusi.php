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
                                    <h1 class="h4 text-gray-900">Tambah Forum Diskusi</h1>
                                </div>

                                <form class="user" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Judul Forum Diskusi</label>
                                      <input type="text" class="form-control form-control-user" id="nama_list_forum" name="nama_list_forum" placeholder="Nama Forum">
                                        <?= form_error('nama_list_forum', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar Sampul</label>
                                      <input type="file" class="form-control form-control-user" id="image_list_forum" name="image_list_forum" placeholder="Nama Forum">
                                        <?= form_error('image_list_forum', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <textarea id="deskripsi_list_forum" name="deskripsi_list_forum" class="form-control" placeholder="Deskripsi"></textarea>
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
                                    <label>Status</label>                                      
                                        <select class="form-control" id="id_status" name="id_status">
                                          <option value="1">Aktif</option>
                                          <option value="0">Tidak Aktif</option>
                                        </select>
                                        <?= form_error('id_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <button name="submit_list_forum" type="submit" class="btn btn-primary btn-user btn-block">
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
        <div class="row">
          <?php foreach($ls as $l):?>
            <div class="col-md-4 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?= $l['kelas'].' - '.$l['mapel']?></div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $l['nama_list_forum']?></div>
                        </div>
                      </div>
                      <div class="mb-1 text-xs mt-2"><?= $l['deskripsi_list_forum']?></div>
                    </div>
                    <div class="col-auto">
                      <img style="width: 65px" src="<?= base_url('upload/image_list_forum/'.$l['image_list_forum'])?>">
                      <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
                    </div>
                  </div>
                  <div class="text-center">
                      <a class="btn btn-primary mt-4" href="<?= site_url('guru_report/komentar/'.$l['id_list_forum'])?>">Komentar</a>
                      <a class="btn btn-danger mt-4" onclick="return confirm('Apakah Anda Ingin Menghapus Data ini?');" href="<?= site_url('guru_report/delete_forum_diskusi/'.$l['id_list_forum'])?>">Hapus</a>
                    </div>
                </div>
              </div>
            </div>
          <?php endforeach;?>
        </div>
      </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content