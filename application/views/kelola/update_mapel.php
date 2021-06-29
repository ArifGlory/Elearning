<?= $this->session->flashdata('message'); ?>  <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900">Update Mapel</h1>
                                </div>

                                <form class="user" method="post">
                                    <div class="form-group">                                        
                                        <input type="text" class="form-control form-control-user" id="mapel" name="mapel" placeholder="Mapel" value="<?= $mapel['mapel']?>">
                                        <?= form_error('mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">                                        
                                        <input type="number" class="form-control form-control-user" id="jumlah_pertemuan" name="jumlah_pertemuan" placeholder="Jumlah Pertemuan" value="<?= $mapel['jumlah_pertemuan']?>">
                                        <?= form_error('mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">                                        
                                        <input type="text" class="form-control form-control-user" id="kelompok" name="kelompok" placeholder="Kelompok" value="<?= $mapel['kelompok']?>">
                                        <?= form_error('kelompok', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button name="update_mapel" type="submit" class="btn btn-primary btn-user btn-block">
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