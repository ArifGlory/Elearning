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
                      <th>NISN</th>
                      <th>Nama Siswa</th>
                      <th>Waktu Kirim Tugas</th>
                      <th>File</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($values as $val):?>
                      <tr>
                          <td><?= $val['nisn']?></td>
                          <td><?= $val['name']?></td>
                          <td>
                              <?php echo date( 'j F, Y | H:i:s', strtotime($val['waktu_upload'])); ?>
                          </td>
                          <td style="width: 18%">
                            <a href="<?= base_url('upload/tugas_ujian/'.$val['file_tugas'])?>" class="btn btn-primary">Lihat</a></td>
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