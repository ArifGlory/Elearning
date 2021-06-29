<?= $this->session->flashdata('message'); ?>
<div class="col-md-12">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?= $ls['kelas'].' - '.$ls['mapel']?></div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $ls['nama_list_forum']?></div>
            </div>
          </div>
          <div class="mb-1 text-xs mt-2"><?= $ls['deskripsi_list_forum']?></div>
        </div>
        <div class="col-auto">
          <img style="width: 65px" src="<?= base_url('upload/image_list_forum/'.$ls['image_list_forum'])?>">
          <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row justify-content-center">

        <div class="col-lg-12">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                              <?php $id_saya = $this->session->userdata('id');?>

                              <?php foreach($komentars as $kom):?>
                                <?php if($kom['id']== $id_saya){?>
                                  <div class="col-md-12 mt-2">
                                    <div class="card border-left-danger shadow h-100 py-2">
                                      <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                          <div class="col-md-12 mr-2">
                                            <div class="text-xs font-weight-bold text-info mb-1"><?= 'Saya'?></div>
                                            <div class="mb-1 text-xs mt-2"><?= $kom['komentar_forum']?></div>
                                              <div class="text-right">
                                                  <a class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Komentar ini?');" href="<?= site_url('guru_report/delete_komentar/'.$kom['id_komentar_forum'])?>">Hapus</a>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <?php }else{?>
                                  <div class="col-md-12 mt-2">
                                    <div class="card border-left-info shadow h-100 py-2">
                                      <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                          <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info mb-1"><?= $kom['name']?></div>
                                            <div class="mb-1 text-xs mt-2"><?= $kom['komentar_forum']?></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <?php }?>
                              <?php endforeach;?>

                                <form class="user" method="post" enctype="multipart/form-data">
                                    <div class="form-group mt-4">
                                      <input type="hidden" name="id_kelas" value="<?= $ls['id_kelas']?>">
                                      <textarea id="komentar_forum" name="komentar_forum" class="form-control" placeholder="Tulis Komentar"></textarea>
                                    </div>

                                    <button name="submit_komentar_guru" type="submit" class="btn btn-primary btn-user btn-block">
                                        Komentar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>