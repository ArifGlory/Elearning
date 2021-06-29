<?= $this->session->flashdata('message'); ?><!-- Begin Page Content -->
<div class="container-fluid">
    <!-- content here -->
    <div class="card shadow mt-4 mb-4">
    	<div class="card-header py-3">
      		<h6 class="m-0 font-weight-bold text-primary">Nilai Harian - <?= $data_saya['mapel']?></h6>
    	</div>
        <div class="card-body">
          	<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              	<thead>
                	<tr>
                  		<th width="5%">No.</th>
                  		<th>Nama Siswa</th>
                  		<th>Kelas</th>
                    	<th>Nilai Akhir</th>
                      <!-- <th>Action</th> -->
                	</tr>
              	</thead>
              	<tbody>
              		<?php
                    $no = 1;
                    foreach($siswa as $sis):?>
                    	<tr>
                          <td><?= $no++;?></td>
                          <td><?= $sis['name']?></td>
                          <td><?= $sis['kelas']?></td>
                          <td><?= intval($sis['rata_rata']) ?></td>
                          <!-- <td><a href="<?= site_url('guru_report/detail/'.$sis['id'])?>" class="btn btn-primary"><i class="fas fa-eye"></i> Lihat </a></td> -->
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
<script type="text/javascript">
  window.print();
</script>