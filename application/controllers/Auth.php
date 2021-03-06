<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('template/auth_footer');
		} else {
			$this->_login();
		}
	}


	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Wrong Password! </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Email is not Active! </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Email is not Registered! </div>');
			redirect('auth');
		}
	}

	public function registration()
	{

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This Email already registered!'
		]);
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[3]|matches[password2]',
			[
				'matches' => 'Password not match',
				'min_length' => 'Password too short'
			]
		);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registration';
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('template/auth_footer');
		} else {
			$email = $this->input->post('email', true);
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($email),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
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

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);
			$this->_sendEmail($token, 'verify');
			$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Account Successfully Registered! </div>');
			redirect('auth');
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' 	=> 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'kanggara115@gmail.com',
			'smtp_pass' => 'AKU.KELVINa11512229141234',
			'smtp_port' => 465,
			'mailtype' 	=> 'html',
			'charset' 	=> 'utf-8',
			'newline' 	=> "\r\n"
		];
		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('kanggara75@gmail.com', 'Admin TheSiS');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Account Activation');
			$this->email->message('Click this link to activate your TheSiS Account: <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Here</a>');
		} elseif ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset your TheSiS Account Password: <a href="' . base_url() . 'auth/reset?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Here</a>');
		}
		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				if (time() - $user_token['date'] < (60 * 60 * 24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">' . $email . ' Activated!</div>');
					redirect('auth');
				} else {
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Token Expiert!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Token Invalid!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Email Not Found!</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">You Have Been Logged Out! </div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('errors/html/error_403');
	}

	public function forgot()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Forgot Password';
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/forgot');
			$this->load->view('template/auth_footer');
		} else {
			$email = $this->input->post('email');
			$cek_user_token = $this->db->get_where('user_token', ['email' => $email])->row_array();
			if ($cek_user_token) {
				$this->db->delete('user_token', ['email' => $email]);
				$user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();
				if ($user) {
					$token = base64_encode(random_bytes(32));
					$user_token = [
						'email' => $email,
						'token' => $token,
						'date' => time()
					];

					$this->db->insert('user_token', $user_token);
					$this->_sendEmail($token, 'forgot');
					$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Please Check Your Email to reset your password</div>');
					redirect('auth/forgot');
				} else {
					$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Email Not Found or Not Activated!</div>');
					redirect('auth/forgot');
				}
			}
		}
	}

	public function reset()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				if (time() - $user_token['date'] < (60 * 60 * 24)) {
					$this->session->set_userdata('reset_pass', $email);
					$this->changePass();
				} else {
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Token Expiert!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Token Invalid!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('messege', '<div class="alert alert-danger" role="alert">Email Not Found or Not Activated!</div>');
			redirect('auth');
		}
	}

	public function changePass()
	{
		if (!$this->session->userdata('reset_pass')) {
			redirect('auth');
		}
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[password1]');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Reset Password';
			$this->load->view('template/auth_header', $data);
			$this->load->view('auth/cp');
			$this->load->view('template/auth_footer');
		} else {
			$password1 = $this->input->post('password1');
			$email = $this->session->userdata('reset_pass');
			$password = password_hash($password1, PASSWORD_DEFAULT);
			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');
			$this->db->delete('user_token', ['email' => $email]);
			$this->session->unset_userdata('reset_pass');
			$this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">Password Has been Change!</div>');
			redirect('auth');
		}
	}
}
