<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Kontrol_model', 'kontrol');
    $this->load->model('User_model', 'user');
  }

  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $response = array();
      $email = $_POST['email'];
      $password = $_POST['password'];

      $user = $this->db->get_where('user', ['email' => $email])->row_array();
      $allKonttol = $this->kontrol->getAllKontrol();
      $accData = $this->kontrol->countMapData();
      $lastLocation = $this->kontrol->getLastLocation();

      $response = [
        'name' => $user['name'],
        'email' => $user['email'],
        'image' => $user['image'],
        'value' => (int)$user['role_id'],
        'password' => $user['password'],
        'date_created' => date('d F Y', $user['date_created']),
        'GPS' => (int)$allKonttol[0]['state'],
        'Alarm' => (int)$allKonttol[1]['state'],
        'Listrik' => (int)$allKonttol[2]['state'],
        'Mesin' => (int)$allKonttol[3]['state'],
        'Notif' => (int)$allKonttol[4]['state'],
        'MapCount' => (int)$accData[0]['COUNT(*)'],
        'lastLon' => number_format((float)$lastLocation[0]['lon'], 6, '.', ''),
        'lastLat' => number_format((float)$lastLocation[0]['lat'], 6, '.', ''),
        'lastTime' => date('d F Y', $lastLocation[0]['time']),
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
      $uid = 'TheSiSApps';
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $cek = $this->db->get_where('user', ['email' => $email])->row_array();

      $data = [
        'name' => htmlspecialchars($name),
        'email' => htmlspecialchars($email),
        'image' => 'default.jpg',
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 0,
        'date_created' => time()
      ];
      $token = base64_encode(random_bytes(32));
      $user_token = [
        'email' => $email,
        'token' => $token,
        'date' => time()
      ];
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
    } else {
      $this->load->view('errors/html/error_403.php');
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

  public function user()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $uid = $_POST['uid'];
      $name = $_POST['name'];
      $id = (int)$_POST['id'];
      $email = $_POST['email'];
      $role = (int)$_POST['role'];
      $status = (int)$_POST['status'];
      if ($uid == 'AdminTheSiS') {
        $this->user->updateUserRole($id, $role);
        $this->user->updateUsername($id, $name);
        $this->user->updateUserEmail($id, $email);
        $this->user->updateUserStatus($id, $status);
        $user = $this->user->getAllUser();
        echo json_encode($user, JSON_NUMERIC_CHECK);
      } else {
        $this->load->view('errors/html/error_403.php');
      }
    } else if ($_SERVER['REQUEST_METHOD'] == "GET") {
      $user = $this->user->getAllUser();
      echo json_encode($user, JSON_NUMERIC_CHECK);
    } else {
      $this->load->view('errors/html/error_403.php');
    }
  }

  public function kontrol()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $id = (int)$_POST['id'];
      $state = (int)$_POST['state'];
      $this->kontrol->updateOutput($id, $state);
      $allKonttol = $this->kontrol->getAllKontrol();
      $mapData = $this->kontrol->countMapData();
      $lastLocation = $this->kontrol->getLastLocation();
      $response['GPS'] = (int)$allKonttol[0]['state'];
      $response['Alarm'] = (int)$allKonttol[1]['state'];
      $response['Listrik'] = (int)$allKonttol[2]['state'];
      $response['Mesin'] = (int)$allKonttol[3]['state'];
      $response['Notif'] = (int)$allKonttol[4]['state'];
      $response['MapCount'] = (int)$mapData[0]['COUNT(*)'];
      $response['lastLon'] = number_format((float)$lastLocation[0]['lon'], 6, '.', '');
      $response['lastLat'] = number_format((float)$lastLocation[0]['lat'], 6, '.', '');
      $response['lastTime'] = date('d F Y', $lastLocation[0]['time']);
      echo json_encode($response, JSON_NUMERIC_CHECK);
    } else if ($_SERVER['REQUEST_METHOD'] == "GET") {
      $allKonttol = $this->kontrol->getAllKontrol();

      $mapData = $this->kontrol->countMapData();
      $lastLocation = $this->kontrol->getLastLocation();

      $response['GPS'] = (int)$allKonttol[0]['state'];
      $response['Alarm'] = (int)$allKonttol[1]['state'];
      $response['Listrik'] = (int)$allKonttol[2]['state'];
      $response['Mesin'] = (int)$allKonttol[3]['state'];
      $response['Notif'] = (int)$allKonttol[4]['state'];
      $response['MapCount'] = (int)$mapData[0]['COUNT(*)'];
      $response['lastLon'] = number_format((float)$lastLocation[0]['lon'], 6, '.', '');
      $response['lastLat'] = number_format((float)$lastLocation[0]['lat'], 6, '.', '');
      $response['lastTime'] = date('d F Y', $lastLocation[0]['time']);
      echo json_encode($response, JSON_NUMERIC_CHECK);
    } else {
      $this->load->view('errors/html/error_403.php');
    }
  }

  public function acc()
  {
    $acc = $this->kontrol->getAllAcc();
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
      echo json_encode($acc, JSON_NUMERIC_CHECK);
    } else {
      $this->load->view('errors/html/error_403.php');
    }
  }

  public function maplist()
  {
    $lastLocation = $this->kontrol->getLastLocation();
    //Longitude
    $response['0Lon'] = number_format((float)$lastLocation[0]['lon'], 6, '.', '');
    $response['1Lon'] = number_format((float)$lastLocation[1]['lon'], 6, '.', '');
    $response['2Lon'] = number_format((float)$lastLocation[2]['lon'], 6, '.', '');
    $response['3Lon'] = number_format((float)$lastLocation[3]['lon'], 6, '.', '');
    $response['4Lon'] = number_format((float)$lastLocation[4]['lon'], 6, '.', '');
    $response['5Lon'] = number_format((float)$lastLocation[5]['lon'], 6, '.', '');
    $response['6Lon'] = number_format((float)$lastLocation[6]['lon'], 6, '.', '');
    $response['7Lon'] = number_format((float)$lastLocation[7]['lon'], 6, '.', '');
    $response['8Lon'] = number_format((float)$lastLocation[8]['lon'], 6, '.', '');
    $response['9Lon'] = number_format((float)$lastLocation[9]['lon'], 6, '.', '');
    $response['10Lon'] = number_format((float)$lastLocation[10]['lon'], 6, '.', '');
    $response['11Lon'] = number_format((float)$lastLocation[11]['lon'], 6, '.', '');
    //Latitude
    $response['0Lat'] = number_format((float)$lastLocation[0]['lat'], 6, '.', '');
    $response['1Lat'] = number_format((float)$lastLocation[1]['lat'], 6, '.', '');
    $response['2Lat'] = number_format((float)$lastLocation[2]['lat'], 6, '.', '');
    $response['3Lat'] = number_format((float)$lastLocation[3]['lat'], 6, '.', '');
    $response['4Lat'] = number_format((float)$lastLocation[4]['lat'], 6, '.', '');
    $response['5Lat'] = number_format((float)$lastLocation[5]['lat'], 6, '.', '');
    $response['6Lat'] = number_format((float)$lastLocation[6]['lat'], 6, '.', '');
    $response['7Lat'] = number_format((float)$lastLocation[7]['lat'], 6, '.', '');
    $response['8Lat'] = number_format((float)$lastLocation[8]['lat'], 6, '.', '');
    $response['9Lat'] = number_format((float)$lastLocation[9]['lat'], 6, '.', '');
    $response['10Lat'] = number_format((float)$lastLocation[10]['lat'], 6, '.', '');
    $response['11Lat'] = number_format((float)$lastLocation[11]['lat'], 6, '.', '');

    //Time
    $response['0Time'] = date('h:i:s d-m-y', $lastLocation[0]['time']);
    $response['1Time'] = date('h:i:s d-m-y', $lastLocation[1]['time']);
    $response['2Time'] = date('h:i:s d-m-y', $lastLocation[2]['time']);
    $response['3Time'] = date('h:i:s d-m-y', $lastLocation[3]['time']);
    $response['4Time'] = date('h:i:s d-m-y', $lastLocation[4]['time']);
    $response['5Time'] = date('h:i:s d-m-y', $lastLocation[5]['time']);
    $response['6Time'] = date('h:i:s d-m-y', $lastLocation[6]['time']);
    $response['7Time'] = date('h:i:s d-m-y', $lastLocation[7]['time']);
    $response['8Time'] = date('h:i:s d-m-y', $lastLocation[8]['time']);
    $response['9Time'] = date('h:i:s d-m-y', $lastLocation[9]['time']);
    $response['10Time'] = date('h:i:s d-m-y', $lastLocation[10]['time']);
    $response['11Time'] = date('h:i:s d-m-y', $lastLocation[11]['time']);

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
      echo json_encode($response, JSON_NUMERIC_CHECK);
    } else {
      $this->load->view('errors/html/error_403.php');
    }
  }
}
