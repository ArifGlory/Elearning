<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
/**
 * 
 */
class Siswa extends CI_Controller
{
    var $tahunAktif = "";
	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();

        $tahun =  $this->db->get_where('tahun',['is_active' => 1])->row_array();
        $this->tahunAktif = $tahun['id_tahun'];
    }

    public function index()
    {
    	//here
    	$data['title'] = 'Tahun Ajaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['all_tahun'] = $this->db->query("SELECT * FROM tahun")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tahun/index', $data);
        $this->load->view('templates/footer');
    }

    function report()
    {
        //here
        $data['title'] = 'Report';

        $id_siswa = $this->session->userdata('id');

        $this->db->select('*');
        $this->db->from("user");
        $this->db->join('kelas', 'user.kelas_sekarang = kelas.id_kelas');
        $this->db->where('user.id',$id_siswa);
        $data['user'] = $this->db->get();
        $data['user'] = $data['user']->result_array()[0];


        $data['tahun'] = $this->db->query("SELECT * FROM tahun ORDER BY id_tahun DESC")->result_array();
        $tahun_aktif = $this->db->query("SELECT id_tahun FROM tahun WHERE is_active=1")->row_array();
        $id_siswa = $this->session->userdata('id');

        $data['kelas_sekarang'] = $this->db->query("SELECT kelas_sekarang FROM user where  id =".intval($id_siswa))->row_array();

        /*$data['val'] = $this->db->query("SELECT * FROM nilai
INNER JOIN user ON nilai.id_siswa = user.id 
INNER JOIN tahun ON tahun.id_tahun = nilai.id_tahun INNER JOIN kelas ON nilai.id_kelas=kelas.id_kelas WHERE id_siswa = $id_siswa AND nilai.id_tahun =".intval($tahun_aktif['id_tahun']))->row_array();*/

        $kelas_sekarang = $data['kelas_sekarang']['kelas_sekarang'];

        $data['nilai_A'] = $this->db->query("SELECT * FROM nilai 
INNER JOIN mapel ON nilai.mapel = mapel.id_mapel 
WHERE nilai.kelompok = 'A' 
AND id_siswa = $id_siswa  
AND id_kelas = $kelas_sekarang  
AND id_tahun =".intval($tahun_aktif['id_tahun']))->result_array();

        $data['nilai_B'] = $this->db->query("SELECT * FROM nilai INNER JOIN mapel 
ON nilai.mapel = mapel.id_mapel WHERE nilai.kelompok = 'B' 
AND id_siswa = $id_siswa  
AND id_kelas = $kelas_sekarang  
AND id_tahun = ".intval($tahun_aktif['id_tahun']))->result_array();

        $data['nilai_C'] = $this->db->query("SELECT * FROM nilai 
INNER JOIN mapel ON nilai.mapel = mapel.id_mapel
  WHERE nilai.kelompok = 'C' 
  AND id_siswa = $id_siswa  
  AND id_kelas = $kelas_sekarang
  AND id_tahun =".intval($tahun_aktif['id_tahun']))->result_array();

        $id_wali_kelas = $this->db->query("SELECT id_wali_kelas FROM nilai WHERE id_siswa = $id_siswa")->row_array();
        $data['wali_kelas'] = $this->db->query("SELECT * FROM user WHERE id =".intval($id_wali_kelas['id_wali_kelas']))->row_array();
        $data['par_tahun']= $tahun_aktif['id_tahun'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/report', $data);
        $this->load->view('templates/footer');
    }

    function report_tahun($tahun)
    {
        //here
        $data['title'] = 'Report';
        $this->db->select('*');
        $this->db->from("user");
        $this->db->join('kelas', 'user.kelas_sekarang = kelas.id_kelas');
        $this->db->where('user.email',$this->session->userdata('email'));
        $data['user'] = $this->db->get();
        $data['user'] = $data['user']->result_array()[0];

        $id_siswa = $this->session->userdata('id');
        $data['tahun_ajar'] = $this->db->get_where('tahun',array('id_tahun'=>$tahun))->result_array()[0];
        $data['tahun_ajar'] = $data['tahun_ajar']['tahun'];

        $data['kelas_sekarang'] = $this->db->query("SELECT kelas_sekarang FROM user where  id =".intval($id_siswa))->row_array();
        $kelas_sekarang = $data['kelas_sekarang']['kelas_sekarang'];

        $data['tahun'] = $this->db->query("SELECT * FROM tahun ORDER BY id_tahun DESC")->result_array();
        $data['val'] = $this->db->query("SELECT * FROM nilai INNER JOIN user ON nilai.id_siswa = user.id INNER JOIN tahun ON tahun.id_tahun = nilai.id_tahun INNER JOIN kelas ON nilai.id_kelas=kelas.id_kelas WHERE id_siswa = $id_siswa AND nilai.id_tahun = $tahun")->row_array();

        $nilai_saat_dikelas = "-";
        $data['nilai_A'] = $this->db->query("SELECT * FROM nilai 
INNER JOIN mapel ON nilai.mapel = mapel.id_mapel
 WHERE nilai.kelompok = 'A'
  AND id_siswa = $id_siswa  
   AND id_tahun = $tahun")->result_array();
        if ($data['nilai_A'] != null){
            $kelas =  $this->db->get_where('kelas',array('id_kelas'=>$data['nilai_A'][0]['id_kelas']))->result_array()[0];
            $nilai_saat_dikelas = $kelas['kelas'];
        }

        $data['nilai_B'] = $this->db->query("SELECT * FROM nilai 
INNER JOIN mapel ON nilai.mapel = mapel.id_mapel
 WHERE nilai.kelompok = 'B' 
 AND id_siswa = $id_siswa 
  AND id_tahun = $tahun")->result_array();
        if ($data['nilai_B'] != null){
            $kelas =  $this->db->get_where('kelas',array('id_kelas'=>$data['nilai_B'][0]['id_kelas']))->result_array()[0];
            $nilai_saat_dikelas = $kelas['kelas'];
        }

        $data['nilai_C'] = $this->db->query("SELECT * FROM nilai 
INNER JOIN mapel ON nilai.mapel = mapel.id_mapel
 WHERE nilai.kelompok = 'C'
  AND id_siswa = $id_siswa  
   AND id_tahun = $tahun")->result_array();
        if ($data['nilai_C'] != null){
            $kelas =  $this->db->get_where('kelas',array('id_kelas'=>$data['nilai_C'][0]['id_kelas']))->result_array()[0];
            $nilai_saat_dikelas = $kelas['kelas'];
        }

        $id_wali_kelas = $this->db->query("SELECT id_wali_kelas FROM nilai WHERE id_siswa = $id_siswa")->row_array();
        $data['wali_kelas'] = $this->db->query("SELECT * FROM user WHERE id =".intval($id_wali_kelas['id_wali_kelas']))->row_array();
        $data['par_tahun']= $tahun;
        $data['nilai_saat_dikelas'] = $nilai_saat_dikelas;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/report_tahun', $data);
        $this->load->view('templates/footer');
    }

    function cetak_report($tahun)
    {
        //here
        $data['title'] = 'Report';
        $this->db->select('*');
        $this->db->from("user");
        $this->db->join('kelas', 'user.kelas_sekarang = kelas.id_kelas');
        $this->db->where('user.email',$this->session->userdata('email'));
        $data['user'] = $this->db->get();
        $data['user'] = $data['user']->result_array()[0];

        $id_siswa = $this->session->userdata('id');

        $data['tahun_ajar'] = $this->db->get_where('tahun',array('id_tahun'=>$tahun))->result_array()[0];
        $data['tahun_ajar'] = $data['tahun_ajar']['tahun'];

        $data['kelas_sekarang'] = $this->db->query("SELECT kelas_sekarang FROM user where  id =".intval($id_siswa))->row_array();
        $kelas_sekarang = $data['kelas_sekarang']['kelas_sekarang'];

        $id_siswa = $this->session->userdata('id');
        $data['tahun'] = $this->db->query("SELECT * FROM tahun ORDER BY id_tahun DESC")->result_array();
        $data['val'] = $this->db->query("SELECT * FROM nilai INNER JOIN user ON nilai.id_siswa = user.id INNER JOIN tahun ON tahun.id_tahun = nilai.id_tahun INNER JOIN kelas ON nilai.id_kelas=kelas.id_kelas WHERE id_siswa = $id_siswa AND nilai.id_tahun = $tahun")->row_array();

        $data['nilai_A'] = $this->db->query("SELECT * FROM nilai 
INNER JOIN mapel ON nilai.mapel = mapel.id_mapel
 WHERE nilai.kelompok = 'A' 
 AND id_siswa = $id_siswa
 AND id_kelas = $kelas_sekarang 
   AND id_tahun = $tahun")->result_array();

        $data['nilai_B'] = $this->db->query("SELECT * FROM nilai 
INNER JOIN mapel ON nilai.mapel = mapel.id_mapel 
WHERE nilai.kelompok = 'B'
 AND id_siswa = $id_siswa
 AND id_kelas = $kelas_sekarang 
   AND id_tahun = $tahun")->result_array();

        $data['nilai_C'] = $this->db->query("SELECT * FROM nilai 
INNER JOIN mapel ON nilai.mapel = mapel.id_mapel
 WHERE nilai.kelompok = 'C'
  AND id_siswa = $id_siswa 
  AND id_kelas = $kelas_sekarang 
   AND id_tahun = $tahun")->result_array();
        $id_wali_kelas = $this->db->query("SELECT id_wali_kelas FROM nilai WHERE id_siswa = $id_siswa")->row_array();
        $data['wali_kelas'] = $this->db->query("SELECT * FROM user WHERE id =".intval($id_wali_kelas['id_wali_kelas']))->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('siswa/cetak_report', $data);
    }

    function kalender_kelas()
    {
        $data['title'] = 'Kalender Kelas';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_saya = $this->session->userdata('id');
        $kelas_saya = $this->db->query("SELECT kelas_sekarang FROM user WHERE id = $id_saya ")->row_array();
        $data['value'] = $this->db->query("SELECT * FROM kalender_kelas 
INNER JOIN kelas ON kalender_kelas.id_kelas = kelas.id_kelas 
INNER JOIN mapel ON mapel.id_mapel = kalender_kelas.id_mapel 
INNER JOIN user ON kalender_kelas.id_guru = user.id
WHERE kalender_kelas.id_tahun = $this->tahunAktif
 AND kalender_kelas.id_kelas = ".intval($kelas_saya['kelas_sekarang']))->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/kalender_kelas', $data);
        $this->load->view('templates/footer');
    }

    function kelas_online()
    {
        //here
        $data['title'] = 'Kelas Online';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_saya = $this->session->userdata('id');
        $kelas_saya = $this->db->query("SELECT kelas_sekarang FROM user WHERE id = $id_saya ")->row_array();
        $data['var'] = $this->db->query("SELECT * FROM kelas_online 
INNER JOIN kelas ON kelas_online.id_kelas = kelas.id_kelas 
INNER JOIN mapel ON kelas_online.id_mapel = mapel.id_mapel 
INNER JOIN tahun ON kelas_online.id_tahun = tahun.id_tahun
 INNER JOIN user ON kelas_online.id_guru = user.id 
 WHERE kelas_online.id_tahun = $this->tahunAktif
 AND kelas_online.id_kelas =".intval($kelas_saya['kelas_sekarang']))->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/kelas_online', $data);
        $this->load->view('templates/footer');
    }

    function jadwal_vicon()
    {
        //here
        $data['title'] = 'Jadwal Vicon';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 
        $id_saya = $this->session->userdata('id');
        $kelas_saya = $this->db->query("SELECT kelas_sekarang FROM user WHERE id = $id_saya ")->row_array();      
        $data['values'] = $this->db->query("SELECT * FROM jadwal_vicon
 INNER JOIN kelas ON kelas.id_kelas = jadwal_vicon.id_kelas
   WHERE jadwal_vicon.id_tahun = $this->tahunAktif
  AND jadwal_vicon.id_kelas = ".intval($kelas_saya['kelas_sekarang']))->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/jadwal_vicon', $data);
        $this->load->view('templates/footer');

    }

    function input_absensi()
    {
        //here
        $data['title'] = 'Input Absensi';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 
        $id_saya = $this->session->userdata('id');
        $kelas_saya = $this->db->query("SELECT kelas_sekarang FROM user WHERE id = $id_saya ")->row_array();
        $data['values'] = $this->db->query("SELECT * FROM absensi 
INNER JOIN kelas ON kelas.id_kelas = absensi.id_kelas 
INNER JOIN mapel ON absensi.id_mapel=mapel.id_mapel
WHERE absensi.id_tahun = $this->tahunAktif 
AND absensi.id_kelas =".intval($kelas_saya['kelas_sekarang']))->result_array();

        // , (SELECT id_status FROM isi_absensi WHERE isi_absensi.id_absensi = absensi.id_absensi) as status, (SELECT keterangan_isi_absensi FROM isi_absensi WHERE isi_absensi.id_absensi=absensi.id_absensi) as keterangan, (SELECT id_isi_absensi FROM isi_absensi WHERE isi_absensi.id_absensi=absensi.id_absensi) as id_isi_absensi, (SELECT is_active FROM isi_absensi WHERE isi_absensi.id_absensi=absensi.id_absensi) as is_active

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/input_absensi', $data);
        $this->load->view('templates/footer');
    }

    function absensi($id)
    {
        //here
        $data['title'] = 'Input Absensi';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 
        $id_saya = $this->session->userdata('id');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/absensi', $data);
        $this->load->view('templates/footer');

    }

    function lihat_absensi($id)
    {
        //here
        $data['title'] = 'Input Absensi';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 
        $id_saya = $this->session->userdata('id');
        $data['val']= $this->db->query("SELECT * FROM absensi INNER JOIN kelas ON absensi.id_kelas=kelas.id_kelas INNER JOIN mapel ON absensi.id_mapel=mapel.id_mapel WHERE id_absensi = $id")->row_array();
        $data['value'] = $this->db->query("SELECT * FROM isi_absensi INNER JOIN status_absensi ON status_absensi.id_status = isi_absensi.id_status WHERE id_siswa = $id_saya AND id_absensi = $id")->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/lihat_absensi', $data);
        $this->load->view('templates/footer');

        // if (isset($_POST['submit_absensi_siswa'])) {
        //     # code...
        //     $id_absensi = $this->input->post('id_absensi');
        //     $id_status = $this->input->post('id_status');
        //     $id_saya = $this->session->userdata('id');
        //     $keterangan_absensi = $this->input->post('keterangan_absensi');
        //     $this->db->query("INSERT INTO isi_absensi SET id_absensi=$id_absensi, id_siswa =$id_saya, id_status = $id_status, keterangan_isi_absensi = '$keterangan_absensi', is_active=1");
        //     redirect('siswa/input_absensi/');
        // }
    }

    function tambah_absensi($id)
    {
        //here
        $data['title'] = 'Input Absensi';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 
        $id_saya = $this->session->userdata('id');
        $data['dd_status'] = $this->db->query("SELECT * FROM status_absensi")->result_array();
        $data['val']= $this->db->query("SELECT * FROM absensi INNER JOIN kelas ON absensi.id_kelas=kelas.id_kelas INNER JOIN mapel ON absensi.id_mapel=mapel.id_mapel WHERE id_absensi = $id")->row_array();
        $data['value']= $this->db->query("SELECT * FROM isi_absensi WHERE id_siswa = $id_saya")->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/tambah_absensi', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['tambah_absensi_siswa'])) {
            if (!empty($_FILES['file']['name'])) {
                # code...
                $img_name = str_replace(' ', '_', $_FILES['file']['name']);
                $config['upload_path'] = './upload/surat_izin/';
                $config['allowed_types'] = 'jpg|jpeg|png|pdf';
                $config['file_name'] = $img_name;
                $this->upload->initialize($config);
                $this->upload->do_upload('file');
            }else{
                $img_name = '';
            }
            $id_absensi = $this->input->post('id_absensi');
            $id_status = $this->input->post('id_status');
            $keterangan_absensi = $this->input->post('keterangan_absensi');
            $file = $img_name;

            $this->db->query("INSERT INTO isi_absensi SET 
id_absensi=$id_absensi, 
id_siswa=$id_saya,
 id_status=$id_status, 
 keterangan_isi_absensi='$keterangan_absensi',
  is_active =1,
   file= '$file' ");

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Absensi berhasil</div>');
            redirect('siswa/lihat_absensi/'.$id);
            # code...
        }
    }

    function update_absensi($id_isi_absensi,$id_absensi)
    {
        //here
        $data['title'] = 'Input Absensi';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 
        $id_saya = $this->session->userdata('id');
        $data['dd_status'] = $this->db->query("SELECT * FROM status_absensi")->result_array();
        $data['val'] = $this->db->query("SELECT * FROM isi_absensi WHERE id_isi_absensi = $id_isi_absensi")->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/update_absensi', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['update_absensi_siswa'])) {
            # code...
            $id_absensi = $this->input->post('id_absensi');
            $id_status = $this->input->post('id_status');
            $id_saya = $this->session->userdata('id');
            $keterangan_absensi = $this->input->post('keterangan_absensi');
            $this->db->query("UPDATE isi_absensi SET id_absensi=$id_absensi, id_siswa =$id_saya, id_status = $id_status, keterangan_isi_absensi = '$keterangan_absensi' WHERE id_isi_absensi = $id_isi_absensi");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update berhasil</div>');
            redirect('siswa/lihat_absensi/'.$id_absensi);
        }
    }

    function bahan_ajar()
    {
        //here
        $data['title'] = 'Bahan Ajar';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 
        $id_saya = $this->session->userdata('id');
        $id_kelas_saya = $this->db->query("SELECT kelas_sekarang FROM user WHERE id = $id_saya")->row_array();
        $data['values'] = $this->db->query("SELECT * FROM bahan_ajar 
INNER JOIN kelas ON bahan_ajar.id_kelas=kelas.id_kelas 
INNER JOIN mapel ON mapel.id_mapel=bahan_ajar.id_mapel
 WHERE bahan_ajar.id_tahun = $this->tahunAktif
 AND bahan_ajar.id_kelas = ".intval($id_kelas_saya['kelas_sekarang']) )->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/bahan_ajar', $data);
        $this->load->view('templates/footer');

    }

    function tugas_ujian()
    {
        //here
        $data['title'] = 'Tugas & Ujian';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();  
       /* $data['values'] = $this->db->query("SELECT *, (SELECT file_tugas FROM upload_tugas WHERE upload_tugas.id_tugas_ujian = tugas_ujian.id_tugas_ujian)
 as upload_jawaban_tugas_ujian FROM tugas_ujian 
 INNER JOIN kelas ON tugas_ujian.id_kelas=kelas.id_kelas 
 INNER JOIN mapel ON mapel.id_mapel=tugas_ujian.id_mapel
 WHERE upload_jawaban_tugas_ujian.id_siswa = ".intval($this->session->userdata('id')))->result_array();*/
        $this->db->select('*,tugas_ujian.id_tugas_ujian as id_tgs');
        $this->db->from("tugas_ujian");
        $this->db->join('kelas', 'tugas_ujian.id_kelas = kelas.id_kelas');
        $this->db->join('mapel', 'mapel.id_mapel = tugas_ujian.id_mapel');
        $this->db->join('upload_tugas', 'upload_tugas.id_tugas_ujian = tugas_ujian.id_tugas_ujian','left');
        $this->db->where('tugas_ujian.id_kelas',$data['user']['kelas_sekarang']);
        $this->db->where('tugas_ujian.id_tahun',$this->tahunAktif);
        $tugas_ujian = $this->db->get();
        $data['values'] = $tugas_ujian->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/tugas_ujian', $data);
        $this->load->view('templates/footer');
    }

    function upload_tugas_ujian($id)
    {
        //here
         $data['title'] = 'Tugas & Ujian';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();  
        $data['values'] = $this->db->query("SELECT * FROM tugas_ujian INNER JOIN kelas ON tugas_ujian.id_kelas=kelas.id_kelas INNER JOIN mapel ON mapel.id_mapel=tugas_ujian.id_mapel")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/upload_jawaban_tugas_ujian', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['submit_tugas_ujian'])) {
            # code...
            if (!empty($_FILES['upload_jawaban_tugas_ujian']['name'])) {
                # code...
                $img_name = str_replace(' ', '_', $_FILES['upload_jawaban_tugas_ujian']['name']);
                $config['upload_path'] = './upload/tugas_ujian/';
                $config['allowed_types'] = '*';
                $config['file_name'] = $img_name;
                $this->upload->initialize($config);
                $this->upload->do_upload('upload_jawaban_tugas_ujian');
            }else{
                $img_name = '';
            }


            $upload_jawaban_tugas_ujian = $img_name;
            $id_tugas_ujian = $this->input->post('id_tugas_ujian');

            $tugas_ujian = $this->db->get_where('tugas_ujian',['id_tugas_ujian'=>$id_tugas_ujian])->result_array()[0];

            //cek difference time
            $dtNow = new DateTime(date('Y-m-d H:i:s'));
            $tgl_tugas = $tugas_ujian['tanggal_tugas_ujian'];
            $jam_selesai_tugas = $tugas_ujian['waktu_selesai'];
            $dtDeadline = new DateTime($tgl_tugas.' '.$jam_selesai_tugas);

            $diff = $dtNow->diff($dtDeadline);
            $diff_minute = ($diff->days * 24 * 60) + ($diff->h * 60) + $diff->i;

            if ($dtNow > $dtDeadline){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, waktu telah melewati batas</div>');
                redirect('siswa/tugas_ujian/');
            }else{
                $id_siswa = $this->session->userdata('id');
                $this->db->query("INSERT INTO upload_tugas SET id_tugas_ujian = $id_tugas_ujian, id_siswa = $id_siswa, file_tugas = '$upload_jawaban_tugas_ujian' ");
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Upload berhasil</div>');
                redirect('siswa/tugas_ujian/');
            }

        }
    }

    function edit_tugas_ujian($id){
        $data['title'] = 'Tugas & Ujian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->where('id_upload_tugas',$id);
        $upload_tugas =  $this->db->get('upload_tugas');
        $upload_tugas = $upload_tugas->result_array()[0];
        $data['values'] = $upload_tugas;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/ubah_jawaban_tugas_ujian', $data);
        $this->load->view('templates/footer');
    }

    function update_tugas_ujian(){
	    $data = $this->input->post();
        if (!empty($_FILES['upload_jawaban_tugas_ujian']['name'])) {
            # code...
            $img_name = str_replace(' ', '_', $_FILES['upload_jawaban_tugas_ujian']['name']);
            $config['upload_path'] = './upload/tugas_ujian/';
            $config['allowed_types'] = '*';
            $config['file_name'] = $img_name;
            $this->upload->initialize($config);
            $this->upload->do_upload('upload_jawaban_tugas_ujian');
        }else{
            $img_name = '';
        }

        $data_update = array(
          'file_tugas'=>$img_name
        );
        $this->db->where('id_upload_tugas',$data['id_upload_tugas']);
        $update =  $this->db->update('upload_tugas',$data_update);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ubah Jawaban Berhasil</div>');
        redirect('siswa/tugas_ujian/');

    }

    function forum_diskusi()
    {
        //here
        $data['title'] = 'Forum Diskusi';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_saya = $this->session->userdata('id');
        $id_kelas_saya = $this->db->query("SELECT kelas_sekarang FROM user WHERE id = $id_saya")->row_array();
        $data['ls'] = $this->db->query("SELECT * FROM list_forum 
INNER JOIN kelas ON list_forum.id_kelas = kelas.id_kelas 
INNER JOIN mapel ON list_forum.id_mapel = mapel.id_mapel 
WHERE list_forum.id_tahun= $this->tahunAktif
AND list_forum.id_kelas = ".intval($id_kelas_saya['kelas_sekarang']))->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/forum_diskusi', $data);
        $this->load->view('templates/footer');
    }

    function komentar($id)
    {
        //here
        $data['title'] = ' Forum Diskusi';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 
        $data['ls'] = $this->db->query("SELECT * FROM list_forum INNER JOIN kelas ON list_forum.id_kelas = kelas.id_kelas INNER JOIN mapel ON list_forum.id_mapel = mapel.id_mapel WHERE id_list_forum = $id")->row_array();    
        $data['komentars'] = $this->db->query("SELECT * FROM komentar_forum INNER JOIN user ON komentar_forum.id_sender = user.id WHERE id_list_forum = $id")->result_array(); 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/komentar', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['submit_komentar_siswa'])) {
            # code...
            $komentar_forum = $this->input->post('komentar_forum');
            $id = $id;
            $id_sender = $this->session->userdata('id');
            $id_kelas = $this->input->post('id_kelas');
            $waktu_komentar_forum = time();

            $this->db->query("INSERT INTO komentar_forum SET komentar_forum = '$komentar_forum', id_list_forum = $id, id_sender = $id_sender, waktu_komentar_forum= '$waktu_komentar_forum' ");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Komentar ditambahkan</div>');
            redirect('siswa/komentar/'.$id);
        }
    }

    function delete_komentar($id){
        $this->db->where('id_komentar_forum',$id);
	    $komentar = $this->db->get('komentar_forum');
	    $komentar = $komentar->result_array()[0];

	    $id_forum = $komentar['id_list_forum'];

        $this->db->where('id_komentar_forum',$id);
        $delete =  $this->db->delete('komentar_forum');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Komentar deleted</div>');
        redirect('siswa/komentar/'.$id_forum);
    }
}