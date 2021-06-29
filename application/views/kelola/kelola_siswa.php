<?= $this->session->flashdata('message'); ?><!-- Begin Page Content -->
<div class="container-fluid">
  <p>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      Tambah Siswa
    </button>
  </p>

  <!-- Outer Row -->
    <div class="row justify-content-center collapse" id="collapseExample">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900">Tambah Siswa</h1>
                                </div>

                                <form class="user" method="post" action="<?= base_url('kelola/add_siswa/'); ?>">
                                    <div class="form-group">
                                        <label>Nomor Induk Siswa</label>                                        
                                        <input type="text" class="form-control form-control-user" id="nis" name="nis" placeholder="Nomor Induk Siswa" required="">
                                        <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">    
                                        <label>Nomor Induk Siswa Nasional</label>                                    
                                        <input type="text" class="form-control form-control-user" id="nisn" name="nisn" placeholder="Nomor Induk Siswa Nasional" required="">
                                        <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Nama Siswa</label>                                       
                                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Siswa" required="">
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Tempat Lahir</label>                                       
                                        <input type="text" class="form-control form-control-user" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" required="">
                                        <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>                                        
                                        <input type="date" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir" required="" >
                                        <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                      <select class="form-control" id='jenis_kelamin' name="jenis_kelamin">
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                      </select>
                                    </div>
                                    <div class="form-group">                                        
                                        <label>Kelas Sekarang :</label>
                                        <select class="form-control" id="kelas_sekarang" name="kelas_sekarang">
                                            <?php foreach($dd_kelas as $kel):?>
                                                <option value="<?= $kel['id_kelas']?>"><?= $kel['kelas']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_wali_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <!-- <div class="form-group">                                        
                                        <input type="text" class="form-control form-control-user" id="kelas_sekarang" name="kelas_sekarang" placeholder="sekarang kelas">
                                        <?= form_error('kelas_sekarang', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div> -->
                                    <div class="form-group">     
                                        <label>Wali Kelas</label>                                   
                                        <!-- <input type="text" class="form-control form-control-user" id="id_wali_kelas" name="id_wali_kelas" placeholder="Wali_kelas"> -->
                                        <select class="form-control" id="id_wali_kelas" name="id_wali_kelas">
                                            <?php foreach($dd_wali_kelas as $wal):?>
                                                <option value="<?= $wal['id']?>"><?= $wal['name']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_wali_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Agama</label>                                       
                                        <select class="form-control" id="id_agama" name="id_agama">
                                            <?php foreach($dd_agama as $aga):?>
                                                <option value="<?= $aga['id_agama']?>"><?= $aga['agama']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_wali_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <!-- <input type="text" class="form-control form-control-user" id="agama" name="agama" placeholder="agama">
                                        <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?> -->
                                    </div>
                                    <div class="form-group"> 
                                        <label>Status Anak</label>                                       
                                        <input type="text" class="form-control form-control-user" id="status" name="status" placeholder="status anak" required="">
                                        <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">  
                                        <label>Anak ke</label>                                      
                                        <input type="text" class="form-control form-control-user" id="anak_ke" name="anak_ke" placeholder="Anak ke - " required="">
                                        <?= form_error('anak_ke', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Alamat Siswa</label>                                       
                                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat Siswa" required="">
                                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Telepon</label>                                        
                                        <input type="text" class="form-control form-control-user" id="phone" name="phone" placeholder="Telepon" required="">
                                        <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Asal Sekolah</label>                                        
                                        <input type="text" class="form-control form-control-user" id="sekolah_asal" name="sekolah_asal" placeholder="Asal Sekolah" required="">
                                        <?= form_error('sekolah_asal', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Diterima di kelas :</label>                                        
                                        <!-- <input type="text" class="form-control form-control-user" id="id_wali_kelas" name="id_wali_kelas" placeholder="Wali_kelas"> -->
                                        <select class="form-control" id="di_kelas" name="di_kelas">
                                            <?php foreach($dd_kelas as $kel):?>
                                                <option value="<?= $kel['id_kelas']?>"><?= $kel['kelas']?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <?= form_error('id_wali_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <!-- <div class="form-group">                                        
                                        <input type="text" class="form-control form-control-user" id="di_kelas" name="di_kelas" placeholder="Di kelas">
                                        <?= form_error('di_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div> -->
                                    <div class="form-group">                                        
                                        <label>Tanggal Diterima</label>
                                        <input type="date" class="form-control form-control-user" id="tgl_diterima" name="tgl_diterima" placeholder="Tanggal Diterima" required="">
                                        <?= form_error('tgl_diterima', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Nama Ayah</label>                                       
                                        <input type="text" class="form-control form-control-user" id="nama_ayah" name="nama_ayah" placeholder="Nama Ayah" required="">
                                        <?= form_error('nama_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Nama Ibu</label>                                       
                                        <input type="text" class="form-control form-control-user" id="nama_ibu" name="nama_ibu" placeholder="Nama Ibu" required="">
                                        <?= form_error('nama_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Alamat Orang Tua</label>                                       
                                        <input type="text" class="form-control form-control-user" id="alamat_ortu" name="alamat_ortu" placeholder="Alamat Orang Tua" required="">
                                        <?= form_error('alamat_ortu', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Telepon Orang Tua</label>                                       
                                        <input type="text" class="form-control form-control-user" id="phone_ortu" name="phone_ortu" placeholder="Telepon Orang Tua" required="">
                                        <?= form_error('phone_ortu', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Kerja Ayah</label>                                        
                                        <input type="text" class="form-control form-control-user" id="kerja_ayah" name="kerja_ayah" placeholder="Kerja Ayah" required="">
                                        <?= form_error('kerja_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Kerja Ibu</label>                                        
                                        <input type="text" class="form-control form-control-user" id="kerja_ibu" name="kerja_ibu" placeholder="Kerja Ibu" required="">
                                        <?= form_error('kerja_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">  
                                        <label>Nama Wali</label>                                      
                                        <input type="text" class="form-control form-control-user" id="nama_wali" name="nama_wali" placeholder="Nama Wali" required="">
                                        <?= form_error('nama_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Alamat Wali</label>                                       
                                        <input type="text" class="form-control form-control-user" id="alamat_wali" name="alamat_wali" placeholder="Alamat Wali" required="">
                                        <?= form_error('alamat_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Telepon Wali</label>                                       
                                        <input type="number" class="form-control form-control-user" id="phone_wali" name="phone_wali" placeholder="Phone Wali" required="">
                                        <?= form_error('phone_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Kerja Wali</label>                                       
                                        <input type="text" class="form-control form-control-user" id="kerja_wali" name="kerja_wali" placeholder="Kerja Wali" required="">
                                        <?= form_error('kerja_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
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

<!-- <?= var_dump($siswa[0])?> -->
    <!-- content here -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?= $title?></h6>
      </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                      <th>NISN</th>
                      <th>Email Login</th>
                      <th>Nama Kelas</th>
                      <th>Nama Siswa</th>
                      <th>Jenis Kelamin</th>
                      <th>TTL</th>
                      <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($siswa as $sis):?>
                      <tr>
                          <td><?= $sis['nisn']?></td>
                          <td><?= $sis['email']?></td>
                          <td><?= $sis['kelas']?></td>
                          <td><?= $sis['name']?></td>
                          <td><?= $sis['jenis_kelamin']?></td>
                          <td><?= $sis['tempat_lahir'].', '.$sis['tanggal_lahir']?></td>
                          <td style="width: 18%">
                            <a href="<?= site_url('kelola/history_siswa/'.$sis['id'])?>" class="btn btn-small"><i class="fas fa-history"></i></a>
                            <a href="<?= site_url('kelola/update_siswa/'.$sis['id'])?>" class="btn btn-small"><i class="fas fa-edit"></i></a>
                            <a href="<?= site_url('kelola/lihat/'.$sis['id'])?>" class="btn btn-small"><i class="fas fa-eye"></i></a> 
                            <!-- <a href="<?= site_url('kelola/delete/'.$sis['id'])?>" class="btn btn-small"><i class="fas fa-trash"></i></a> -->
                            <a href="<?php echo site_url('kelola/delete/'.$sis['id']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ini?');" class="btn btn-small" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
                          </td>
                      </tr>
                <?php endforeach;?>
                </tbody>
            </table>
          </div>
        </div>
    </div>
<!-- <?=var_dump($rata_rata)?> -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
