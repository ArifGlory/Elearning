<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Kelola extends CI_Controller
{
    var $temp_id_siswa = "";
	
	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
    	$data['title'] = 'Kelola';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tenants'] = $this->db->query("SELECT * FROM user WHERE role_id = 2")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tenant_management/index', $data);
        $this->load->view('templates/footer');
    }

    function kelola_siswa()
    {
        //here
        $data['title'] = 'Kelola Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->db->query("SELECT * FROM user INNER JOIN kelas ON user.kelas_sekarang = kelas.id_kelas WHERE role_id = 3")->result_array();
        $data['dd_wali_kelas'] = $this->db->query("SELECT * FROM user WHERE role_id = 4")->result_array();
        $data['dd_agama'] = $this->db->query("SELECT * FROM agama")->result_array();
        $data['dd_kelas'] = $this->db->query("SELECT * FROM kelas")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola/kelola_siswa', $data);
        $this->load->view('templates/footer');
    }
    function add_siswa()
    {
        //here
        $this->form_validation->set_rules('nama', 'Nilai', 'trim|required');
        $this->form_validation->set_rules('nis', 'NIS', 'trim|required');

        if ($this->form_validation->run() == false) {
           $data['title'] = 'Kelola Nilai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola/kelola_siswa', $data);
        $this->load->view('templates/footer');
        } else {
            //here
            $nis = $this->input->post('nis');
            $nisn = $this->input->post('nisn');
            $nama = $this->input->post('nama');
            $date_created = time();
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = date('Y-m-d', strtotime($this->input->post('tanggal_lahir')));
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $kelas_sekarang = $this->input->post('kelas_sekarang');
            $id_wali_kelas = $this->input->post('id_wali_kelas');
            $agama = $this->input->post('id_agama');
            $status = $this->input->post('status');
            $anak_ke = $this->input->post('anak_ke');
            $alamat = $this->input->post('alamat');
            $phone = $this->input->post('phone');
            $sekolah_asal = $this->input->post('sekolah_asal');
            $di_kelas = $this->input->post('di_kelas');
            $tgl_diterima = date('Y-m-d', strtotime($this->input->post('tgl_diterima')));
            $nama_ayah = $this->input->post('nama_ayah');
            $nama_ibu = $this->input->post('nama_ibu');
            $alamat_ortu = $this->input->post('alamat_ortu');
            $phone_ortu = $this->input->post('phone_ortu');
            $kerja_ayah = $this->input->post('kerja_ayah');
            $kerja_ibu = $this->input->post('kerja_ibu');
            $nama_wali = $this->input->post('nama_wali');
            $alamat_wali = $this->input->post('alamat_wali');
            $phone_wali = $this->input->post('phone_wali');
            $kerja_wali = $this->input->post('kerja_wali');
            $email = $nis.'@gmail.com';
            $password = password_hash($nis, PASSWORD_DEFAULT);

            $this->db->query("INSERT INTO user SET name= '$nama', email='$email', image='default.jpg', password='$password', role_id=3, is_active=1, date_created=$date_created,nomor_induk= '$nis',id_wali_kelas= $id_wali_kelas, alamat='$alamat', nisn='$nisn', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin',agama= '$agama', status='$status', anak_ke='$anak_ke', phone=$phone,sekolah_asal= '$sekolah_asal',di_kelas= '$di_kelas',tgl_diterima= '$tgl_diterima',nama_ayah= '$nama_ayah',nama_ibuk= '$nama_ibu',alamat_ortu= '$alamat_ortu', phone_ortu=$phone_ortu, kerja_ayah='$kerja_ayah', kerja_ibu='$kerja_ibu', nama_wali='$nama_wali', alamat_wali='$alamat_wali', phone_wali=$phone_wali, kerja_wali='$kerja_wali', kelas_sekarang='$kelas_sekarang' ");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Siswa berhasil ditambahkan.</div>');
            redirect('kelola/kelola_siswa/');
        }
    }

    function lihat($id)
    {
        //here
        $data['title'] = 'Kelola Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_wali_kelas = $this->db->query("SELECT id_wali_kelas FROM user WHERE id = $id")->row_array();
        $kls_skrg = $this->db->query("SELECT kelas_sekarang FROM user WHERE id=$id")->row_array();
        $data['kelas_sekarang'] = $this->db->query("SELECT * FROM kelas WHERE id_kelas = ".$kls_skrg['kelas_sekarang'])->row_array();
        $data['wali_kelas'] = $this->db->query("SELECT * FROM user WHERE id = ".$id_wali_kelas['id_wali_kelas'])->row_array();
        $data['siswa']= $this->db->query("SELECT * FROM user INNER JOIN kelas ON kelas.id_kelas = user.kelas_sekarang INNER JOIN agama ON user.agama=agama.id_agama WHERE user.role_id = 3 AND user.id=$id")->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola/lihat', $data);
        $this->load->view('templates/footer');
    }

    function update_siswa($id)
    {
        $data['title'] = 'Kelola Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->db->query("SELECT * FROM user INNER JOIN kelas ON kelas.id_kelas = user.kelas_sekarang WHERE role_id = 3 AND id=$id")->row_array();
        $data['dd_agama'] = $this->db->query("SELECT * FROM agama")->result_array();
        $data['kelas'] = $this->db->query("SELECT * FROM kelas")->result_array();
        
        $data['dd_wali_kelas'] = $this->db->query("SELECT * FROM user WHERE role_id = 4")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola/update', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['update_siswaaa'])) {
            # code...
            $nis = $this->input->post('nis');
            $nisn = $this->input->post('nisn');
            $nama = $this->input->post('nama');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = date('Y-m-d', strtotime($this->input->post('tanggal_lahir')));
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $kelas_sekarang = $this->input->post('kelas_sekarang');
           // $id_wali_kelas = $this->input->post('id_wali_kelas');
            $agama = $this->input->post('id_agama');
            $status = $this->input->post('status');
            $anak_ke = $this->input->post('anak_ke');
            $alamat = $this->input->post('alamat');
            $phone = $this->input->post('phone');
            $sekolah_asal = $this->input->post('sekolah_asal');
            $di_kelas = $this->input->post('di_kelas');
            $tgl_diterima = date('Y-m-d', strtotime($this->input->post('tgl_diterima')));
            $nama_ayah = $this->input->post('nama_ayah');
            $nama_ibu = $this->input->post('nama_ibu');
            $alamat_ortu = $this->input->post('alamat_ortu');
            $phone_ortu = $this->input->post('phone_ortu');
            $kerja_ayah = $this->input->post('kerja_ayah');
            $kerja_ibu = $this->input->post('kerja_ibu');
            $nama_wali = $this->input->post('nama_wali');
            $alamat_wali = $this->input->post('alamat_wali');
            $phone_wali = $this->input->post('phone_wali');
            $kerja_wali = $this->input->post('kerja_wali');
            //$email = $nis.'@gmail.com';
            //$password = password_hash($nis, PASSWORD_DEFAULT);
            $idnext = $id;

            $data_kelas = $this->db->get_where('kelas', ['id_kelas' => $kelas_sekarang])->row_array();
            $id_wali_kelas = $data_kelas['id_wali_kelass'];

            $this->db->query("UPDATE user SET nomor_induk = '$nis', nisn = '$nisn', name = '$nama',
 tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', 
 jenis_kelamin = '$jenis_kelamin', agama = '$agama',
  status = '$status', anak_ke = '$anak_ke',
   alamat = '$alamat', phone = '$phone', sekolah_asal= '$sekolah_asal',
    di_kelas = '$di_kelas', tgl_diterima = '$tgl_diterima', 
    nama_ayah = '$nama_ayah', nama_ibuk='$nama_ibu', alamat_ortu = '$alamat_ortu',
     phone_ortu = '$phone_ortu', kerja_ayah = '$kerja_ayah', kerja_ibu = '$kerja_ibu',
      nama_wali = '$nama_wali', alamat_wali='$alamat_wali', phone_wali = '$phone_wali',
       kerja_wali = '$kerja_wali', kelas_sekarang = '$kelas_sekarang', id_wali_kelas = $id_wali_kelas WHERE id=$id ");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update berhasil</div>');
            redirect('kelola/lihat/'.intval($idnext));
        }
    }

    function delete($id)    
    {
        //here
        $this->db->query('DELETE FROM user WHERE id='.intval($id));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deleted</div>');
        redirect('kelola/kelola_siswa');
    }

    function changePassword($id)
    {
        $data['title'] = 'Reset Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->db->query("SELECT * FROM user WHERE id=$id")->row_array();
        
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/reset_password', $data);
            $this->load->view('templates/footer');
        } else {
            $new_password = $this->input->post('new_password1');
            if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('id', $id);
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('kelola/kelola_siswa/');
                }
            
        }
    }

    function kelola_guru()
    {
        //here
        //here
        $data['title'] = 'Kelola Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['guru'] = $this->db->query("SELECT * FROM user INNER JOIN mapel ON user.id_mapel = mapel.id_mapel WHERE role_id = 2 OR role_id = 4")->result_array();
        $data['dd_mapel'] = $this->db->query("SELECT * FROM mapel")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola/kelola_guru', $data);
        $this->load->view('templates/footer');
    }

    function add_guru()
    {
        //here
        $this->form_validation->set_rules('name', 'Nama', 'trim|required');
        $this->form_validation->set_rules('nomor_induk', 'NIP', 'trim|required');

        if ($this->form_validation->run() == false) {
           $data['title'] = 'Kelola';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola/kelola_guru', $data);
        $this->load->view('templates/footer');
        } else {
            //here
            $name = $this->input->post('name');
            $nomor_induk = $this->input->post('nomor_induk');
            $date_created = time();
            $id_mapel = $this->input->post('id_mapel');
            $role_id = $this->input->post('role_id');
            $phone = $this->input->post('phone');
            $email = $nomor_induk.'@gmail.com';
            $password = password_hash($nomor_induk, PASSWORD_DEFAULT);

            $this->db->query("INSERT INTO user VALUES(NULL, '$name', '$email', 'default.jpg', '$password', $role_id, 1, $date_created, '$nomor_induk', $id_mapel, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, $phone, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL )");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil ditambahkan.</div>');
            redirect('kelola/kelola_guru/');
        }
    }

    function update_guru($par)
    {
        //here
        //here
        $data['title'] = 'Kelola Guru';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['guru'] = $this->db->query("SELECT * FROM user INNER JOIN mapel ON user.id_mapel = mapel.id_mapel WHERE id= $par")->row_array();
        $data['dd_mapel'] = $this->db->query("SELECT * FROM mapel")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola/update_guru', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['update_guru'])) {
            # code...
            $name = $this->input->post('name');
            $nomor_induk = $this->input->post('nomor_induk');
            $id_mapel = $this->input->post('id_mapel');
            $role_id = $this->input->post('role_id');
            $phone = $this->input->post('phone');
            $email = $nomor_induk.'@gmail.com';
            $password = password_hash($nomor_induk, PASSWORD_DEFAULT);

            $this->db->query("UPDATE user SET name = '$name', nomor_induk='$nomor_induk', id_mapel=$id_mapel, role_id = $role_id, phone=$phone, email = '$email', password = '$password' WHERE id=$par");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update berhasil</div>');
            redirect('kelola/kelola_guru/');
        }
    }

    function delete_guru($val)
    {
        $this->db->query("DELETE FROM user WHERE id=$val");
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deleted</div>');
        redirect('kelola/kelola_guru/');
    }

    function kelola_kelas()
    {
        //here
        $data['title'] = 'Kelola Kelas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->db->query("SELECT * FROM kelas INNER JOIN user ON user.id = kelas.id_wali_kelass")->result_array();
        $data['dd_mapel'] = $this->db->query("SELECT * FROM mapel")->result_array();
        $data['dd_wake'] = $this->db->query("SELECT * FROM user WHERE role_id = 4")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola/kelola_kelas', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['submit_kelas'])) {
            # code...
            $kelas = $this->input->post('kelas');
            $id_wali_kelas = $this->input->post('id_wali_kelas');
            $this->db->query("INSERT INTO kelas SET kelas= '$kelas', id_wali_kelass=$id_wali_kelas ");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil ditambahkan</div>');
            redirect('kelola/kelola_kelas');
        }
    }

    function update_kelas($id){
        //
        $data['title'] = 'Kelola Kelas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->db->query("SELECT * FROM kelas INNER JOIN user ON user.id = kelas.id_wali_kelass WHERE id_kelas = $id")->row_array();
        $data['dd_wake'] = $this->db->query("SELECT * FROM user WHERE role_id = 4")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola/update_kelas', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['update_kelas'])) {
            $kelas = $this->input->post('kelas');
            $id_wali_kelas = $this->input->post('id_wali_kelas');
            $this->db->query("UPDATE kelas SET kelas = '$kelas', id_wali_kelass = $id_wali_kelas WHERE id_kelas=$id");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil dirubah</div>');
            redirect('kelola/kelola_kelas/');
        }
    }

    function delete_kelas($id)
    {
        $this->db->query('DELETE FROM kelas WHERE id_kelas='.intval($id));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deleted</div>');
        redirect('kelola/kelola_kelas/');
    }

    function kelola_mapel()
    {
        //here
        $data['title'] = 'Kelola Mapel';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mapel'] = $this->db->query("SELECT * FROM mapel")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola/kelola_mapel', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['submit_mapel'])) {
            # code...
            $mapel = $this->input->post('mapel');
            $jumlah_pertemuan = $this->input->post('jumlah_pertemuan');
            $kelompok = $this->input->post('kelompok');
            $this->db->query("INSERT INTO mapel VALUES(NULL, '$mapel', '$kelompok', $jumlah_pertemuan)");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil ditambahkan</div>');
            redirect('kelola/kelola_mapel');
        }
    }

    function update_mapel($para)
    {
        //here
        $data['title'] = 'Kelola Mapel';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mapel'] = $this->db->query("SELECT * FROM mapel WHERE id_mapel=".intval($para))->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola/update_mapel', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['update_mapel'])) {
            # code...
            $mapel = $this->input->post('mapel');
            $jumlah_pertemuan = $this->input->post('jumlah_pertemuan');
            $kelompok = $this->input->post('kelompok');
            $this->db->query("UPDATE mapel SET mapel = '$mapel', kelompok='$kelompok', jumlah_pertemuan=$jumlah_pertemuan WHERE id_mapel = $para");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil dirubah</div>');
            redirect('kelola/kelola_mapel');
        }
    }

    function delete_mapel($id)
    {
        $this->db->query('DELETE FROM mapel WHERE id_mapel='.intval($id));
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deleted</div>');
        redirect('kelola/kelola_mapel/');
    }

    function kelola_user()
    {
        //here
        $data['title'] = 'Kelola User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['users'] = $this->db->query("SELECT user.id, user.name, user.image, user_role.role, user.role_id FROM user INNER JOIN user_role ON user.role_id = user_role.id")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola/kelola_user', $data);
        $this->load->view('templates/footer');
    }

    function history_siswa($id_siswa){
        $data['title'] = 'History Nilai Siswa';
        $this->temp_id_siswa = $id_siswa;
         $this->db->select('*');
        $this->db->from("user");
        $this->db->join('kelas', 'user.kelas_sekarang = kelas.id_kelas');
        $this->db->where('user.id',$id_siswa);
        $data['user'] = $this->db->get();
        $data['user'] = $data['user']->result_array()[0];
        
       
        $data['tahun'] = $this->db->query("SELECT * FROM tahun ORDER BY id_tahun DESC")->result_array();
        $tahun_aktif = $this->db->query("SELECT id_tahun FROM tahun WHERE is_active=1")->row_array();
        $data['kelas_sekarang'] = $this->db->query("SELECT kelas_sekarang FROM user where  id =".intval($id_siswa))->row_array();

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
        $data['id_siswa'] = $id_siswa;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola/report_history_siswa', $data);
        $this->load->view('templates/footer');
    }

    function report_siswa_tahun($tahun,$id_siswa){
        //$id_siswa = $this->temp_id_siswa;
         $data['title'] = 'Report Siswa Per Tahun Ajaran';

       
        $this->db->select('*');
        $this->db->from("user");
        $this->db->join('kelas', 'user.kelas_sekarang = kelas.id_kelas');
        $this->db->where('user.id',$id_siswa);
        $data['user'] = $this->db->get();
        $data['user'] = $data['user']->result_array()[0];

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
            $id_kelas = $data['nilai_A'][0]['id_kelas'];

            $kelas =  $this->db->get_where('kelas',array('id_kelas'=>$id_kelas))->result_array()[0];
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
        $data['id_siswa'] = $id_siswa;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelola/report_tahun', $data);
        $this->load->view('templates/footer');
    }

}