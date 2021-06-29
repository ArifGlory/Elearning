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
                                    <h1 class="h4 text-gray-900">Tambah Tahun Ajaran</h1>
                                </div>

                                <form class="user" method="post" action="<?= base_url('tahun/add_tahun/'); ?>">
                                    <div class="form-group">
                                        <!-- <input type="hidden" class="form-control form-control-user" name="id_siswa" value="<?= $this->uri->segment(3);?>" >
                                        <input type="hidden" class="form-control form-control-user" name="id_guru" value="<?= $this->session->userdata('id');?>" > 
                                        <input type="hidden" class="form-control form-control-user" name="id_mapel" value="<?= $id_mapel['id_mapel'];?>" >-->
                                        
                                        <input type="text" class="form-control form-control-user" id="tahun" name="tahun" placeholder="Ex : 2019/2020">
                                        <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
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
          <h6 class="m-0 font-weight-bold text-primary">Tahun Ajaran</h6>
      </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                      <th>Deskripsi</th>
                      <th>Status</th>
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($all_tahun as $allt):?>
                      <tr>
                          <td><?= $allt['tahun']?></td>
                          <td><?php if($allt['is_active'] == '0'){ echo "Tidak Aktif";}else{ echo "Aktif";}?></td>
                          <td><?php if($allt['is_active'] == '0'){?> 
                            <a class="btn btn-primary" href="<?= site_url('tahun/aktifkan/').$allt['id_tahun']?>"><b>aktifkan</b></a>
                            <?php }else{ echo "";}?>
                            <a class="btn btn-warning" style="color:black" href="<?= site_url('tahun/update/'.$allt['id_tahun'])?>"><i>update</i></a>
                            <!-- <a class="btn btn-danger" style="color:black" href="<?= site_url('tahun/delete/'.$allt['id_tahun'])?>"><i>delete</i></a> -->
                            <a href="<?php echo site_url('tahun/delete/'.$allt['id_tahun']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ini?');" class="btn btn-small" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
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
