<?= $this->session->flashdata('message'); ?><!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900">Input Absensi</h1>
                                </div>
                                <form class="user" method="post">
                                  <input type="hidden" name="id_absensi" value="<?php echo $this->uri->segment(3)?>">
                                    <div class="form-group">                                        
                                        <select class="form-control" id="id_status" name="id_status">
                                            <option value="1">Tidak Hadir</option>
                                            <option value="2">Hadir</option>
                                            <option value="3">izin</option>
                                        </select>
                                        <?= form_error('id_status', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <textarea id="keterangan_absensi" name="keterangan_absensi" class="form-control" placeholder="Keterangan (Optional)"></textarea>
                                    </div>
                                    <button name="submit_absensi_siswa" type="submit" class="btn btn-primary btn-user btn-block">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


