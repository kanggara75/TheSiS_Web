<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $response = array();
      $email = $_POST['email'];
      $password = $_POST['password'];

      $user = $this->db->get_where('user', ['email' => $email])->row_array();
      $response = [
        'name' => $user['name'],
        'email' => $user['email'],
        'image' => $user['image'],
        'password' => $user['password'],
        'value' => $user['role_id'],
        'is_active' => $user['is_active'],
        'date_created' => $user['date_created'],
      ];

      if ($user) {
        if ($user['is_active'] == 1) {
          if (password_verify($password, $user['password'])) {
            if ($user['role_id'] == 1) {
              $response['messege'] = "Login Admin Berhasil";
              echo json_encode($response);
            } else {
              $response['messege'] = "Login Member Berhasil";
              echo json_encode($response);
            }
          } else {
            $response['value'] = 0;
            $response['messege'] = "Username or Password is Wrong!";
            echo json_encode($response);
          }
        } else {
          $response['value'] = 3;
          $response['messege'] = "Email not activated yet";
          echo json_encode($response);
        }
      } else {
        $response['value'] = 4;
        $response['messege'] = "Email not found";
        echo json_encode($response);
      }
    }
  }
}
