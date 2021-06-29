<?= $this->session->flashdata('message'); ?><!-- Begin Page Content -->
<div class="container-fluid">

  <?php 
    //echo var_dump($mapel);
  ?>

  <!-- Tambah Nilai Harian -->
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
                                <option value="<?php echo site_url('wali_report/report_tahun/').$tah['id_tahun']?>"> <?= $tah['tahun']?> </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
            </div>

        </div>
    </div>

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
                  		<th>Nama Siswa</th>
                    	<th>Nomor Induk Siswa</th>
                      <th>Action</th>
                	</tr>
              	</thead>
              	<tbody>
              		<?php foreach($report as $rep):?>
                    	<tr>
                          <td class="text-center" colspan="3">Pilih Tahun Ajaran</td>
                          
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
<script type="text/javascript">
    function handleSelect(elm)
    {
        window.location = elm.value+"";
    }
</script>
<!-- End of Main Content -->
