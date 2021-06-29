<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Tahun extends CI_Controller
{
	
	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
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

    function add_tahun()
    {
        //here
        $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');

        if ($this->form_validation->run() == false) {
           $data['title'] = 'Kelola Tahun';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tahun/index', $data);
        $this->load->view('templates/footer');
        } else {
            //here
            $tahun = $this->input->post('tahun');

            $this->db->query("INSERT INTO tahun VALUES(NULL, '$tahun', '0' )");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tahun berhasil ditambahkan.</div>');
            redirect('tahun/');
        }
    }

    function aktifkan($id)
    {
        //here
        $this->db->query("UPDATE tahun SET is_active = 0");
        $this->db->query("UPDATE tahun SET is_active = 1 WHERE id_tahun = $id");
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil diaktifkan</div>');
        redirect('tahun/');
    }

    function update($id)
    {
        //here
        $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Kelola Tahun';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['value'] = $this->db->query("SELECT * FROM tahun WHERE id_tahun = $id")->row_array();
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tahun/update', $data);
        $this->load->view('templates/footer');
        } else {
            //here
            $id_tahun = $this->input->post('id_tahun');
            $tahun = $this->input->post('tahun');

            $this->db->query("UPDATE tahun SET tahun = '$tahun' WHERE id_tahun = $id_tahun");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tahun berhasil dirubah.</div>');
            redirect('tahun/');
        }
    }

    function delete($id)
    {
        $this->db->query("DELETE FROM tahun WHERE id_tahun = $id");
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Deleted</div>');
        redirect('tahun/');
    }

}