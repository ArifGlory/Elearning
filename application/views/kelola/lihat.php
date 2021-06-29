<?= $this->session->flashdata('message'); ?><!-- Begin Page Content -->
<div class="container-fluid">

    <!-- content here -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?= 'Data Siswa'?></h6>
      </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">Nama Lengkap</div>
                <div class="col-md-8"><?= $siswa['name']?></div>

                <div class="col-md-4">NIS / NISN</div>
                <div class="col-md-8"><?= $siswa['nomor_induk'].' / '.$siswa['nisn']?></div>

                <div class="col-md-4">Sekarang Kelas</div>
                <div class="col-md-8"><?= $kelas_sekarang['kelas']?></div>

                <div class="col-md-4">Wali Kelas</div>
                <div class="col-md-8"><?= $wali_kelas['name']?></div>

                <div class="col-md-4">Tempat Lahir</div>
                <div class="col-md-8"><?= $siswa['tempat_lahir']?></div>

                <div class="col-md-4">Tanggal Lahir</div>
                <div class="col-md-8"><?= $siswa['tanggal_lahir']?></div>

                <div class="col-md-4">Jenis Kelamin</div>
                <div class="col-md-8"><?= $siswa['jenis_kelamin']?></div>

                <div class="col-md-4">Agama</div>
                <div class="col-md-8"><?= $siswa['agama']?></div>

                <div class="col-md-4">Status</div>
                <div class="col-md-8"><?= $siswa['status']?></div>

                <div class="col-md-4">Anak Ke</div>
                <div class="col-md-8"><?= $siswa['anak_ke']?></div>

                <div class="col-md-4">Alamat</div>
                <div class="col-md-8"><?= $siswa['alamat']?></div>

                <div class="col-md-4">Phone 1</div>
                <div class="col-md-8"><?= $siswa['phone']?></div>

                <div class="col-md-4">Sekolah Asal</div>
                <div class="col-md-8"><?= $siswa['sekolah_asal']?></div>

                <div class="col-md-4">Di Kelas</div>
                <div class="col-md-8"><?= $siswa['kelas']?></div>

                <div class="col-md-4">Tgl Diterima</div>
                <div class="col-md-8"><?= $siswa['tgl_diterima']?></div>

                <div class="col-md-4">Nama Ayah</div>
                <div class="col-md-8"><?= $siswa['nama_ayah']?></div>

                <div class="col-md-4">Nama Ibu</div>
                <div class="col-md-8"><?= $siswa['nama_ibuk']?></div>

                <div class="col-md-4">Alamat Ortu</div>
                <div class="col-md-8"><?= $siswa['alamat_ortu']?></div>

                <div class="col-md-4">Phone Ortu</div>
                <div class="col-md-8"><?= $siswa['phone_ortu']?></div>

                <div class="col-md-4">Kerja Ayah</div>
                <div class="col-md-8"><?= $siswa['kerja_ayah']?></div>

                <div class="col-md-4">Kerja Ibu</div>
                <div class="col-md-8"><?= $siswa['kerja_ibu']?></div>

                <div class="col-md-4">Nama Wali</div>
                <div class="col-md-8"><?= $siswa['nama_wali']?></div>

                <div class="col-md-4">Alamat Wali</div>
                <div class="col-md-8"><?= $siswa['alamat_wali']?></div>

                <div class="col-md-4">Phone Wali</div>
                <div class="col-md-8"><?= $siswa['phone_wali']?></div>

                <div class="col-md-4">Kerja Wali</div>
                <div class="col-md-8"><?= $siswa['kerja_wali']?></div>
            </div>
            <div class="text-center mt-5">
                <a class="btn btn-warning" style="color: black" href="<?= site_url('kelola/update_siswa/'.$siswa['id'])?>"><i>Update Data</i></a>
                <a class="btn btn-danger" style="color: black" href="<?= site_url('kelola/changePassword/'.$siswa['id'])?>"><i>Reset Password</i></a>
            </div>
        </div>
    </div>
<!-- <?=var_dump($rata_rata)?> -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
