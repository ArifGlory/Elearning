<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa']= $this->db->query("SELECT COUNT(id) as siswa FROM user WHERE role_id=3")->row_array();
        $data['guru']= $this->db->query("SELECT COUNT(id) as guru FROM user WHERE role_id=2 OR role_id=4")->row_array();
        $data['kelas']= $this->db->query("SELECT COUNT(id_kelas) as kelas FROM kelas ")->row_array();
        $data['kalender'] = $this->db->query("SELECT * FROM kalender_kelas INNER JOIN kelas ON kelas.id_kelas=kalender_kelas.id_kelas INNER JOIN mapel ON mapel.id_mapel=kalender_kelas.id_mapel INNER JOIN user ON user.id=kalender_kelas.id_guru LIMIT 5")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    public function allusers()
    {
        $data['title'] = 'All Users';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['allusers'] = $this->db->query("SELECT * FROM user")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/allusers', $data);
        $this->load->view('templates/footer');
    }

    public function userManagement($id)
    {
        $this->form_validation->set_rules('role_id', 'Role ID', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Update User';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['userbyid'] = $this->db->query("SELECT * FROM user WHERE id=".intval($id))->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/updateactivation', $data);
            $this->load->view('templates/footer');
        }else{
            $role_id = $this->input->post('role_id');
            $this->db->query("UPDATE user SET role_id=$role_id WHERE id=".intval($id));
            redirect('admin/allusers');
        }
    }

}
