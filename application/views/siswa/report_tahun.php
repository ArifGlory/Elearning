<?= $this->session->flashdata('message'); ?><!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row justify-content-center">

      <div class="col-lg-7">
          <div class="card o-hidden border-0 shadow-lg mb-4">
              <div class="card-header">
                  <h5>Pilih Tahun Ajaran</h5>
              </div>
              <div class="card-body">
                  <div class="form-group">
                      <select class="form-control" onchange="javascript:handleSelect(this)">
                          <option value="#"> Pilih Tahun</option>
                          <?php foreach($tahun as $tah):?>
                              <option value="<?php echo site_url('siswa/report_tahun/').$tah['id_tahun']?>"> <?= $tah['tahun']?> </option>
                          <?php endforeach;?>
                      </select>
                  </div>
              </div>
          </div>

      </div>
  </div>
    <div class="mb-2">
      <a class="btn btn-success" href="<?= site_url('siswa/cetak_report/'.$par_tahun)?>"><i class="fa fa-print"> Cetak Report</i></a>
    </div>
    <!-- content here -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <div class="row">
            <div class="col-md-6"><h6>Nama Sekolah : SMAS ADIGUNA</h6></div>
            <div class="col-md-6"><h6>Kelas : <?= $nilai_saat_dikelas?></h6></div>
            <div class="col-md-6"><h6>Alamat : <?= $user['alamat']?></h6></div>
            <div class="col-md-6"><h6>Tahun Pelajaran : <?= $tahun_ajar?></h6></div>
            <div class="col-md-6"><h6>Nama Peserta Didik : <?= $user['name']?></h6></div>
            <div class="col-md-6"><h6>Nomor Induk / NISN : <?= $user['nomor_induk']?></h6></div>
          </div>
          <!-- <h6 class="m-0 font-weight-bold text-primary">Raport - <?= $nama_siswa['name'] ?></h6> -->
      </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                      <th>Mata Pelajaran</th>
                      <th>Nilai</th>
                      <th>Deskripsi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td colspan="3"><b>Kelompok A (Umum)</td>
                  </tr>
                  <?php foreach($nilai_A as $nA):?>
                      <tr>
                          <td><?= $nA['mapel']?></td>
                          <td><?= intval($nA['nilai']) ?></td>
                          <td><?= $nA['deskripsi']?></td>
                      </tr>
                  <?php endforeach;?>
                  <tr>
                    <td colspan="3"><b>Kelompok B (Umum)</b></td>
                  </tr>
                  <?php foreach($nilai_B as $nB):?>
                      <tr>
                          <td><?= $nB['mapel']?></td>
                          <td><?= intval($nB['nilai']) ?></td>
                          <td><?= $nB['deskripsi']?></td>
                      </tr>
                  <?php endforeach;?>
                  <tr>
                    <td colspan="3"><b>Kelompok C (Peminatan)</b></td>
                  </tr>
                  <?php foreach($nilai_C as $nC):?>
                      <tr>
                          <td><?= $nC['mapel']?></td>
                          <td><?= intval($nC['nilai']) ?></td>
                          <td><?= $nC['deskripsi']?></td>
                      </tr>
                  <?php endforeach;?>
                
                </tbody>
            </table>



            <div class="text-right">
              <div style="margin-right: 15px">
                <h6>Bandar Lampung, </h6>
                <h6>Wali Kelas</h6><br><br><br>
                <h6><?= $wali_kelas['name']?></h6>
                <h6>NIP. <?= $wali_kelas['nomor_induk']?></h6>
              </div>
            </div>

          </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<script type="text/javascript">
    function handleSelect(elm)
    {
        window.location = elm.value+"";
    }
</script>
</div>
<!-- End of Main Content -->
