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
                                    <h1 class="h4 text-gray-900">Upload Jawaban</h1>
                                </div>

                                <form class="user" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                      <input type="hidden" name="id_tugas_ujian" value="<?= $this->uri->segment(3);?>">
                                        <label>Pilih File</label>
                                      <input type="file" class="form-control form-control-user" id="upload_jawaban_tugas_ujian" name="upload_jawaban_tugas_ujian">
                                        <?= form_error('upload_jawaban_tugas_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    
                                    <button name="submit_tugas_ujian" type="submit" class="btn btn-primary btn-user btn-block">
                                        next
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