<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('email')){
      redirect('auth');
    }
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
