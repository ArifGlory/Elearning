<?= $this->session->flashdata('message'); ?><!-- Begin Page Content -->
<div class="container-fluid">

  <?= var_dump($value)?>

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
                                    <h1 class="h4 text-gray-900">Update Tahun Ajaran</h1>
                                </div>

                                <form class="user" method="post" action="<?= base_url('tahun/update/'.$this->uri->segment(3)); ?>">
                                    <div class="form-group">
                                        <input type="hidden" name="id_tahun" value="<?= $this->uri->segment(3)?>">
                                        <input type="text" class="form-control form-control-user" id="tahun" name="tahun" value="<?= $value['tahun']?>">
                                        <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
