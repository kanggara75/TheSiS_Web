<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Tracking Secure System';
		$this->load->view('landing/index2', $data);
	}
}
