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
                                    <h1 class="h4 text-gray-900">Update Kelas</h1>
                                </div>

                                <form class="user" method="post">
                                    <div class="form-group">                                        
                                        <input type="text" class="form-control form-control-user" id="kelas" name="kelas" placeholder="Kelas" value="<?= $kelas['kelas']?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <!-- <div class="form-group">                                        
                                        <input type="text" class="form-control form-control-user" id="id_wali_kelas" name="id_wali_kelas" placeholder="Wali Kelas" value="<?= $kelas['name']?>">
                                        <?= form_error('id_wali_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div> -->
                                    <div class="form-group">                                        
                                        <select class="form-control" id="id_wali_kelas" name="id_wali_kelas">
                                            <?php foreach($dd_wake as $wak):?>
                                                <option value="<?= $wak['id']?>" <?php if($wak['id'] == $kelas['id_wali_kelass']){ echo 'selected';}?>><?= $wak['name']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_wali_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button name="update_kelas" type="submit" class="btn btn-primary btn-user btn-block">
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