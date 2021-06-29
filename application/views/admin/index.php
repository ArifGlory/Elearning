<?= $this->session->flashdata('message'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Siswa</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $siswa['siswa'].' Orang'?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Guru</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $guru['guru'].' Orang'?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kelas</div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $kelas['kelas'].' Kelas'?></div>
                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row">
	    <!-- Area Chart -->
	    <div class="col-xl-8 col-lg-7">
	      <div class="card shadow mb-4">
	        <!-- here -->
	        <div class="card-header py-3">
		        <h6 class="m-0 font-weight-bold text-primary"><?= "Kalender Terbaru"?></h6>
		    </div>
	        <div class="card-body">
	            <div class="table-responsive">
		            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		                <thead>
		                  <tr>
		                      <th>Hari / Tgl</th>
		                      <th>Jam</th>
		                      <th>Kelas</th>
		                      <th>Mapel</th>
		                      <th>Guru</th>
		                      <th>Deskripsi</th>
		                  </tr>
		                </thead>
		                <tbody>
		                  <?php foreach($kalender as $v):?>
		                      <tr>
		                          <td><?= $v['hari_kalender_kelas'].' / '.$v['tanggal_kalender_kelas']?></td>
		                          <td><?= $v['jam_kalender_kelas']?></td>
		                          <td><?= $v['kelas']?></td>
		                          <td><?= $v['mapel']?></td>
		                          <td><?= $v['name']?></td>
		                          <td><?= $v['deskripsi_kalender_kelas']?></td>
		                      </tr>
		                <?php endforeach;?>
		                </tbody>
		            </table>
	          	</div>
        	</div>
	      </div>
	    </div>

	    <!-- Pie Chart -->
	    <!-- <div class="col-xl-4 col-lg-5">
	      <div class="card shadow mb-4">

	        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	          <h6 class="m-0 font-weight-bold text-primary">Grafik Siswa</h6>
	        </div>

	        <div class="card-body">
	          <div class="chart-pie pt-4 pb-2">
	            <canvas id="ChartSiswa"></canvas>
	          </div>
	          <div class="mt-4 text-center small">
	            <span class="mr-2">
	              <i class="fas fa-circle text-primary"></i> Laki-laki
	            </span>
	            <span class="mr-2">
	              <i class="fas fa-circle text-success"></i> Perempuan
	            </span>
	          </div>
	        </div>
	      </div>
	    </div> -->
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 