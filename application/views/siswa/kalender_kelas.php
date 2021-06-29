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
                      <th>Jam</th>
                      <th>Nama Kelas</th>
                      <th>Nama Mapel</th>
                      <th>Guru</th>
                      <th>Deskripsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($value as $val):?>
                      <tr>
                          <td><?= $val['hari_kalender_kelas'].' / '.$val['tanggal_kalender_kelas']?></td>
                          <td><?= $val['jam_kalender_kelas']?></td>
                          <td><?= $val['kelas']?></td>
                          <td><?= $val['mapel']?></td>
                          <td><?= $val['name']?></td>
                          <td><?= $val['deskripsi_kalender_kelas']?></td>
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