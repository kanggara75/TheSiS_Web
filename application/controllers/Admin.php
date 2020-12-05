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
    $data['chart'] = $this->db->order_by('id', 'DESC')->get('acc', 40)->result_array();
    $this->load->model('Kontrol_model', 'kontrol');
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

  public function changeaccess()
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

    $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Access Changed! </div>');
  }

  public function updateKontrol()
  {
    $state = $this->input->post('state');
    $id = $this->input->post('id');
    $nama = $this->input->post('nama');
    if ($state == 1) {
      $this->db->set('state', 0);
      $this->db->where('id', $id);
      $this->db->update('kontrol');
      $this->session->set_flashdata('messege1', '<div class="alert alert-danger" role="alert">' . $nama . ' Changed to <strong>Off!</strong></div>');
    } else {
      $this->db->set('state', 1);
      $this->db->where('id', $id);
      $this->db->update('kontrol');
      $this->session->set_flashdata('messege1', '<div class="alert alert-success" role="alert">' . $nama . ' Changed to <strong>On!</strong></div>');
    }
  }

  public function getAllKontrol()
  {
    $data['title'] = 'Admin Page';
    $query = "SELECT * FROM  `kontrol`";
    $kontrol = $this->db->query($query);
    $this->load->view('template/header', $data);
    foreach ($kontrol->result_array() as $cp) {
      echo "<div class='row'>";
      echo "<div class='col-6 d-flex flex-row align-items-center justify-content-between'>";
      echo "<h1 class='tlabel'>" . $cp['nama'] . "</h1>";
      echo "</div>";
      echo "<div class='col-5'>";
      echo "<label class='switch'>";
      echo "<input class='switch-input' type='checkbox' data-id='" . $cp['id'] . "' data-nama='" . $cp['nama'] . "' data-state='"  . $cp['state'] . "'";
      $cek = check_switch($cp['id'], $cp['state']);
      echo $cek;
      echo ">";
      echo "<span class='slider'></span></label>";
      echo "</div>";
      echo "</div>";
    }
    $this->load->view('template/footer', $data);
  }
}
