<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	//start construct
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
		$this->load->library('form_validation');
	}
	//end construct

	// <=== start login ==>

	// start menampilkan page login
	public function index()
	{
		// $data['login'] = $this->m_model->get_karyawan();
		$this->load->view('auth/login');
	}
	//end menampilkan page login

	//start aksi untuk login
	public function aksi_login()
	{
		// $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required');
		// if ($this->form_validation->run() == false) {
		// 	$this->load->view('auth');
		// } else {
			$email = $this->input->post('email', true);
			$password = $this->input->post('password', true);
			$data = ['email' => $email];
			$query = $this->m_model->getWhere('user', $data);
			$result = $query = $query->row_array();
			if (!empty($result) && md5($password) === $result['password']) {
				$data = [
					'logged_in' => TRUE,
					'email' => $result['email'],
					'username' => $result['username'],
					'role' => $result['role'],
					'id' => $result['id'],
				];
				$this->session->set_userdata($data); // Menyimpan data ke dalam sesi

				// Memeriksa peran pengguna dan mengarahkannya ke halaman yang sesuai
				if ($this->session->userdata('role') == 'admin') {
					$this->session->set_flashdata('success_login_admin', 'Selamat datang sebagai admin');
					redirect(base_url() . "page/dashboard"); // menuju ke halaman page
				} elseif ($this->session->userdata('role') == 'karyawan') {
					$absen = $this->m_model->hariIniAbsen($result['id']);
					date_default_timezone_set('Asia/Jakarta');
					if (!empty($absen)) {
						redirect(base_url('page/dashboard'));
					} else {
						$data = [
							"id_karyawan" => $result['id'],
							"jam_masuk" => date('H:i:s'),
							"date" => date('Y-m-d'),
							"jam_pulang" => "0000-00-00 00:00:00",
							"status" => "not",
							"keterangan_izin" => "-",
							"kegiatan" => "-"
						];

						$eksekusi = $this->m_model->tambah_data('absensi', $data);
						if ($eksekusi) {
							$this->session->set_flashdata('berhasil_login, Selamat datang sebagai user');
							$id_absensi = $this->db->insert_id();
							redirect(base_url('page/edit_kegiatan/' . $id_absensi));
						} else {
							$this->session->set_flashdata('gagal_login, Gagal login huuuuuu');
							redirect(base_url('auth'));
						}
					}
				} else {
					$this->session->set_flashdata('error', 'gagal login');
					redirect(base_url() . "auth");
				}
			} else {
				$this->session->set_flashdata('pass_email, Password atau email salah, yahhh');
				redirect(base_url() . "auth"); // menuju kembali ke halaman login jika login gagal
			}
		// }
	}
	//end aksi login
	// <=== end login ===>

	//  <=== logout ===>
	function logout()
	{
		$this->session->sess_destroy(); // Menghapus sesi pengguna
		redirect(base_url('auth')); // Redirect kembali ke halaman home
	}

	//  <=== register karyawan ===>

	// start menampilkan page register karyawan
	public function register()
	{
		$this->load->view('auth/register');
	}
	// end menampilkan page register karyawan

	// start aksi register karyawan
	public function aksi_register()
	{
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$nama_depan = $this->input->post('nama_depan');
		$nama_belakang = $this->input->post('nama_belakang');
		$role = $this->input->post('role');
		$password = $this->input->post('password');
		if ($this->m_model->EmailSudahAda($email)) {
			$this->session->set_flashdata('error_email', 'Email ini sudah ada. Gunakan email lainya');
			redirect(base_url('auth/register'));
		} elseif($this->m_model->usernameSudahAda($username)) {
			$this->session->set_flashdata('error_username', 'Username ini sudah ada. Gunakan username lainya');
			redirect(base_url('auth/register'));
		}elseif (strlen($password) < 8 || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $password)) {
			// Password tidak memenuhi persyaratan
			$this->session->set_flashdata('error_message', 'Password harus memiliki setidaknya 8 karakter, satu huruf besar, satu huruf kecil, dan angka.');
			redirect('auth/register'); // Redirect kembali ke halaman registrasi
		} else {
			// Hash password menggunakan MD5						
			$hashed_password = md5($password);

			// Simpan data pengguna ke database
			$data = array(
				'username' => $username,
				'password' => $hashed_password,
				'email' => $email,
				'role' => $role,
				'nama_depan' => $nama_depan,
				'nama_belakang' => $nama_belakang,
			);

			$this->m_model->register($data); // Panggil model untuk menyimpan data

			// Redirect ke halaman login atau halaman selamat datang

			$this->session->set_flashdata('Berhasil_register_user', 'Berhasil Registter');
			redirect('auth');
		}
	}
	// public function aksi_register()
	// {
	// 	$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
	// 		'is_unique' => 'Username Ini Sudah Ada'
	// 	]);
	// 	$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required|trim');
	// 	$this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required|trim');
	// 	$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
	// 		'is_unique' => 'Email Ini Sudah Ada'
	// 	]);
	// 	$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

	// 	if ($this->form_validation->run() == FALSE) {
	// 		// Validasi gagal, tampilkan pesan kesalahan
	// 		$this->load->view('auth/register'); // Gantilah 'form_register' dengan nama view Anda
	// 	} else {
	// 		$data = [
	// 			'username' => $this->input->post('username', true),
	// 			'email' => $this->input->post('email', true),
	// 			'nama_depan' => $this->input->post('nama_depan', true),
	// 			'nama_belakang' => $this->input->post('nama_belakang', true),
	// 			'password' => md5($this->input->post('password')),
	// 			'role' => 'karyawan'
	// 		];
	// 		// $this->db->insert('user', $data);
	// 		$this->_sendEmail();
	// 		// Validasi berhasil, lanjutkan dengan tindakan registrasi
	// 		// Misalnya, simpan data pengguna ke database
	// 		redirect('auth'); // Redirect ke halaman sukses registrasi
	// 	}
	// }

	private function _sendEmail()
{
    $config = [
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_user' => 'fatiyasalsabila83@gmail.com',
        'smtp_pass' => 'fatiya123salsabila', // Gunakan password email yang benar
        'smtp_port' => 587, // Port SMTP Google biasanya 587
        'smtp_crypto' => 'tls', // Gunakan TLS (Ubah dari ssl menjadi tls)
        'mailtype' => 'html',
        'charset' => 'utf-8',
        'newline' => "\r\n"
    ];
    $this->load->library('email', $config);
    $this->email->from('fatiyasalsabila83@gmail.com', 'Fatiya salsabila');
    $this->email->to('fatiyasalsabila994@gmail.com');
    $this->email->subject('Testing');
    $this->email->message('Helllooooo');

    if ($this->email->send()) {
        return true;
    } else {
        echo $this->email->print_debugger();
        die;
    }
}


	// start aksi register karyawan
	// <=== end Register karyawan ===>

	// <=== start register admin ==>

	//start menampilkan page register admin
	public function register_admin()
	{
		$this->load->view('auth/register_admin');
	}
	//end menampilkan page register admin

	//start aksi register admin
	public function aksi_register_admin()
	{
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$nama_depan = $this->input->post('nama_depan');
		$nama_belakang = $this->input->post('nama_belakang');
		$role = $this->input->post('role');
		$password = $this->input->post('password');
		if ($this->m_model->EmailSudahAda($email)) {
			$this->session->set_flashdata('error_email', 'Email ini sudah di ada. Gunakan email lainya');
			redirect(base_url('auth/register_admin'));
		} elseif ($this->m_model->usernameSudahAda($username)) {
			$this->session->set_flashdata('error_username', 'Username ini sudah ada. Gunakan username lainya');
			redirect(base_url('auth/register_admin'));
		} elseif (strlen($password) < 8 || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $password)) {
			// Password tidak memenuhi persyaratan
			$this->session->set_flashdata('error_message', 'Password harus memiliki setidaknya 8 karakter, satu huruf besar, satu huruf kecil, dan angka.');
			redirect(base_url('auth/register_admin'));
		} else {
			// Hash password menggunakan MD5
			$hashed_password = md5($password);

			// Simpan data pengguna ke database
			$data = array(
				'username' => $username,
				'password' => $hashed_password,
				'email' => $email,
				'role' => $role,
				'nama_depan' => $nama_depan,
				'nama_belakang' => $nama_belakang,
			);

			$this->m_model->register($data); // Panggil model untuk menyimpan data

			$this->session->set_flashdata('berhasil_register_admin', 'Berhasil Register');
			redirect('auth');
		}
	}
	//end aksi register admin
	// <=== end register admin ==>

}