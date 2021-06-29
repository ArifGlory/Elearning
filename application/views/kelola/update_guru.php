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
                                    <h1 class="h4 text-gray-900">Update Guru</h1>
                                </div>

                                <form class="user" method="post">
                                    <div class="form-group">                                        
                                        <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap" value="<?= $guru['name']?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">                                        
                                        <input type="text" class="form-control form-control-user" id="nomor_induk" name="nomor_induk" placeholder="NIP" value="<?= $guru['nomor_induk']?>">
                                        <?= form_error('nomor_induk', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">                                        
                                        <select class="form-control" id="id_mapel" name="id_mapel">
                                            <?php foreach($dd_mapel as $map):?>
                                                <option value="<?= $map['id_mapel']?>" <?php if($map['id_mapel'] == $guru['id_mapel']){ echo 'selected';}?>><?= 'Guru '.$map['mapel']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">                                        
                                        <select class="form-control" id="role_id" name="role_id">
                                            <option value="2" <?php if($guru['role_id'] == 2){echo "selected";}?>>Guru</option>
                                            <option value="4" <?php if($guru['role_id'] == 4){echo "selected";}?>>Wali Kelas & Guru</option>
                                        </select>
                                    </div>
                                    <div class="form-group">                                        
                                        <input type="number" class="form-control form-control-user" id="phone" name="phone" placeholder="Telepon" value="<?= $guru['phone']?>">
                                        <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    
                                    <button name="update_guru" type="submit" class="btn btn-primary btn-user btn-block">
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