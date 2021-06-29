<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Wali_report extends CI_Controller
{
	
	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
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

    function report()
    {
        $data['title'] = 'Report';
        $id_wali_kelas = $this->session->userdata('id');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['report'] = $this->db->query("SELECT id_siswa, name, nomor_induk FROM nilai INNER JOIN user ON nilai.id_siswa=user.id WHERE nilai.id_wali_kelas = $id_wali_kelas GROUP BY id_siswa ")->result_array();
        $data['mapel'] = $this->db->query("SELECT * FROM user INNER JOIN mapel ON user.id_mapel = mapel.id_mapel ")->row_array();
        $data['tahun'] = $this->db->query("SELECT * FROM tahun ORDER BY id_tahun DESC")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/report', $data);
        $this->load->view('templates/footer');

    }

    function report_tahun($tahun)
    {
        //here
        $data['title'] = 'Report';
        $data['tahun'] = $this->db->query("SELECT * FROM tahun")->result_array();
        $id_wali_kelas = $this->session->userdata('id');
        $data['kelas_diampu'] = $this->db->get_where('kelas', ['id_wali_kelass' => $this->session->userdata('id')])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $kelas_diampu = $data['kelas_diampu']['id_kelas'];
        

        $data['report_tahun'] = $this->db->query("SELECT id_siswa, name, nomor_induk FROM nilai 
INNER JOIN user ON id_siswa=id 
WHERE nilai.id_kelas = $kelas_diampu
 AND id_tahun=$tahun 
 AND user.kelas_sekarang =  $kelas_diampu 
 GROUP BY id_siswa")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/report_tahun', $data);
        $this->load->view('templates/footer');
    }

    function detail_report($id_siswa, $tahun)
    {
        //tambah tahun sbg param
        $data['title'] = 'Report';
        $id_wali_kelas = $this->session->userdata('id');
        $data['bio_siswa'] = $this->db->query("SELECT * FROM user WHERE id=$id_siswa")->row_array();
        $data['kelas_diampu'] = $this->db->get_where('kelas', ['id_wali_kelass' => $this->session->userdata('id')])->row_array();
        $this->db->select('*');
        $this->db->from("user");
        $this->db->join('kelas', 'user.kelas_sekarang = kelas.id_kelas');
        $this->db->where('user.email',$data['bio_siswa']['email']);
        $data['user'] = $this->db->get();
        $data['user'] = $data['user']->result_array()[0];

        $kelas_sekarang = $data['bio_siswa']['kelas_sekarang'];
        $nilai_saat_dikelas = "";

        $data['tahun_ajar'] = $this->db->get_where('tahun',array('id_tahun'=>$tahun))->result_array()[0];
        $data['tahun_ajar'] = $data['tahun_ajar']['tahun'];

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

        $data['value'] = $this->db->query("SELECT * FROM nilai INNER JOIN tahun ON tahun.id_tahun = nilai.id_tahun INNER JOIN kelas ON nilai.id_kelas = kelas.id_kelas WHERE id_siswa = $id_siswa  AND nilai.id_tahun = $tahun")->row_array();
        $data['bio_wali'] = $this->db->query("SELECT * FROM user WHERE id = $id_wali_kelas")->row_array();
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/detail_report', $data);
        $this->load->view('templates/footer');
    }

    function cetak_detail_report($id_siswa, $tahun)
    {
        //tambah tahun sbg param
        $data['title'] = 'Report';
        $id_wali_kelas = $this->session->userdata('id');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bio_siswa'] = $this->db->query("SELECT * FROM user WHERE id=$id_siswa")->row_array();
        $data['nilai_A'] = $this->db->query("SELECT * FROM nilai INNER JOIN mapel ON nilai.mapel = mapel.id_mapel WHERE nilai.kelompok = 'A' AND id_siswa = $id_siswa  AND id_tahun = $tahun")->result_array();

        $data['nilai_B'] = $this->db->query("SELECT * FROM nilai INNER JOIN mapel ON nilai.mapel = mapel.id_mapel WHERE nilai.kelompok = 'B' AND id_siswa = $id_siswa AND id_tahun = $tahun")->result_array();
        $data['nilai_C'] = $this->db->query("SELECT * FROM nilai INNER JOIN mapel ON nilai.mapel = mapel.id_mapel WHERE nilai.kelompok = 'C' AND id_siswa = $id_siswa  AND id_tahun = $tahun")->result_array();
        $data['value'] = $this->db->query("SELECT * FROM nilai INNER JOIN tahun ON tahun.id_tahun = nilai.id_tahun INNER JOIN kelas ON nilai.id_kelas = kelas.id_kelas WHERE id_siswa = $id_siswa  AND nilai.id_tahun = $tahun")->row_array();
        $data['bio_wali'] = $this->db->query("SELECT * FROM user WHERE id = $id_wali_kelas")->row_array();
    
        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        $this->load->view('guru/cetak_detail_report', $data);
        $this->load->view('templates/footer');
    }


}