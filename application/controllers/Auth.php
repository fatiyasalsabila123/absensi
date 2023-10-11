<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
	}

	// <=== start login ==>
	public function index()
	{
		// $data['login'] = $this->m_model->get_karyawan();
		$this->load->view('auth/login');
	}
	public function aksi_login()
	{
		$email = $this->input->post('email', true);
		$password = $this->input->post('password', true);
		$data = ['email' => $email];
		$query = $this->m_model->getWhere('user', $data);
		$result = $query = $query->row_array();
		if (!empty($result) && md5($password) === $result['password']) {
			$data = [
				'logged_in' => TRUE,
				// Menandai bahwa pengguna telah login
				'email' => $result['email'],
				// Menyimpan email pengguna ke sesi
				'username' => $result['username'],
				// Menyimpan username pengguna ke sesi
				'role' => $result['role'],
				// Menyimpan peran pengguna ke sesi
				'id' => $result['id'],
				// Menyimpan ID pengguna ke sesi
			];
			$this->session->set_userdata($data); // Menyimpan data ke dalam sesi

			// Memeriksa peran pengguna dan mengarahkannya ke halaman yang sesuai
			if ($this->session->userdata('role') == 'admin') {
				$this->session->set_flashdata('success_login', 'berhasil');
				redirect(base_url() . "admin/dashboard"); // menuju ke halaman page
			} elseif ($this->session->userdata('role') == 'karyawan') {
				
				date_default_timezone_set('Asia/Jakarta');
				$data = [
					"id_karyawan" => $result['id'],
					"jam_masuk" => date('H:i:s'),
					"date" => date('Y-m-d'),
					"jam_pulang" => "0000-00-00 00:00:00",
				];

				$eksekusi = $this->m_model->tambah_data('absensi', $data);
				if ($eksekusi) {
					$this->session->set_flashdata('Berhasil login sebagai karyawan');
					redirect(base_url('page/dashboard'));
				} else {
					$this->session->set_flashdata('Gagal login huuuuuu');
					redirect(base_url('auth'));
				}
			} else {
				$this->session->set_flashdata('error', 'gagal login');
				redirect(base_url() . "auth"); // menuju ke halaman login jika peran bukan admin
			}
		} else {
			redirect(base_url() . "auth"); // menuju kembali ke halaman login jika login gagal
		}
	}
	// <=== end login ===>

	//  <=== logout ===>
	function logout()
	{
		$this->session->sess_destroy(); // Menghapus sesi pengguna
		redirect(base_url('home')); // Redirect kembali ke halaman home
	}

	//  <=== register karyawan ===>
	public function register()
	{
		$this->load->view('auth/register');
	}

	public function aksi_register()
	{
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$nama_depan = $this->input->post('nama_depan');
		$nama_belakang = $this->input->post('nama_belakang');
		$role = $this->input->post('role');
		$password = $this->input->post('password');
		if (strlen($password) < 8 || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $password)) {
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
			redirect('auth');
		}
	}
	// <=== end Register karyawan ===>

	// <=== start register admin ==>
	public function register_admin()
	{
		$this->load->view('auth/register_admin');
	}

	public function aksi_register_admin()
	{
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$nama_depan = $this->input->post('nama_depan');
		$nama_belakang = $this->input->post('nama_belakang');
		$role = $this->input->post('role');
		$password = $this->input->post('password');
		if (strlen($password) < 8 || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $password)) {
			// Password tidak memenuhi persyaratan
			$this->session->set_flashdata('error_message', 'Password harus memiliki setidaknya 8 karakter, satu huruf besar, satu huruf kecil, dan angka.');
			redirect('register'); // Redirect kembali ke halaman registrasi
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
			redirect('auth');
		}
	}
	// <=== end register admin ==>

}