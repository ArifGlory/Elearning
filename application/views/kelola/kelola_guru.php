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
                                    <h1 class="h4 text-gray-900">Tambah Guru</h1>
                                </div>

                                <form class="user" method="post" action="<?= base_url('kelola/add_guru/'); ?>">
                                    <div class="form-group">                                        
                                        <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">                                        
                                        <input type="text" class="form-control form-control-user" id="nomor_induk" name="nomor_induk" placeholder="NIP">
                                        <?= form_error('nomor_induk', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">                                        
                                        <select class="form-control" id="id_mapel" name="id_mapel">
                                            <?php foreach($dd_mapel as $map):?>
                                                <option value="<?= $map['id_mapel']?>"><?= 'Guru '.$map['mapel']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">                                        
                                        <select class="form-control" id="role_id" name="role_id">
                                            <option value="2">Guru</option>
                                            <option value="4">Wali Kelas & Guru</option>
                                        </select>
                                    </div>
                                    <div class="form-group">                                        
                                        <input type="number" class="form-control form-control-user" id="phone" name="phone" placeholder="Telepon">
                                        <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
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
                      <th>Nama</th>
                      <th>NIP</th>
                      <th>Jabatan</th>
                      <th>Telepon</th>
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($guru as $sis):?>
                      <tr>
                          <td><?= $sis['name']?></td>
                          <td><?= $sis['nomor_induk']?></td>
                          <td>
                            <?php if($sis['role_id']==4)
                                { echo 'Wali kelas & Guru '.$sis['mapel'];
                            }else
                                { echo 'Guru '.$sis['mapel'];} 
                            ?>
                                    
                          </td>
                          <td><?= $sis['phone']?></td>
                          <td style="width: 18%">
                            <a href="<?= site_url('kelola/update_guru/'.$sis['id'])?>" class="btn btn-small"><i class="fas fa-edit"></i></a>
                            <!-- <a href="<?= site_url('kelola/delete_guru/'.$sis['id'])?>" class="btn btn-small"><i class="fas fa-trash"></i></a> -->
                            <a href="<?php echo site_url('kelola/delete_guru/'.$sis['id']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ini?');" class="btn btn-small" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
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
