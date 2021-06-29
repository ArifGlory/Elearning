<?= $this->session->flashdata('message'); ?><!-- Begin Page Content -->
<div class="container-fluid">
    <a class="btn btn-success mb-2" href="<?= site_url('guru_report/cetak_kelola_nilai/')?>"><i class="fa fa-print"> Cetak Nilai</i></a>
    <!-- content here -->
    <div class="card shadow mb-4">
    	<div class="card-header py-3">
      		<h6 class="m-0 font-weight-bold text-primary">Kelola Nilai Harian</h6>
            <br>
            <p>Kelas yang anda ampu</p>
    	</div>
        <div class="card-body">
          	<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              	<thead>
                	<tr>
                  		<th width="5%">No.</th>
                  		<th>Kelas</th>
                      <th width="30%">Action</th>
                	</tr>
              	</thead>
              	<tbody>
              		<?php
                    $no = 1;
                    foreach($siswa as $sis):?>
                    	<tr>
                          <td><?= $no++;?></td>
                          <td><?= $sis['kelas']?></td>
                          <td><a href="<?= site_url('guru_report/report_kelas/'.$sis['id_kelas'])?>" class="btn btn-primary"><i class="fas fa-eye"></i> Lihat </a></td>
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
