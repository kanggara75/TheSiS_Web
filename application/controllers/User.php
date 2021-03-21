<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    login_check();
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['chart'] = $this->db->order_by('id', 'DESC')->get('acc', 40)->result_array();
    $data['map'] = $this->db->order_by('id', 'DESC')->get('map', 5)->result_array();
    $this->load->model('Kontrol_model', 'kontrol');
    $data['kontrol'] = $this->kontrol->getAllKontrol();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('template/footer', $data);
  }

  public function profile()
  {
    $data['title'] = 'My Profile';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('user/profile', $data);
    $this->load->view('template/footer');
  }

  public function accmodel()
  {
    $data['title'] = '3d View';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('template/topbar', $data);
    $this->load->view('user/accmodel', $data);
    $this->load->view('template/footer');
  }

  public function edit()
  {
    $data['title'] = 'Edit Profile';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('user/edit', $data);
      $this->load->view('template/footer');
    } else {
      $name = $this->input->post('name');
      $email = $this->input->post('email');

      //cek update image
      $upload_image = $_FILES['image']['name'];
      if ($upload_image) {
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size']     = '2048';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
          $old_image = $data['user']['image'];
          if ($old_image != 'default.jpg') {
            unlink(FCPATH . '/assets/img/profile/' . $old_image);
          }

          $new_image = $this->upload->data('file_name');
          $this->db->set('image', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $this->db->set('name', $name);
      $this->db->where('email', $email);
      $this->db->update('user');
      $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Your Profile Has Been Updated! </div>');
      redirect('user');
    }
  }

  public function cp()
  {
    $data['title'] = 'Change Password';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
    $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password]');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('template/topbar', $data);
      $this->load->view('user/change_password', $data);
      $this->load->view('template/footer');
    } else {
      $current_password = $this->input->post('current_password');
      $new_password = $this->input->post('new_password');
      if (!password_verify($current_password, $data['user']['password'])) {
        $this->session->set_flashdata('messege', '<div class="alert alert-warning" role="alert">Current Password Incorect</div>');
        redirect('user/cp');
      } else {
        if ($current_password == $new_password) {
          $this->session->set_flashdata('messege', '<div class="alert alert-warning" role="alert">New Password cannot be same as Current Password</div>');
          redirect('user/cp');
        } else {
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
          $this->db->set('password', $password_hash);
          $this->db->where('email', $this->session->userdata('email'));
          $this->db->update('user');
          $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Password Changed!</div>');
          redirect('user/cp');
        }
      }
    }
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
}
