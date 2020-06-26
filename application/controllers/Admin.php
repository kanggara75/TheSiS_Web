<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    login_check();
  }

  public function index()
	{
    $data['title'] = 'Admin Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->model('Kontrol_Model', 'kontrol');    
    $data['kontrol'] = $this->kontrol->getAllKontrol();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('template/footer', $data);
  }

  public function role()
	{
    $data['title'] = 'Role Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['role'] = $this->db->get('user_role')->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('admin/role', $data);
    $this->load->view('template/footer', $data);
  }

  public function roleAccess($role_id)
	{
    $data['title'] = 'Role Access Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
    $this->db->where('id !=', 1);
    $data['menu'] = $this->db->get('user_menu')->result_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('admin/role-access', $data);
    $this->load->view('template/footer', $data);
  }

  public function updateKontrol()
  {
    $id = $this->input->get('id');
    $data = [
      'state' => $this->input->get('state'),
    ];
    $this->db->where('id', $id);
    $this->db->update('kontrol', $data);
    redirect('admin');
  }
}
