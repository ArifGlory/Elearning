<?= $this->session->flashdata('message'); ?>
<div class="container-fluid">

  <?php 

    date_default_timezone_set("Asia/Jakarta");
    $sekarang = date("H:i:s");
    if($sekarang<$val['mulai']){ 
      echo "<p class='btn btn-warning'>Waktu absensi belum tiba</p>";
    }elseif($sekarang>$val['selesai']){
      if(null !== $value['id_isi_absensi']){
        echo "<p class='btn btn-success'>Anda sudah melakukan absensi & waktu sudah berakhir</p>";
      }elseif(null == $value['id_isi_absensi']){
        echo "<p class='btn btn-danger'>Anda belum melakukan absensi & waktu sudah berakhir</p>";
      }else{
      echo "<p class='btn btn-danger'>Waktu absensi sudah berakhir</p>";
      }
    }elseif(null !== $value['id_isi_absensi']){
      echo "<p class='btn btn-success'>Anda sudah melakukan absensi</p>";
    }elseif($sekarang >= $val['mulai'] && $sekarang<=$val['selesai']){?>
      <?php $id_absensi = $this->uri->segment(3);?>
      <a href="<?= site_url('siswa/tambah_absensi/'.$id_absensi)?>" class="btn btn-primary mb-2">Tambah absensi</a>
    <?php }?>

    <!-- content here -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?= $title?></h6>
      </div>
        <div class="card-body">
            <p><?= $val['tanggal_absensi'].' / Mapel : '. $val['mapel'].' / Kelas : '.$val['kelas'].' / Pertemuan : '.$val['pertemuan_ke']?></p>
            <p>Waktu mulai : <?= $val['mulai']?></p>
            <p>Waktu saat ini : <?= date("H:i:s")?></p>
            <p>Waktu selesai : <?= $val['selesai']?></p>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                          <th>Status Absensi</th>
                          <th>Keterangan</th>
                          <th>Input Absensi Pada</th>
                          <th>Surat Izin</th>
                          <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php if(isset($value['id_isi_absensi'])){?>
                          <td><?= $value['status']?></td>
                          <td><?= $value['keterangan_isi_absensi']?></td>
                          <td>
                                <?php echo date( 'j F, Y H:i:s', strtotime($value['waktu'])); ?>
                          </td>
                          <td><?php if(null !== $value['file']){ ?>
                            <a class="btn btn-primary" href="<?= site_url('upload/surat_izin/'.$value['file'])?>"><?= $value['file']?></a>
                           <?php }else{ echo "";}?></td>
                          <td><a href="<?= site_url('siswa/update_absensi/'.$value['id_isi_absensi'].'/'.$value['id_absensi'])?>" class="btn btn-small"><i class="fas fa-edit"></i></a></td>
                        <?php }else{?>
                          <td colspan="3" class="text-center">Tidak ada data</td>
                        <?php }?>
                      </tr>
                    </tbody>
                </table>
              </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
