<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontrol extends CI_Controller
{
  public function acc()
  {
    $this->load->view('kontrol/acc');
  }
}
