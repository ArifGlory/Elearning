<?= $this->session->flashdata('message'); ?><!-- Begin Page Content -->
<div class="container-fluid">
<a class="btn btn-success mb-2" href="<?= site_url('wali_report/cetak_detail_report/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>"><i class="fa fa-print"> Cetak Report</i></a>
<p style="font-size: 11px"><i>Lengkapi data untuk mendapatkan tampilan yang sesuai</i></p>
    <!-- content here -->
    <div class="card shadow mb-4">
    	<div class="card-header py-3">
          <div class="row">
            <div class="col-md-6"><h6>Nama Sekolah : SMAS ADIGUNA</h6></div>
            <div class="col-md-6"><h6>Kelas : <?= $user['kelas']?></h6></div>
            <div class="col-md-6"><h6>Alamat : <?= $bio_siswa['alamat']?></h6></div>
            <div class="col-md-6"><h6>Tahun Pelajaran : <?= $tahun_ajar?></h6></div>
            <div class="col-md-6"><h6>Nama Peserta Didik : <?= $bio_siswa['name']?></h6></div>
            <div class="col-md-6"><h6>Nomor Induk / NISN : <?= $bio_siswa['nomor_induk']?></h6></div>
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
                  <td colspan="3"><b>Kelompok A (Umum)</td>
              		<?php foreach($nilai_A as $nA):?>
                    	<tr>
                          <td><?= $nA['mapel']?></td>
                          <td><?= intval($nA['nilai']) ?></td>
                          <td><?= $nA['deskripsi']?></td>
                      </tr>
            		  <?php endforeach;?>
                  
                  <td colspan="3"><b>Kelompok B (Umum)</b></td>
                  <?php foreach($nilai_B as $nB):?>
                      <tr>
                          <td><?= $nB['mapel']?></td>
                          <td><?= intval($nB['nilai'])?></td>
                          <td><?= $nB['deskripsi']?></td>
                      </tr>
                  <?php endforeach;?>

                  <td colspan="3"><b>Kelompok C (Peminatan)</b></td>
                  <?php foreach($nilai_C as $nC):?>
                      <tr>
                          <td><?= $nC['mapel']?></td>
                          <td><?= intval($nC['nilai'])?></td>
                          <td><?= $nC['deskripsi']?></td>
                      </tr>
                  <?php endforeach;?>
                
              	</tbody>
            </table>



            <div class="text-right">
              <div style="margin-right: 15px">
                <h6>Bandar Lampung, </h6>
                <h6>Wali Kelas</h6><br><br><br>
                <h6><?= $bio_wali['name']?></h6>
                <h6>NIP. <?= $bio_wali['nomor_induk']?></h6>
              </div>
            </div>

          </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
