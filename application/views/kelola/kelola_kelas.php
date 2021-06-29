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
                                    <h1 class="h4 text-gray-900">Tambah Kelas</h1>
                                </div>

                                <form class="user" method="post">
                                    <div class="form-group">
                                        <label>Nama kelas </label>
                                        <input type="text" class="form-control form-control-user" id="kelas" name="kelas" placeholder="Nama Kelas baru">
                                        <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <!-- <div class="form-group">                                        
                                        <input type="text" class="form-control form-control-user" id="id_wali_kelas" name="id_wali_kelas" placeholder="Wali Kelas" value="<?= $kelas['name']?>">
                                        <?= form_error('id_wali_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div> -->
                                    <div class="form-group">
                                        <label>Pilih Wali kelas </label>
                                        <select class="form-control" id="id_wali_kelas" name="id_wali_kelas">
                                            <?php foreach($dd_wake as $wak):?>
                                                <option value="<?= $wak['id']?>"><?= $wak['name']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <p style="font-size: 11px; color: red;">Hanya wali kelas yg ditampilkan</p>
                                        <?= form_error('id_wali_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button name="submit_kelas" type="submit" class="btn btn-primary btn-user btn-block">
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
                      <th>Nama Kelas</th>
                      <th>Wali Kelas</th>
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($kelas as $kel):?>
                      <tr>
                          <td><?= $kel['kelas']?></td>
                          <td><?= $kel['name']?></td>
                          <td style="width: 18%">
                            <a href="<?= site_url('kelola/update_kelas/'.$kel['id_kelas'])?>" class="btn btn-small"><i class="fas fa-edit"></i></a>
                            <!-- <a href="<?= site_url('kelola/delete_kelas/'.$kel['id_kelas'])?>" class="btn btn-small"><i class="fas fa-trash"></i></a> -->
                            <a href="<?php echo site_url('kelola/delete_kelas/'.$kel['id_kelas']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ini?');" class="btn btn-small" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
                          </td>
                      </tr>
                <?php endforeach;?>
                </tbody>
            </table>
          </div>
        </div>
    </div>
<!-- <?=var_dump($kelas)?> -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


