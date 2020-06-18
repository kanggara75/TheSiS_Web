<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuisioner extends CI_Controller
{
  public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
  }
  
  public function index()
	{
        $data['title'] = 'Kuisioner';
        $this->load->view('template/auth_header', $data);
        $this->load->view('kuisioner/index', $data);
        $this->load->view('template/auth_footer');
    }
    
  public function mulai()
	{
    $this->form_validation->set_rules('name', 'name', 'required|trim');
    if($this->form_validation->run() == false)
    {
    $data['title'] = 'Kuisioner';
    $this->load->view('template/auth_header', $data);
    $this->load->view('kuisioner/mulai', $data);
    $this->load->view('template/auth_footer');
    }else
    {
    $data = [
      'name'  => htmlspecialchars($this->input->post('name', true)),
      'jk'    => $this->input->post('jk'),
      'motor' => $this->input->post('motor'),
      'usia'  => $this->input->post('usia'),
      'A1'    => $this->input->post('A1'),
      'A2'    => $this->input->post('A2'),
      'A3'    => $this->input->post('A3'),
      'A4'    => $this->input->post('A4'),
      'A5'    => $this->input->post('A5'),
      'B1'    => $this->input->post('B1'),
      'B2'    => $this->input->post('B2'),
      'B3'    => $this->input->post('B3'),
      'B4'    => $this->input->post('B4'),
      'B5'    => $this->input->post('B5'),
      'C1'    => $this->input->post('C1'),
      'C2'    => $this->input->post('C2'),
      'C3'    => $this->input->post('C3'),
      'C4'    => $this->input->post('C4'),
      'C5'    => $this->input->post('C5'),
      'time' => time()
      ];
      $this->db->insert('kuisioner', $data);
      redirect('kuisioner/finish');
    }
  }

  public function finish()
	{
    $data['title'] = 'Thanks';
    $this->load->view('template/auth_header', $data);
    $this->load->view('kuisioner/finish', $data);
    $this->load->view('template/auth_footer');
	}
}
