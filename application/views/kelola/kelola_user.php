<?= $this->session->flashdata('message'); ?><!-- Begin Page Content -->
<div class="container-fluid">
  <p>
    <a class="btn btn-primary" href="<?= site_url('kelola/kelola_siswa')?>">Tambah Siswa</a>
    <a class="btn btn-primary" href="<?= site_url('kelola/kelola_guru')?>">Tambah Guru</a>
  </p>

<!-- <?= var_dump($siswa[0])?> -->
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
                      <th>Nama User</th>
                      <th>Jenis User</th>
                      <th class="text-center">Foto Profile</th>
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($users as $use):?>
                      <tr>
                          <td><?= $use['name']?></td>
                          <td><?= $use['role']?></td>
                          <td class="text-center"><img style="width: 35px" src="<?= base_url('assets/img/profile/').$use['image']?>"> </td>
                          <td style="width: 18%">
                            <?php if($use['role_id']==2 || $use['role_id']==4 ){ ?>
                                <a href="<?= site_url('kelola/update_guru/'.$use['id'])?>" class="btn btn-small"><i class="fas fa-edit"></i></a>
                                 <?php }elseif($use['role_id']==1 ){ echo '';} else{ ?>
                                    <a href="<?= site_url('kelola/update_siswa/'.$use['id'])?>" class="btn btn-small"><i class="fas fa-edit"></i></a>
                                <?php }?>
                            <!-- <a href="<?= site_url('kelola/delete/'.$use['id'])?>" class="btn btn-small"><i class="fas fa-trash"></i></a> -->
                            <a href="<?php echo site_url('kelola/delete/'.$use['id']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ini?');" class="btn btn-small" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
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
