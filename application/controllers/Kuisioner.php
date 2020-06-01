<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuisioner extends CI_Controller
{
    public function index()
	{
        $data['title'] = 'Kuisioner';
        $this->load->view('template/auth_header', $data);
        $this->load->view('kuisioner/index', $data);
        $this->load->view('template/auth_footer');
    }
    
    public function mulai()
	{
        $data['title'] = 'Kuisioner';
        $this->load->view('template/auth_header', $data);
        $this->load->view('kuisioner/index', $data);
        $this->load->view('template/auth_footer');
	}
}