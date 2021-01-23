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
        'value' => (int)$user['role_id'],
        'password' => $user['password'],
        'date_created' => date('d F Y', $user['date_created']),
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
            $data['value'] = 0;
            $data['messege'] = "Username or Password is Wrong!";
            echo json_encode($data);
          }
        } else {
          $data['value'] = 3;
          $data['messege'] = "Email not activated yet";
          echo json_encode($data);
        }
      } else {
        $data['value'] = 4;
        $data['messege'] = "Email not found";
        echo json_encode($data);
      }
    }
  }

  public function register()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $response = array();
      $uid = $_POST['uid'];
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $is_active = $_POST['is_active'];

      $data = [
        'name' => htmlspecialchars($name),
        'email' => htmlspecialchars($email),
        'image' => 'default.jpg',
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => $is_active,
        'date_created' => time()
      ];
      $token = base64_encode(random_bytes(32));
      $user_token = [
        'email' => $email,
        'token' => $token,
        'date' => time()
      ];
      $cek = $this->db->get_where('user', ['email' => $email])->row_array();
      if ($uid == 'TheSiSApps') {
        if (isset($cek)) {
          $response['value'] = 0;
          $response['messege'] = "Email Telah Terdaftar";
          echo json_encode($response);
        } else {
          if ($name == null) {
            $response['value'] = 3;
            $response['messege'] = "Name Can't be Null";
            echo json_encode($response);
          } else {
            if ($password == null) {
              $response['value'] = 4;
              $response['messege'] = "Password Can't be Null";
              echo json_encode($response);
            } else {
              if ($email == null) {
                $response['value'] = 5;
                $response['messege'] = "Email Can't be Null";
                echo json_encode($response);
              } else {
                $this->db->insert('user', $data);
                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'verify');
                $response['value'] = 1;
                $response['messege'] = "Sign Up Success";
                echo json_encode($response);
              }
            }
          }
        }
      } else {
        $response['value'] = 2;
        $response['messege'] = "Wrong Uid";
        echo json_encode($response);
      }
    }
  }


  private function _sendEmail($token, $type)
  {
    $config = [
      'protocol'   => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'kanggara115@gmail.com',
      'smtp_pass' => 'AKU.KELVINa11512229141234',
      'smtp_port' => 465,
      'mailtype'   => 'html',
      'charset'   => 'utf-8',
      'newline'   => "\r\n"
    ];
    $this->load->library('email', $config);
    $this->email->initialize($config);

    $this->email->from('kanggara75@gmail.com', 'Admin TheSiS');
    $this->email->to($this->input->post('email'));

    if ($type == 'verify') {
      $this->email->subject('Account Activation');
      $this->email->message('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
          <title>Demystifying Email Design</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        </head>

        <body style="margin: 0; padding: 0;">
          <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
            <tr>
              <td align="center" bgcolor="#f8f8f8" style="padding: 40px 0 20px 0;">
                <img src="https://raw.githubusercontent.com/kanggara75/TheSiS_Web/master/assets/img/logo_TheSiS.png" alt="TheSiS Logo" width="100" height="100" />
                <br>
                <h3>Account Activation</h3>
              </td>
            </tr>
            <tr>
              <td align="center" bgcolor="#ee4c50">
              Click this link to activate your TheSiS Account: <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Here</a>
              </td>
            </tr>
          </table>
        </body>
        </html>');
    } elseif ($type == 'forgot') {
      $this->email->subject('Reset Password');
      $this->email->message('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
          <title>Demystifying Email Design</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        </head>
        <body style="margin: 0; padding: 0;">
          <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
            <tr>
              <td align="center" bgcolor="#f8f8f8" style="padding: 40px 0 20px 0;">
                <img src="https://raw.githubusercontent.com/kanggara75/TheSiS_Web/master/assets/img/logo_TheSiS.png" alt="TheSiS Logo" width="100" height="100" />
                <br>
                <h3>Reset Password</h3>
              </td>
            </tr>
            <tr>
              <td align="center" bgcolor="#ee4c50">
                Click this link to reset your TheSiS Account Password: <a href="' . base_url() . 'auth/reset?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Here</a>
              </td>
            </tr>
          </table>
        </body>
        </html>');
    }
    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }
}
