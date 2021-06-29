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
                                    <h1 class="h4 text-gray-900">Ubah upload jawaban tugas</h1>
                                </div>

                                <form action="<?= site_url('siswa/update_tugas_ujian/')?>" class="user" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                      <input type="hidden" name="id_upload_tugas" value="<?= $values['id_upload_tugas'];?>">
                                        <label>Pilih File</label>
                                      <input type="file" class="form-control form-control-user" id="upload_jawaban_tugas_ujian" name="upload_jawaban_tugas_ujian">
                                        <?= form_error('upload_jawaban_tugas_ujian', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Ubah jawaban tugas
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