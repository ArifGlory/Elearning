<?= $this->session->flashdata('message'); ?><!-- content here -->
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
                      <a class="btn btn-primary mt-4" href="<?= site_url('siswa/komentar/'.$l['id_list_forum'])?>">Komentar</a>
                    </div>
                </div>
              </div>
            </div>
          <?php endforeach;?>
        </div>
      </div>
    </div>