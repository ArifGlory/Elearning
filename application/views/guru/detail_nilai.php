<?= $this->session->flashdata('message'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- <?= var_dump($tahun_aktif);?> -->

    <!-- Tambah Nilai Harian -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900">Tambah Nilai Harian</h1>
                                </div>

                                <form class="user" method="post" action="<?= base_url('guru_report/add_nilai_harian/'); ?>">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control form-control-user" name="id_siswa" value="<?= $this->uri->segment(3);?>" >
                                        <input type="hidden" class="form-control form-control-user" name="id_guru" value="<?= $this->session->userdata('id');?>" >
                                        <input type="hidden" name="id_tahun" value="<?= $tahun_aktif['id_tahun']?>">
                                        <input type="hidden" name="id_kelas" value="<?= $id_kelas ?>">
                                        <input type="hidden" class="form-control form-control-user" name="id_mapel" value="<?= $id_mapel['id_mapel'];?>" >
                                        
                                        <input required type="number" class="form-control form-control-user" id="nilai" name="nilai" placeholder="Masukkan Nilai">
                                        <?= form_error('nilai', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <select class="form-control" name="deskripsi">
                                        <?php if(null == $mute_uas && null == $mute_mid){?>
                                          <option value="Tugas">Tugas</option>
                                          <option value="Ulangan Harian">Ulangan Harian</option>
                                          <option value="MID">MID</option>
                                          <option value="UAS">UAS</option>
                                        <?php }elseif(null !== $mute_mid && null == $mute_uas){?>
                                          <option value="Tugas">Tugas</option>
                                          <option value="Ulangan Harian">Ulangan Harian</option>
                                          <option value="UAS">UAS</option>
                                        <?php }elseif(null !== $mute_uas && null == $mute_mid){?>
                                          <option value="Tugas">Tugas</option>
                                          <option value="Ulangan Harian">Ulangan Harian</option>
                                          <option value="MID">MID</option>
                                        <?php }elseif(null !== $mute_mid && null !== $mute_uas){?>
                                          <option value="Tugas">Tugas</option>
                                          <option value="Ulangan Harian">Ulangan Harian</option>
                                        <?php }?>
                                      </select> 
                                        <!-- <input type="text" class="form-control form-control-user" id="deskripsi" name="deskripsi" placeholder="Ex : Ulangan Harian 1 / UTS / Etc."> -->
                                        <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Submit Nilai
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- content here -->
    <div class="card shadow mb-4">
    	<div class="card-header py-3">
      		<h6 class="m-0 font-weight-bold text-primary">Kelola Nilai - <?= $siswa['name'] ?></h6>
    	</div>
        <div class="card-body">
          	<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              	<thead>
                	<tr>
                      <th width="5%">No</th>
                      <th>Deskripsi</th>
                    	<th>Nilai</th>
                    	<th width="10%">Action</th>
                	</tr>
              	</thead>
              	<tbody>
              		<?php
                        $no = 1;
                    foreach($nilai_harian as $niha):?>
                    	<tr>
                          <td><?= $no++;?></td>
                          <td><?= $niha['deskripsi']?></td>
                          <td><?= $niha['nilai']?></td>
                          <td class="text-center">
                              <a class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data ini?');" href="<?= site_url('guru_report/delete_detail_nilai/'.$niha['id_nilai_harian'])?>">Hapus</a>
                          </td>
                      </tr>
            		<?php endforeach;?>
              	</tbody>
            </table>

            <p>Nilai Rata-rata = <?= intval($rata_rata['AVG(nilai)'])?></p>
          </div>
        </div>
    </div>

    <!-- submit report -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Kirim Sebagai Report</h6>
      </div>
        <div class="card-body">
          <form class="user" method="post">
                  <input type="hidden" class="form-control form-control-user" name="id_siswa2" value="<?= $this->uri->segment(3);?>" >
                  <input type="hidden" name="kelas_sekarang" value="<?= $siswa['kelas_sekarang']?>">
                  <input type="hidden" name="id_wali_kelas" value="<?= $id_wake['id_wali_kelas']?>">
                  <input type="hidden" class="form-control form-control-user" name="id_guru2" value="<?= $this->session->userdata('id');?>" >
                  <input type="hidden" name="id_tahun2" value="<?= $tahun_aktif['id_tahun']?>">
                  <input type="hidden" class="form-control form-control-user" name="id_mapel2" value="<?= $id_mapel['id_mapel'];?>" >
              <div class="form-group">
                  <p>Nilai Akhir</p>
                  <p class="text-left mb-4 mt-4" style="font-size: 55px"><b><?= intval($rata_rata['AVG(nilai)'])?></b></p>
                  <input type="hidden" class="form-control form-control-user" id="nilai_akhir" name="nilai_akhir" value="<?= $rata_rata['AVG(nilai)']?>">
                  <?= form_error('nilai_akhir', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <?php if($mute_submit_report != NULL){?>
                  <div class="form-group">
                      <label>Kelompok Mapel</label>
                      <h4>
                          <strong> Kelompok  <?= $mute_submit_report[0]['kelompok']; ?> </strong>
                      </h4>
                  </div>
                  <div class="form-group">
                      <label>Keterangan / Catatan dari Guru</label>
                      <h4>
                         <strong> <?= $mute_submit_report[0]['deskripsi']; ?> </strong>
                      </h4>
                  </div>
              <?php }else{?>
                  <div class="form-group">
                      <label>Kelompok Mapel</label>
                      <select class="form-control" id='kelompok' name="kelompok">
                          <option value="A">A (Umum)</option>
                          <option value="B">B (Umum)</option>
                          <option value="C">C (Peminatan)</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Keterangan / Catatan dari Guru</label>
                      <textarea required class="form-control" id="deskripsi2" name="deskripsi2" placeholder="Deskripsi"></textarea>
                      <?= form_error('deskripsi2', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
              <?php }?>
              <?php if($mute_submit_report != NULL){?>
              <button name="submit_report" class="btn btn-secondary btn-user btn-block" disabled>
                  Sudah Submit
              </button>
            <?php }else{?>
              <button name="submit_report" class="btn btn-primary btn-user btn-block">
                  Submit
              </button>
            <?php }?>
          </form>
        </div>
    </div>

    <!-- <?= var_dump($mute_submit_report)?> -->

<!-- <?=var_dump($mute_mid)?> -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
