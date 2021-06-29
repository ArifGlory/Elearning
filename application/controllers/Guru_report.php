<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Guru_report extends CI_Controller
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
    	$data['title'] = 'Kelola Nilai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tenants'] = $this->db->query("SELECT * FROM user WHERE role_id = 2")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tenant_management/index', $data);
        $this->load->view('templates/footer');
    }

    function kelola_nilai()
    {
        $id_guru = $this->session->userdata('id');
        $data['title'] = 'Kelola Nilai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        /*$data['siswa'] = $this->db->query("SELECT *,
(SELECT AVG(nilai) FROM nilai_harian WHERE user.id = nilai_harian.id_siswa) as rata_rata
 FROM user WHERE role_id = 3")->result_array();*/

        $this->db->select('*');
        $this->db->from("kelas");
        $this->db->join('kelas_online', 'kelas.id_kelas = kelas_online.id_kelas');
        //$this->db->join('kelas', 'user.kelas_sekarang = kelas.id_kelas');
        //$this->db->join('nilai_harian', 'nilai_harian.id_siswa = user.id','left');
        //$this->db->where('user.role_id',3);
        $this->db->where('kelas_online.id_guru',$id_guru);
        $this->db->where('kelas_online.id_tahun',$this->tahunAktif);
        $this->db->group_by('kelas.kelas');
        $this->db->order_by('kelas.kelas',"DESC");
        $mySiswa = $this->db->get();
        $mySiswa = $mySiswa->result_array();
        $data['siswa'] = $mySiswa;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/index', $data);
        $this->load->view('templates/footer');
    }

    function report_kelas($id_kelas){

        $id_guru = $this->session->userdata('id');
        $data['title'] = 'Kelola Nilai Kelas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] =  $this->db->get_where('kelas',array('id_kelas'=>$id_kelas))->result_array()[0];

        $this->db->select('*');
        $this->db->from("user");
        $this->db->join('kelas_online', 'user.kelas_sekarang = kelas_online.id_kelas');
        $this->db->join('kelas', 'user.kelas_sekarang = kelas.id_kelas');
       // $this->db->join('nilai_harian', 'nilai_harian.id_siswa = user.id','left');
        $this->db->where('user.role_id',3);
        $this->db->where('kelas_online.id_guru',$id_guru);
        $this->db->where('kelas.id_kelas',$id_kelas);
        //$this->db->where('nilai_harian.id_tahun',$this->tahunAktif);
        $this->db->group_by('user.name');
        $this->db->order_by('user.name',"ASC");
        $mySiswa = $this->db->get();
        $mySiswa = $mySiswa->result_array();
        $data['siswa'] = $mySiswa;
        $data['id_kelas'] = $id_kelas;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/report_kelas', $data);
        $this->load->view('templates/footer');
    }

    function cetak_kelola_nilai()
    {
        $id_guru = $this->session->userdata('id');
        $data['title'] = 'Kelola Nilai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        /*$data['siswa'] = $this->db->query("SELECT *,
(SELECT AVG(nilai) FROM nilai_harian WHERE user.id = nilai_harian.id_siswa) as rata_rata
 FROM user WHERE role_id = 3")->result_array();*/
        $id_saya = $this->session->userdata('id');
        $data['data_saya'] = $this->db->query("SELECT * FROM user INNER JOIN mapel ON user.id_mapel=mapel.id_mapel WHERE id=$id_saya")->row_array();
        // $data['tahun'] = $this->db->query("SELECT * FROM nilai")

        $this->db->select('*,(SELECT AVG(nilai) FROM nilai_harian WHERE user.id = nilai_harian.id_siswa) as rata_rata');
        $this->db->from("user");
        //$this->db->join('nilai_harian', 'nilai_harian.id_siswa = user.id');
        $this->db->join('kelas_online', 'user.kelas_sekarang = kelas_online.id_kelas');
        $this->db->join('kelas', 'user.kelas_sekarang = kelas.id_kelas');
        $this->db->where('user.role_id',3);
        $this->db->where('kelas_online.id_guru',$id_guru);
        $this->db->order_by('kelas.kelas',"DESC");
        $mySiswa = $this->db->get();
        $mySiswa = $mySiswa->result_array();
        $data['siswa'] = $mySiswa;


        $this->load->view('templates/header', $data);
        //$this->load->view('templates/sidebar', $data);
        //$this->load->view('templates/topbar', $data);
        $this->load->view('guru/cetak_kelola_nilai', $data);
        $this->load->view('templates/footer');
    }

    function detail($id_siswa,$id_kelas)
    {
        $data['title'] = 'Kelola Nilai';
        $id_guru = $this->session->userdata('id');
        $tahun_aktif = $this->db->query("SELECT id_tahun FROM tahun WHERE is_active=1")->row_array();
        $tahun_aktif = $tahun_aktif['id_tahun'];

        $kelas_online = $this->db->get_where('kelas_online',['id_kelas'=>$id_kelas,'id_guru'=> $id_guru])->row_array();
        $id_mapel = $kelas_online['id_mapel'];
        

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->db->query("SELECT * FROM user WHERE id=$id_siswa")->row_array();

        $data['rata_rata'] = $this->db->query("SELECT AVG(nilai) FROM nilai_harian 
        WHERE id_siswa = $id_siswa
        AND nilai_harian.id_mapel =  $id_mapel
        AND id_tahun = $tahun_aktif")->row_array();

        $data['nilai_harian'] = $this->db->query("SELECT * FROM nilai_harian 
        INNER JOIN user ON id_siswa=id 
        WHERE id_siswa = $id_siswa
        AND nilai_harian.id_mapel =  $id_mapel
        AND id_tahun =  $tahun_aktif")->result_array();

        $data['id_mapel'] = $this->db->query("SELECT id_mapel FROM user WHERE id = $id_guru")->row_array();
        $data['tahun_aktif'] = $this->db->query("SELECT * FROM tahun WHERE is_active=1")->row_array();
        $id_guru_logged = $this->session->userdata('id');
        
        $data['mute_submit_report'] = $this->db->query("SELECT * FROM nilai WHERE id_guru = $id_guru_logged
          AND id_siswa = $id_siswa AND id_tahun =".intval($tahun_aktif))->result_array();

        /*print_r($data['mute_submit_report']);
        die();*/

        $data['mute_uas'] = $this->db->query("SELECT * FROM nilai_harian
         WHERE id_siswa = $id_siswa AND id_guru = $id_guru_logged 
         AND deskripsi = 'UAS' AND id_tahun =".intval($tahun_aktif))->result_array();

        $data['mute_mid'] = $this->db->query("SELECT * FROM nilai_harian 
        WHERE id_siswa = $id_siswa AND id_guru = $id_guru_logged 
        AND deskripsi = 'MID' AND id_tahun =".intval($tahun_aktif))->result_array();
        $data['id_wake'] = $this->db->query("SELECT id_wali_kelas FROM user WHERE id=$id_siswa")->row_array();
        $data['id_kelas'] = $id_kelas;
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/detail_nilai', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['submit_report'])) {
            $id_siswa2 = $this->input->post('id_siswa2');
            $id_mapel2 = $this->input->post('id_mapel2');
            $nilai_akhir = $this->input->post('nilai_akhir');
            $deskripsi2 = $this->input->post('deskripsi2');
            $kelompok2 = $this->input->post('kelompok');
            $id_guru2 = $this->input->post('id_guru2');
            $id_tahun2 = $this->input->post('id_tahun2');
            $id_kelas = $this->input->post('kelas_sekarang');
            $id_wali_kelas = $this->input->post('id_wali_kelas');

            $this->db->query("INSERT INTO nilai VALUES(NULL, $id_siswa2, '$id_mapel2', '$nilai_akhir', '$deskripsi2', '$kelompok2', $id_guru2, $id_tahun2, $id_wali_kelas, $id_kelas)");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nilai berhasil ditambahkan.</div>');
            redirect('guru_report/kelola_nilai/');
        }
    }

    function delete_detail_nilai($id){
        $this->db->where('id_nilai_harian',$id);
        $detail_nilai =  $this->db->get('nilai_harian');
        $detail_nilai = $detail_nilai->result_array()[0];

        $id_siswa = $detail_nilai['id_siswa'];

        $this->db->where('id_nilai_harian',$id);
        $delete =  $this->db->delete('nilai_harian');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nilai deleted</div>');
        redirect('guru_report/detail/'.$id_siswa);

    }

    function add_nilai_harian()
    {
        $this->form_validation->set_rules('nilai', 'Nilai', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

        if ($this->form_validation->run() == false) {
           $data['title'] = 'Kelola Nilai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nama_siswa'] = $this->db->query("SELECT name FROM user WHERE id=$id_siswa")->row_array();
        $data['rata_rata'] = $this->db->query("SELECT AVG(nilai) FROM nilai_harian WHERE id_siswa = $id_siswa")->row_array();
        $data['nilai_harian'] = $this->db->query("SELECT * FROM nilai_harian INNER JOIN user ON id_siswa=id WHERE id_siswa = $id_siswa")->result_array();
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/detail_nilai', $data);
        $this->load->view('templates/footer');
        } else {
            //here
            $id_siswaa = $this->input->post('id_siswa');
            $id_guru = $this->input->post('id_guru');
            $id_mapel = $this->input->post('id_mapel');
            $nilai = $this->input->post('nilai');
            $deskripsi = $this->input->post('deskripsi');
            $id_tahun = $this->input->post('id_tahun');
            $id_kelas = $this->input->post('id_kelas');

            $this->db->query("INSERT INTO nilai_harian VALUES(NULL, $id_siswaa, $id_guru, $id_mapel, $nilai, '$deskripsi', '$id_tahun' )");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nilai berhasil ditambahkan.</div>');
            redirect('guru_report/detail/'.$id_siswaa."/".$id_kelas);
        }
    }

    function report()
    {
        $data['title'] = 'Report';
        $id_guru = $this->session->userdata('id');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['report'] = $this->db->query("SELECT id_siswa, name, nomor_induk FROM nilai INNER JOIN user ON id_siswa=id WHERE id_guru = $id_guru GROUP BY id_siswa ")->result_array();
        $data['mapel'] = $this->db->query("SELECT * FROM user INNER JOIN mapel ON user.id_mapel = mapel.id_mapel ")->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/report', $data);
        $this->load->view('templates/footer');
    }

    function detail_report($id_siswa)
    {
        //here
        $data['title'] = 'Detail Report';
        $id_guru = $this->session->userdata('id');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nama_siswa'] = $this->db->query("SELECT name FROM user WHERE id=$id_siswa")->row_array();
        $data['rata_rata'] = $this->db->query("SELECT AVG(nilai) FROM nilai_harian WHERE id_siswa = $id_siswa")->row_array();
        $data['nilai_harian'] = $this->db->query("SELECT * FROM nilai_harian INNER JOIN user ON id_siswa=id WHERE id_siswa = $id_siswa")->result_array();
        $data['id_mapel'] = $this->db->query("SELECT id_mapel FROM user WHERE id = $id_guru")->row_array();
        $data['tahun_aktif'] = $this->db->query("SELECT * FROM tahun WHERE is_active=1")->row_array();
        $id_guru_logged = $this->session->userdata('id');
        $tahun_aktif = $this->db->query("SELECT id_tahun FROM tahun WHERE is_active=1")->row_array();
        $data['mute_submit_report'] = $this->db->query("SELECT * FROM nilai WHERE id_guru = $id_guru_logged AND id_tahun =".intval($tahun_aktif['id_tahun']))->result_array();
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/detail_report', $data);
        $this->load->view('templates/footer');
    }

    function kelola_kelas_online()
    {
        //here
        $data['title'] = 'Kelola Kelas Online';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_saya = $this->session->userdata('id');
        $data['dd_kelas'] = $this->db->query("SELECT * FROM kelas")->result_array();
        $data['dd_mapel'] = $this->db->query("SELECT * FROM mapel")->result_array();
        $data['dd_tahun'] = $this->db->query("SELECT * FROM tahun")->result_array();
        $data['dd_guru'] = $this->db->query("SELECT * FROM user WHERE role_id=2 || role_id = 4")->result_array();
        $data['var'] = $this->db->query("SELECT * FROM kelas_online
 INNER JOIN kelas ON kelas_online.id_kelas = kelas.id_kelas
  INNER JOIN mapel ON kelas_online.id_mapel = mapel.id_mapel
   INNER JOIN tahun ON kelas_online.id_tahun = tahun.id_tahun
    INNER JOIN user ON kelas_online.id_guru = user.id 
    WHERE kelas_online.id_tahun = $this->tahunAktif
    AND id_guru = $id_saya")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/kelola_kelas_online', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['submit_kelas_online'])) {
            # code...
            $id_kelas = $this->input->post('id_kelas');
            $id_mapel = $this->input->post('id_mapel');
            $id_tahun = $this->input->post('id_tahun');
            $id_guru = $this->session->userdata('id');
            $deskripsi = $this->input->post('deskripsi');

            $this->db->query("INSERT INTO kelas_online SET id_kelas = $id_kelas, id_mapel= $id_mapel, id_tahun=$id_tahun, deskripsi='$deskripsi', id_guru= $id_guru");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kelas Berhasil Ditambahkan!</div>');
            redirect('guru_report/kelola_kelas_online/');
        }
    }

    function update_kelas_online($id)
    {
        //here
        $data['title'] = 'Kelola Kelas Online';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dd_kelas'] = $this->db->query("SELECT * FROM kelas")->result_array();
        $data['dd_mapel'] = $this->db->query("SELECT * FROM mapel")->result_array();
        $data['dd_tahun'] = $this->db->query("SELECT * FROM tahun")->result_array();
        $data['dd_guru'] = $this->db->query("SELECT * FROM user WHERE role_id=2 || role_id = 4")->result_array();
        $data['var'] = $this->db->query("SELECT * FROM kelas_online WHERE id_kelas_online = $id")->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/update_kelas_online', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['update_kelas_online'])) {
            # code...
            $id_kelas = $this->input->post('id_kelas');
            $id_mapel = $this->input->post('id_mapel');
            $id_tahun = $this->input->post('id_tahun');
            $id_guru = $this->session->userdata('id');
            $deskripsi = $this->input->post('deskripsi');

            $this->db->query("UPDATE kelas_online SET id_kelas = $id_kelas, id_mapel = $id_mapel, id_tahun = $id_tahun, deskripsi = '$deskripsi', id_guru = $id_guru WHERE id_kelas_online = ".intval($id));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update berhasil</div>');
            redirect('guru_report/kelola_kelas_online/');
        }
    }

    function delete_kelas_online($id)
    {
        $this->db->query("DELETE FROM kelas_online WHERE id_kelas_online = ".intval($id));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deleted</div>');
        redirect('guru_report/kelola_kelas_online/');
    }

    function kelola_kalender_kelas()
    {
        //here
        $data['title'] = 'Kelola Kalender Kelas';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_saya = $this->session->userdata('id');
        $data['dd_kelas'] = $this->db->query("SELECT * FROM kelas")->result_array();
        $data['dd_mapel'] = $this->db->query("SELECT * FROM mapel")->result_array();
        $data['dd_guru'] = $this->db->query("SELECT * FROM user WHERE role_id=2 || role_id = 4")->result_array();
        $data['value'] = $this->db->query("SELECT * FROM kalender_kelas 
INNER JOIN kelas ON kalender_kelas.id_kelas = kelas.id_kelas 
INNER JOIN mapel ON mapel.id_mapel = kalender_kelas.id_mapel 
INNER JOIN user ON kalender_kelas.id_guru = user.id
WHERE  kalender_kelas.id_tahun = $this->tahunAktif
AND id_guru= $id_saya")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/kelola_kalender_kelas', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['submit_kalender_kelas'])) {
            # code...
            $hari_kalender_kelas = $this->input->post('hari_kalender_kelas');
            $tanggal_kalender_kelas = $this->input->post('tanggal_kalender_kelas');
            $jam_kalender_kelas = $this->input->post('jam_kalender_kelas');
            $id_kelas = $this->input->post('id_kelas');
            $id_mapel = $this->input->post('id_mapel');
            $id_guru = $this->session->userdata('id');
            $deskripsi_kalender_kelas = $this->input->post('deskripsi_kalender_kelas');

            $this->db->query("INSERT INTO kalender_kelas SET hari_kalender_kelas = '$hari_kalender_kelas',
 tanggal_kalender_kelas = '$tanggal_kalender_kelas',
  jam_kalender_kelas='$jam_kalender_kelas',
   id_kelas=$id_kelas,
    id_mapel=$id_mapel,
    id_guru=$id_guru,
    id_tahun=$this->tahunAktif, 
    deskripsi_kalender_kelas='$deskripsi_kalender_kelas'");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Add Kalender kelas berhasil</div>');
            redirect('guru_report/kelola_kalender_kelas/');
        }
    }

    function update_kalender_kelas($id)
    {
        //here
        $data['title'] = 'Kelola Kalender Kelas';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dd_kelas'] = $this->db->query("SELECT * FROM kelas")->result_array();
        $data['dd_mapel'] = $this->db->query("SELECT * FROM mapel")->result_array();
        $data['dd_guru'] = $this->db->query("SELECT * FROM user WHERE role_id=2 || role_id = 4")->result_array();
        $data['value'] = $this->db->query("SELECT * FROM kalender_kelas WHERE id_kalender_kelas = $id")->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/update_kalender_kelas', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['update_kalender_kelas'])) {
            # code...
            $hari_kalender_kelas = $this->input->post('hari_kalender_kelas');
            $tanggal_kalender_kelas = $this->input->post('tanggal_kalender_kelas');
            $jam_kalender_kelas = $this->input->post('jam_kalender_kelas');
            $id_kelas = $this->input->post('id_kelas');
            $id_mapel = $this->input->post('id_mapel');
            $id_guru = $this->session->userdata('id');
            $deskripsi_kalender_kelas = $this->input->post('deskripsi_kalender_kelas');

            $this->db->query("UPDATE kalender_kelas SET hari_kalender_kelas = '$hari_kalender_kelas', tanggal_kalender_kelas = '$tanggal_kalender_kelas', jam_kalender_kelas='$jam_kalender_kelas', id_kelas=$id_kelas, id_mapel=$id_mapel,id_guru=$id_guru, deskripsi_kalender_kelas='$deskripsi_kalender_kelas' WHERE id_kalender_kelas=$id");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">update kalender kelas berhasil</div>');
            redirect('guru_report/kelola_kalender_kelas/');
        }
    }

    function delete_kalender_kelas($id)
    {
        $this->db->query("DELETE FROM kalender_kelas WHERE id_kalender_kelas = $id");
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kalender kelas deleted</div>');
        redirect('guru_report/kelola_kalender_kelas/');
    }

    function daftar_siswa()
    {
        //here
        $data['title'] = 'Daftar Siswa';    
        $id_saya = $this->session->userdata('id');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tahun_aktif = $this->db->get_where('tahun', ['is_active' => 1])->row_array();

        $kelas_online = $this->db->get_where('kelas_online',['id_guru' => $id_saya])->row_array();

        $this->db->select('*');
        $this->db->from("user");
        $this->db->join('kelas_online', 'user.kelas_sekarang = kelas_online.id_kelas');
        $this->db->join('kelas', 'user.kelas_sekarang = kelas.id_kelas');
        $this->db->where('user.role_id',3);
        $this->db->where('kelas_online.id_guru',$id_saya);
        $this->db->where('kelas_online.id_tahun',$tahun_aktif['id_tahun']);
        $this->db->group_by('user.name');
        $mySiswa = $this->db->get();
        $mySiswa = $mySiswa->result_array();

        /*$data['siswa'] = $this->db->query("SELECT * FROM user INNER JOIN kelas
        ON user.kelas_sekarang = kelas.id_kelas WHERE role_id = 3 AND 
        id_wali_kelas = $id_saya")->result_array();*/
        $data['siswa'] = $mySiswa;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/daftar_siswa', $data);
        $this->load->view('templates/footer');
    }

    function kelola_jadwal_vicon()
    {
        //here
        $data['title'] = 'Kelola Jadwal Vicon';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_saya = $this->session->userdata('id');
        //$kelas_saya = $this->db->query("SELECT * FROM kelas WHERE id_wali_kelass =$id_saya ")->row_array();  
        $data['dd_kelas'] = $this->db->query("SELECT * FROM kelas")->result_array();     
        $data['values'] = $this->db->query("SELECT * FROM jadwal_vicon 
INNER JOIN kelas ON kelas.id_kelas = jadwal_vicon.id_kelas
WHERE  jadwal_vicon.id_tahun = $this->tahunAktif
AND jadwal_vicon.id_guru = ".intval($id_saya))->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/jadwal_vicon', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['submit_jadwal_vicon'])) {
            $room_meeting = $this->input->post('room_meeting');
            $password_vicon = $this->input->post('password_vicon');
            $host_vicon = $this->input->post('host_vicon');
            $tanggal_kelas_vicon = $this->input->post('tanggal_kelas_vicon');
            $id_kelas = $this->input->post('id_kelas');
            $waktu_vicon = $this->input->post('waktu_vicon');
            $url_vicon = $this->input->post('url_vicon');
            $id_saya = $this->session->userdata('id');

            $this->db->query("INSERT INTO jadwal_vicon SET id_guru=$id_saya,
 room_meeting = '$room_meeting', 
 password_vicon = '$password_vicon', 
 host_vicon = '$host_vicon', 
 tanggal_kelas_vicon = '$tanggal_kelas_vicon', 
 id_kelas = $id_kelas,
 id_tahun=$this->tahunAktif,
  waktu_vicon = '$waktu_vicon',
  url_vicon = '$url_vicon' ");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jadwal Vicon berhasil ditambahkan</div>');
            redirect('guru_report/kelola_jadwal_vicon/');
        }
    }

    function update_jadwal_vicon($id)
    {
        $data['title'] = 'Jadwal Vicon';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();  
        $data['dd_kelas'] = $this->db->query("SELECT * FROM kelas")->result_array();     
        $data['values'] = $this->db->query("SELECT * FROM jadwal_vicon WHERE id_jadwal_vicon=$id")->row_array(); 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/update_jadwal_vicon', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['update_jadwal_vicon'])) {
            $room_meeting = $this->input->post('room_meeting');
            $password_vicon = $this->input->post('password_vicon');
            $host_vicon = $this->input->post('host_vicon');
            $tanggal_kelas_vicon = $this->input->post('tanggal_kelas_vicon');
            $id_kelas = $this->input->post('id_kelas');
            $waktu_vicon = $this->input->post('waktu_vicon');
            $url_vicon = $this->input->post('url_vicon');
            $id_saya = $this->session->userdata('id');

            $this->db->query("UPDATE jadwal_vicon SET id_guru=$id_saya, room_meeting = '$room_meeting', password_vicon = '$password_vicon', host_vicon = '$host_vicon', tanggal_kelas_vicon = '$tanggal_kelas_vicon', id_kelas = $id_kelas, waktu_vicon = '$waktu_vicon', url_vicon='$url_vicon' WHERE id_jadwal_vicon = $id");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jadwal berhasil diubah</div>');
            redirect('guru_report/kelola_jadwal_vicon/');
        }
    }

    function delete_jadwal_vicon($id)
    {
        $this->db->query("DELETE FROM jadwal_vicon WHERE id_jadwal_vicon = $id");
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deleted</div>');
        redirect("guru_report/kelola_jadwal_vicon/");
    }

    function kelola_absensi()
    {
        //here
        $data['title'] = 'Kelola Absensi';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();  
        $id_saya = $this->session->userdata('id');
        $kelas_saya = $this->db->query("SELECT * FROM kelas WHERE id_wali_kelass =$id_saya ")->row_array();  
        $data['dd_kelas'] = $this->db->query("SELECT * FROM kelas")->result_array();
        $data['users'] = $this->db->query("SELECT * FROM user WHERE role_id=3")->result_array();
        $data['dd_mapel'] = $this->db->query("SELECT * FROM mapel")->result_array();     
        $data['values'] = $this->db->query("SELECT * FROM absensi 
INNER JOIN kelas ON kelas.id_kelas = absensi.id_kelas 
INNER JOIN mapel ON absensi.id_mapel = mapel.id_mapel 
WHERE absensi.id_tahun = $this->tahunAktif
AND absensi.id_guru=".intval($id_saya))->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/kelola_absensi', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['submit_absensi'])) {
            $hari_absensi = strtolower($this->input->post('hari_absensi'));
            $tanggal_absensi = $this->input->post('tanggal_absensi');
            $id_mapel = $this->input->post('id_mapel');
            $id_kelas = $this->input->post('id_kelas');
            $id_guru = $id_saya;
            $pertemuan_ke = $this->input->post('pertemuan_ke');
            $mulai = $this->input->post('mulai');
            $selesai = $this->input->post('selesai');

            $this->db->query("INSERT INTO absensi SET id_guru=$id_guru,
 hari_absensi = '$hari_absensi',
  tanggal_absensi = '$tanggal_absensi',
   id_mapel=$id_mapel, 
   id_kelas=$id_kelas,
   id_tahun=$this->tahunAktif,
    pertemuan_ke = $pertemuan_ke,
     mulai='$mulai', selesai ='$selesai' ");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Absensi berhasil ditambahkan</div>');
            redirect('guru_report/kelola_absensi/');
        }
    }

    function detail_absensi($id)
    {
        //here
        $data['title'] = 'Kelola Absensi';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();  
        // $id_kelas = $this->db->query("SELECT id_kelas FROM absensi WHERE id_absensi = $id")->row_array();
        $data['values'] = $this->db->query("SELECT * FROM isi_absensi INNER JOIN user ON isi_absensi.id_siswa=user.id INNER JOIN absensi ON isi_absensi.id_absensi = absensi.id_absensi WHERE isi_absensi.id_absensi = $id")->result_array(); 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/detail_absensi', $data);
        $this->load->view('templates/footer');
    }

    // function add_absensi($hari, $tanggal, $mapel, $kelas, $pertemuan)
    // {
    //     //here
    //     $data['title'] = 'Kelola Absensi';    
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();  
    //     $data['users'] = $this->db->query("SELECT *, (SELECT id_siswa FROM absensi WHERE user.id=absensi.id_siswa AND id_mapel = $mapel AND id_kelas = $kelas GROUP BY id_siswa) as waiki FROM user INNER JOIN kelas ON kelas.id_kelas = user.kelas_sekarang WHERE role_id = 3")->result_array();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('guru/add_absensi', $data);
    //     $this->load->view('templates/footer');
    // }

    function add_siswa($hari_absensi, $tanggal_absensi, $id_mapel, $id_siswa, $id_kelas, $pertemuan_ke)
    {
        //here
        $this->db->query("INSERT INTO absensi SET hari_absensi = '$hari_absensi', tanggal_absensi = '$tanggal_absensi', id_mapel = $id_mapel, id_siswa = $id_siswa, id_kelas = $id_kelas, pertemuan_ke = $pertemuan_ke ");
        redirect('guru_report/add_absensi/'.$hari_absensi.'/'.$tanggal_absensi.'/'.$id_mapel.'/'.$id_kelas.'/'.$pertemuan_ke.'/');
    }

    // function update_absensi($id)
    // {
    //     //here
    //     $data['title'] = 'Kelola Absensi';    
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();  
    //     $data['dd_kelas'] = $this->db->query("SELECT * FROM kelas")->result_array();
    //     $data['users'] = $this->db->query("SELECT * FROM user WHERE role_id=3")->result_array();
    //     $data['dd_mapel'] = $this->db->query("SELECT * FROM mapel")->result_array();     
    //     $data['values'] = $this->db->query("SELECT * FROM absensi WHERE id_absensi = $id")->row_array(); 

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('guru/update_absensi', $data);
    //     $this->load->view('templates/footer');

    //     if (isset($_POST['update_absensi'])) {
    //         $hari_absensi = date("l");
    //         $tanggal_absensi = date("Y-m-d");
    //         $id_kelas = $this->input->post('id_kelas');
    //         $id_mapel = $this->input->post('id_mapel');
    //         $id_siswa = $this->input->post('id_siswa');
    //         $pertemuan_ke = $this->input->post('pertemuan_ke');
    //         $id_status = $this->input->post('id_status');
    //         $keterangan_absensi = $this->input->post('keterangan_absensi');

    //         $this->db->query("UPDATE absensi SET hari_absensi = '$hari_absensi', tanggal_absensi = '$tanggal_absensi', id_mapel = $id_mapel, id_siswa = $id_siswa,id_kelas=$id_kelas, pertemuan_ke = $pertemuan_ke, id_status = $id_status, keterangan_absensi = '$keterangan_absensi' WHERE id_absensi = $id ");
    //         redirect('guru_report/kelola_absensi/');
    //     }
    // }

    function delete_absensi($id)
    {
        $this->db->query("DELETE FROM absensi WHERE id_absensi = $id");
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deleted</div>');
        redirect("guru_report/kelola_absensi/");
    }

    function kelola_bahan_ajar()
    {
        //here
        $data['title'] = 'Kelola Bahan Ajar';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 
        $id_saya = $this->session->userdata('id');
        $mapel_saya = $this->db->query("SELECT id_mapel FROM user WHERE id=$id_saya")->row_array();
        $kelas_saya = $this->db->query("SELECT * FROM kelas WHERE id_wali_kelass =$id_saya ")->row_array();   
        $data['dd_kelas'] = $this->db->query("SELECT * FROM kelas")->result_array();
        $data['dd_mapel'] = $this->db->query("SELECT * FROM mapel")->result_array();
        $data['values'] = $this->db->query("SELECT * FROM bahan_ajar 
        INNER JOIN kelas ON bahan_ajar.id_kelas=kelas.id_kelas 
        INNER JOIN mapel ON mapel.id_mapel=bahan_ajar.id_mapel
        WHERE bahan_ajar.id_tahun = $this->tahunAktif
         AND bahan_ajar.id_guru=".intval($id_saya))->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/kelola_bahan_ajar', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['submit_bahan_ajar'])) {
            # code...
            if (!empty($_FILES['file_bahan_ajar']['name'])) {
                # code...
                $pdf_name = str_replace(' ', '_', $_FILES['file_bahan_ajar']['name']);
                $config['upload_path'] = './upload/bahan_ajar/';
                $config['allowed_types'] = '*';
                $config['file_name'] = $pdf_name;
                $this->upload->initialize($config);
                $this->upload->do_upload('file_bahan_ajar');
            }else{
                $pdf_name = '';
            }
           /* $hari_bahan_ajar = $this->input->post('hari_bahan_ajar');
            $tanggal_bahan_ajar = $this->input->post('tanggal_bahan_ajar');
            $id_kelas = $this->input->post('id_kelas');
            $id_mapel = $this->input->post('id_mapel');
            $pertemuan_bahan_ajar = $this->input->post('pertemuan_bahan_ajar');
            $file_bahan_ajar = $pdf_name;
            $keterangan_bahan_ajar = $this->input->post('keterangan_bahan_ajar');*/

            /*$this->db->query("INSERT INTO bahan_ajar SET hari_bahan_ajar = '$hari_bahan_ajar',
 tanggal_bahan_ajar = '$tanggal_bahan_ajar', id_kelas = $id_kelas,
  id_mapel = $id_mapel, pertemuan_bahan_ajar = $pertemuan_bahan_ajar,
   file_bahan_ajar = '$file_bahan_ajar', keterangan_bahan_ajar = '$keterangan_bahan_ajar'  ");*/

            //more simple way...
            $data_simpan = $this->input->post();
            $data_simpan['file_bahan_ajar'] = $pdf_name;
            $data_simpan['id_guru'] = $this->session->userdata('id');
            $data_simpan['id_tahun'] = $this->tahunAktif;
            unset($data_simpan['submit_bahan_ajar']);

            $insert =  $this->db->insert('bahan_ajar',$data_simpan);


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bahan ajar berhasil ditambahkan</div>');
            redirect('guru_report/kelola_bahan_ajar/');
        }
    }

    function update_bahan_ajar($id)
    {
        //here
        $data['title'] = 'Kelola Bahan Ajar';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();  
        $data['dd_kelas'] = $this->db->query("SELECT * FROM kelas")->result_array();
        $data['dd_mapel'] = $this->db->query("SELECT * FROM mapel")->result_array();
        $data['val'] = $this->db->query("SELECT * FROM bahan_ajar WHERE id_bahan_ajar = $id")->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/update_bahan_ajar', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['update_bahan_ajar'])) {
            # code...
            if (!empty($_FILES['file_bahan_ajar']['name'])) {
                # code...
                $pdf_name = str_replace(' ', '_', $_FILES['file_bahan_ajar']['name']);
                $config['upload_path'] = './upload/bahan_ajar/';
                $config['allowed_types'] = 'pdf';
                $config['file_name'] = $pdf_name;
                $this->upload->initialize($config);
                $this->upload->do_upload('file_bahan_ajar');
            }else{
                $pdf_name = $this->input->post('file_bahan_ajar_old');
            }
            $hari_bahan_ajar = $this->input->post('hari_bahan_ajar');
            $tanggal_bahan_ajar = $this->input->post('tanggal_bahan_ajar');
            $id_kelas = $this->input->post('id_kelas');
            $id_mapel = $this->input->post('id_mapel');
            $pertemuan_bahan_ajar = $this->input->post('pertemuan_bahan_ajar');
            $file_bahan_ajar = $pdf_name;
            $keterangan_bahan_ajar = $this->input->post('keterangan_bahan_ajar');

            $this->db->query("UPDATE bahan_ajar SET hari_bahan_ajar = '$hari_bahan_ajar', tanggal_bahan_ajar = '$tanggal_bahan_ajar', id_kelas = $id_kelas, id_mapel = $id_mapel, pertemuan_bahan_ajar = $pertemuan_bahan_ajar, file_bahan_ajar = '$file_bahan_ajar', keterangan_bahan_ajar = '$keterangan_bahan_ajar' WHERE id_bahan_ajar = $id ");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bahan Ajar berhasil updated</div>');
            redirect('guru_report/kelola_bahan_ajar/');
        }
    }

    function delete_bahan_ajar($id)
    {
    $this->db->query("DELETE FROM bahan_ajar WHERE id_bahan_ajar = $id");
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deleted</div>');
    redirect('guru_report/kelola_bahan_ajar/');
    }

    function kelola_tugas_ujian()
    {
        //here
        $data['title'] = 'Kelola Tugas & Ujian';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 
        $id_saya = $this->session->userdata('id');
        $kelas_saya = $this->db->query("SELECT * FROM kelas WHERE id_wali_kelass =$id_saya ")->row_array();
        //$mapel_saya = $this->db->query("SELECT id_mapel FROM user WHERE id=$id_saya")->row_array();
        $data['dd_kelas'] = $this->db->query("SELECT * FROM kelas")->result_array();
        $data['dd_mapel'] = $this->db->query("SELECT * FROM mapel")->result_array();
        $data['values'] = $this->db->query("SELECT * FROM tugas_ujian
         INNER JOIN kelas ON tugas_ujian.id_kelas=kelas.id_kelas
         INNER JOIN mapel ON mapel.id_mapel=tugas_ujian.id_mapel
         WHERE tugas_ujian.id_tahun = $this->tahunAktif
          AND tugas_ujian.id_guru=".intval($id_saya))->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/kelola_tugas_ujian', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['kelola_tugas_ujian'])) {
            # code...
            if (!empty($_FILES['file_tugas_ujian']['name'])) {
                # code...
                $file_name = str_replace(' ', '_', $_FILES['file_tugas_ujian']['name']);
                $config['upload_path'] = './upload/tugas_ujian/';
                $config['allowed_types'] = '*';
                $config['file_name'] = $file_name;
                $this->upload->initialize($config);
                $this->upload->do_upload('file_tugas_ujian');
            }else{
                $file_name = '';
            }
            /*$hari_tugas_ujian = $this->input->post('hari_tugas_ujian');
            $tanggal_tugas_ujian = $this->input->post('tanggal_tugas_ujian');
            $id_kelas  = $this->input->post('id_kelas');
            $id_mapel = $this->input->post('id_mapel');
            $subjek_tugas_ujian = $this->input->post('subjek_tugas_ujian');
            $waktu_mulai = $this->input->post('waktu_mulai');
            $waktu_selesai = $this->input->post('waktu_selesai');
            $pertemuan_tugas_ujian = $this->input->post('pertemuan_tugas_ujian');
            $keterangan_tugas_ujian = $this->input->post('keterangan_tugas_ujian');
            $file_tugas_ujian = $file_name;*/

           /* $this->db->query("INSERT INTO tugas_ujian SET hari_tugas_ujian = '$hari_tugas_ujian',
 tanggal_tugas_ujian = '$tanggal_tugas_ujian', id_kelas = $id_kelas,
  id_mapel=$id_mapel, subjek_tugas_ujian='$subjek_tugas_ujian',
  waktu_mulai='$waktu_mulai', waktu_selesai='$waktu_selesai',
   pertemuan_tugas_ujian=$pertemuan_tugas_ujian,
   keterangan_tugas_ujian = '$keterangan_tugas_ujian',
    file_tugas_ujian = '$file_name' ");*/

           //more simple way...
            $data_simpan = $this->input->post();
            $data_simpan['file_tugas_ujian'] = $file_name;
            $data_simpan['id_guru'] = $this->session->userdata('id');
            $data_simpan['id_tahun'] = $this->tahunAktif;
            unset($data_simpan['kelola_tugas_ujian']);

            $insert =  $this->db->insert('tugas_ujian',$data_simpan);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil ditambahkan</div>');
            redirect('guru_report/kelola_tugas_ujian/');
        }
    }

    function download_tugas_ujian($id){
        $this->db->where('id_tugas_ujian',$id);
        $data =  $this->db->get('tugas_ujian');

        $data = $data->result_array()[0];
        force_download('./upload/tugas_ujian/'.$data['file_tugas_ujian'],NULL);
    }

    function detail_tugas_ujian($id)
    {
        //here
        $data['title'] = 'Kelola Tugas & Ujian';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();  
        $data['values'] = $this->db->query("SELECT * FROM upload_tugas INNER JOIN user ON upload_tugas.id_siswa=user.id WHERE id_tugas_ujian = $id")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/detail_tugas_ujian', $data);
        $this->load->view('templates/footer');
    }

    function update_tugas_ujian($id)
    {
        //here
        $data['title'] = 'Kelola Tugas & Ujian';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();  
        $data['dd_kelas'] = $this->db->query("SELECT * FROM kelas")->result_array();
        $data['dd_mapel'] = $this->db->query("SELECT * FROM mapel")->result_array();
        $data['value'] = $this->db->query("SELECT * FROM tugas_ujian WHERE id_tugas_ujian = $id")->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/update_tugas_ujian', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['update_tugas_ujian'])) {
            # code...
            $hari_tugas_ujian = $this->input->post('hari_tugas_ujian');
            $tanggal_tugas_ujian = $this->input->post('tanggal_tugas_ujian');
            $id_kelas  = $this->input->post('id_kelas');
            $id_mapel = $this->input->post('id_mapel');
            $subjek_tugas_ujian = $this->input->post('subjek_tugas_ujian');
            $waktu_mulai = $this->input->post('waktu_mulai');
            $waktu_selesai = $this->input->post('waktu_selesai');
            $pertemuan_tugas_ujian = $this->input->post('pertemuan_tugas_ujian');
            $keterangan_tugas_ujian = $this->input->post('keterangan_tugas_ujian');

            $this->db->query("UPDATE tugas_ujian SET hari_tugas_ujian = '$hari_tugas_ujian', tanggal_tugas_ujian = '$tanggal_tugas_ujian', id_kelas = $id_kelas, id_mapel=$id_mapel, subjek_tugas_ujian='$subjek_tugas_ujian', waktu_mulai='$waktu_mulai', waktu_selesai='$waktu_selesai', pertemuan_tugas_ujian=$pertemuan_tugas_ujian, keterangan_tugas_ujian = '$keterangan_tugas_ujian' WHERE id_tugas_ujian = $id ");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil dirubah</div>');
            redirect('guru_report/kelola_tugas_ujian/');
        }
    }

    function delete_tugas_ujian($id)
    {
        //here
        $this->db->query("DELETE FROM tugas_ujian WHERE id_tugas_ujian = $id");
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deleted</div>');
        redirect('guru_report/kelola_tugas_ujian/');
    }

    function kelola_forum_diskusi()
    {
        //here
        $data['title'] = 'Kelola Forum Diskusi';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_saya = $this->session->userdata('id');
       /* print_r($this->tahunAktif);
        die();*/
        //$mapel_saya = $this->db->query("SELECT id_mapel FROM user WHERE id=$id_saya")->row_array();
        $kelas_saya = $this->db->query("SELECT * FROM kelas WHERE id_wali_kelass =$id_saya ")->row_array();      
        $data['dd_kelas'] = $this->db->query("SELECT * FROM kelas")->result_array();
        $data['dd_mapel'] = $this->db->query("SELECT * FROM mapel")->result_array(); 
        $data['ls'] = $this->db->query("SELECT * FROM list_forum 
        INNER JOIN kelas ON list_forum.id_kelas = kelas.id_kelas 
        INNER JOIN mapel ON list_forum.id_mapel = mapel.id_mapel
        WHERE list_forum.id_tahun= $this->tahunAktif
        AND list_forum.id_guru=".intval($id_saya))->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/kelola_forum_diskusi', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['submit_list_forum'])) {
            # code...
            if (!empty($_FILES['image_list_forum']['name'])) {
                # code...
                $image_name = str_replace(' ', '_', $_FILES['image_list_forum']['name']);
                $config['upload_path'] = './upload/image_list_forum/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['file_name'] = $image_name;
                $this->upload->initialize($config);
                $this->upload->do_upload('image_list_forum');
            }else{
                $image_name = '';
            }
            $nama_list_forum = $this->input->post('nama_list_forum');
            $image_name = $image_name;
            $deskripsi_list_forum = $this->input->post('deskripsi_list_forum');
            $id_kelas = $this->input->post('id_kelas');
            $id_mapel = $this->input->post('id_mapel');
            $id_status = $this->input->post('id_status');

            $this->db->query("INSERT INTO list_forum SET nama_list_forum ='$nama_list_forum',
 image_list_forum = '$image_name',
 deskripsi_list_forum = '$deskripsi_list_forum',
  id_kelas=$id_kelas,
   id_mapel=$id_mapel,
   id_guru=$id_saya,
   id_tahun=$this->tahunAktif,
   id_status=$id_status ");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil ditambahkan</div>');
            redirect('guru_report/kelola_forum_diskusi/');
        }
    }

    function delete_forum_diskusi($id)
    {

        $this->db->where('id_list_forum',$id);
        $delete =  $this->db->delete('list_forum');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Forum diskusi deleted</div>');
        redirect('guru_report/kelola_forum_diskusi/');
    }

    function komentar($id)
    {
        //here
        $data['title'] = 'Kelola Forum Diskusi';    
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); 
        $data['ls'] = $this->db->query("SELECT * FROM list_forum INNER JOIN kelas ON list_forum.id_kelas = kelas.id_kelas INNER JOIN mapel ON list_forum.id_mapel = mapel.id_mapel WHERE id_list_forum = $id")->row_array();    
        $data['komentars'] = $this->db->query("SELECT * FROM komentar_forum INNER JOIN user ON komentar_forum.id_sender = user.id WHERE id_list_forum = $id")->result_array(); 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/komentar', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['submit_komentar_guru'])) {
            # code...
            $komentar_forum = $this->input->post('komentar_forum');
            $id = $id;
            $id_sender = $this->session->userdata('id');
            $id_kelas = $this->input->post('id_kelas');
            $waktu_komentar_forum = time();

            $this->db->query("INSERT INTO komentar_forum SET komentar_forum = '$komentar_forum', id_list_forum = $id, id_sender = $id_sender, waktu_komentar_forum= '$waktu_komentar_forum' ");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil ditambahkan</div>');
            redirect('guru_report/komentar/'.$id);
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
        redirect('guru_report/komentar/'.$id_forum);
    }
}