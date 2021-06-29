<?= $this->session->flashdata('message'); ?><!-- Begin Page Content -->
<div class="container-fluid">

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
                      <th>Hari / Tanggal</th>
                      <th>Nama Mapel</th>
                      <th>Subjek Tugas Ujian</th>
                      <th>Soal</th>
                      <th>Waktu Mulai</th>
                      <th>Waktu Selesai</th>
                      <th>Pertemuan</th>
                      <th>Upload Jawaban</th>
                      <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($values as $val):?>
                      <tr>
                          <td><?= $val['hari_tugas_ujian'].' / '.$val['tanggal_tugas_ujian']?></td>
                          <td><?= $val['mapel']?></td>
                          <td><?= $val['subjek_tugas_ujian']?></td>
                          <td><a class="btn btn-primary" href="<?= site_url('upload/tugas_ujian/'.$val['file_tugas_ujian'])?>">Download</a></td>
                          <td><?= $val['waktu_mulai']?></td>
                          <td><?= $val['waktu_selesai']?></td>
                          <td><?= $val['pertemuan_tugas_ujian']?></td>
                          <td><?= $val['keterangan_tugas_ujian']?></td>

                          <td> <?php if(isset($val['id_siswa'])){?>
                            <a class="btn btn-primary" href="<?= base_url('upload/tugas_ujian/'.$val['file_tugas'])?>">Lihat</a>
                            <a class="btn btn-primary" href="<?= site_url('siswa/edit_tugas_ujian/'.$val['id_upload_tugas'])?>"> <i class="fas fa-edit"></i> Ubah jawaban saya </a>
                          <?php }else{?>
                            <a href="<?= site_url('siswa/upload_tugas_ujian/'.$val['id_tgs'])?>" class="btn btn-small"><i class="fas fa-plus"></i></a>
                          <?php }?>
                          </td>
                      </tr>
                <?php endforeach;?>
                </tbody>
            </table>
          </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->