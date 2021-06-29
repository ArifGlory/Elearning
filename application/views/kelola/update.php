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
                                    <h1 class="h4 text-gray-900">Update Siswa</h1>
                                </div>

                                <form class="user" method="post">
                                    <div class="form-group">  
                                        <label>NIS</label>                                      
                                        <input type="text" class="form-control form-control-user" id="nis" name="nis" value="<?= $siswa['nomor_induk']?>">
                                        <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">                                        
                                        <label>NISN</label>
                                        <input type="text" class="form-control form-control-user" id="nisn" name="nisn" value="<?= $siswa['nisn']?>">
                                        <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>                                        
                                        <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= $siswa['name']?>">
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>                                        
                                        <input type="text" class="form-control form-control-user" id="tempat_lahir" name="tempat_lahir" value="<?= $siswa['tempat_lahir']?>">
                                        <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>             
                                        <input type="date" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir" value="<?= date('Y-m-d', strtotime($siswa['tanggal_lahir'])) ?>" >
                                        <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                      <select class="form-control" id='jenis_kelamin' name="jenis_kelamin">
                                        <option value="">---Pilih Jenis Kelamin---</option>
                                        <option value="L" <?php if($siswa['jenis_kelamin'] == 'L'){ echo "selected";}?> >Laki-laki</option>
                                        <option value="P" <?php if($siswa['jenis_kelamin'] == 'P'){ echo "selected";}?> >Perempuan</option>
                                      </select>
                                    </div>
                                    <div class="form-group">  
                                        <label>Sekarang Kelas</label>                                      
                                        <select class="form-control" id='kelas_sekarang' name="kelas_sekarang">
                                            <option value="">---Pilih kelas sekarang---</option>
                                            <?php foreach($kelas as $kel):?>

                                                <option value="<?= $kel['id_kelas']?>" <?php if($kel['id_kelas']==$siswa['kelas_sekarang']){ echo 'selected';}?>><?= $kel['kelas']?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group">  
                                        <label>Agama</label>                                      
                                        <select class="form-control" id='id_agama' name="id_agama">
                                                <option value="">---Pilih Agama---</option>
                                            <?php foreach($dd_agama as $aga):?>
                                                <option value="<?= $aga['id_agama']?>" <?php if($aga['id_agama']==$siswa['agama']){ echo 'selected';}?>><?= $aga['agama']?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>                                        
                                        <input type="text" class="form-control form-control-user" id="status" name="status" value="<?= $siswa['status']?>">
                                        <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">  
                                        <label>Anak ke - </label>                                      
                                        <input type="text" class="form-control form-control-user" id="anak_ke" name="anak_ke" value="<?= $siswa['anak_ke']?>">
                                        <?= form_error('anak_ke', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Alamat</label>                                       
                                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?= $siswa['alamat']?>">
                                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">  
                                        <label>Telepon</label>                                      
                                        <input type="text" class="form-control form-control-user" id="phone" name="phone" value="<?= $siswa['phone']?>">
                                        <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Sekolah Asal</label>                                        
                                        <input type="text" class="form-control form-control-user" id="sekolah_asal" name="sekolah_asal" value="<?= $siswa['sekolah_asal']?>">
                                        <?= form_error('sekolah_asal', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Di Kelas</label>          
                                        <select class="form-control" id='id_kelas' name="di_kelas">
                                                <option value="">---Pilih kelas---</option>
                                            <?php foreach($kelas as $kel):?>
                                                    <option value="<?= $kel['id_kelas']?>" <?php if($kel['id_kelas']==$siswa['di_kelas']){ echo 'selected';}?>><?= $kel['kelas']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <!-- <input type="text" class="form-control form-control-user" id="di_kelas" name="di_kelas" value="<?= $siswa['di_kelas']?>">
                                        <?= form_error('di_kelas', '<small class="text-danger pl-3">', '</small>'); ?> -->
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Diterima</label>                                        
                                        <input type="date" class="form-control form-control-user" id="tgl_diterima" name="tgl_diterima" value="<?= date('Y-m-d', strtotime($siswa['tgl_diterima'])) ?>">
                                        <?= form_error('tgl_diterima', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Ayah</label>                                        
                                        <input type="text" class="form-control form-control-user" id="nama_ayah" name="nama_ayah" value="<?= $siswa['nama_ayah']?>">
                                        <?= form_error('nama_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Ibu</label>                                        
                                        <input type="text" class="form-control form-control-user" id="nama_ibu" name="nama_ibu" value="<?= $siswa['nama_ibuk']?>">
                                        <?= form_error('nama_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Ortu</label>                                        
                                        <input type="text" class="form-control form-control-user" id="alamat_ortu" name="alamat_ortu" value="<?= $siswa['alamat_ortu']?>">
                                        <?= form_error('alamat_ortu', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Ortu</label>                                        
                                        <input type="text" class="form-control form-control-user" id="phone_ortu" name="phone_ortu" value="<?= $siswa['phone_ortu']?>">
                                        <?= form_error('phone_ortu', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Kerja Ayah</label>                                        
                                        <input type="text" class="form-control form-control-user" id="kerja_ayah" name="kerja_ayah" value="<?= $siswa['kerja_ayah']?>">
                                        <?= form_error('kerja_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Kerja Ibu</label>                                        
                                        <input type="text" class="form-control form-control-user" id="kerja_ibu" name="kerja_ibu" value="<?= $siswa['kerja_ibu']?>">
                                        <?= form_error('kerja_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Wali</label>                                        
                                        <input type="text" class="form-control form-control-user" id="nama_wali" name="nama_wali" value="<?= $siswa['nama_wali']?>">
                                        <?= form_error('nama_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Alamat Wali</label>                                       
                                        <input type="text" class="form-control form-control-user" id="alamat_wali" name="alamat_wali" value="<?= $siswa['alamat_wali']?>">
                                        <?= form_error('alamat_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Wali</label>                                        
                                        <input type="number" class="form-control form-control-user" id="phone_wali" name="phone_wali" value="<?= $siswa['phone_wali']?>">
                                        <?= form_error('phone_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Kerja Wali</label>                                        
                                        <input type="text" class="form-control form-control-user" id="kerja_wali" name="kerja_wali" value="<?= $siswa['kerja_wali']?>">
                                        <?= form_error('kerja_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div> 
                                    <button name="update_siswaaa" class="btn btn-primary btn-user btn-block">
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
<!-- 
<?= var_dump($siswa)?> -->