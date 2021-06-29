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
                      <th>Nama Kelas</th>
                      <th>Nama Mapel</th>
                      <th>Semester</th>
                      <th>Jumlah Pertemuan</th>
                      <th>Nama Guru</th>
                      <th>Deskripsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($var as $v):?>
                      <tr>
                          <td><?= $v['kelas']?></td>
                          <td><?= $v['mapel']?></td>
                          <td><?= $v['tahun']?></td>
                          <td><?= $v['jumlah_pertemuan']?></td>
                          <td><?= $v['name']?></td>
                          <td><?= $v['deskripsi']?></td>
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