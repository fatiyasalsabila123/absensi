<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	//start construct
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
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
	}
	//end aksi login
	// <=== end login ===>

	//  <=== logout ===>
	function logout()
	{
		$this->session->sess_destroy(); // Menghapus sesi pengguna
		redirect(base_url('home')); // Redirect kembali ke halaman home
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
			$this->session->set_flashdata('error_email', 'Email ini sudah di ada. Gunakan email lainya');
			redirect(base_url('auth/register'));
		} elseif (strlen($password) < 8 || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $password)) {
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