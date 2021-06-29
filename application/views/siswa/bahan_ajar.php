<?= $this->session->flashdata('message'); ?><!-- Begin Page Content -->
<div class="container-fluid">

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