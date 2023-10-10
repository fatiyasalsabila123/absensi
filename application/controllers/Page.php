<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
		$this->load->helper('my_helper');
	}
	public function dashboard()
	{
		$this->load->view('page/dashboard');
	}
	public function absensi_karyawan()
	{
		$data['karyawan'] = $this->m_model->get_karyawan();
		$this->load->view('page/karyawan/absensi_karyawan', $data);
	}

	public function pulang()
	{
		// Mendapatkan ID pengguna atau informasi yang diperlukan untuk mengidentifikasi data yang akan diubah
		$user_id = $this->session->userdata('id');

		// Mendapatkan data absensi terkini untuk pengguna yang sesuai
		$absensi_data = $this->m_model->get_by_id('absensi', $user_id);
		if (!empty($absensi_data)) {
			// Menentukan waktu pulang
			$jam_masuk = date('H:i:s');
	
			// Update status menjadi "done"
			$data = [
				"jam_masuk" => $jam_masuk,
				"status" => "done"
			];
	
			$where = ["id" => $absensi_data['id']];
	
			// Melakukan update ke dalam database
			$eksekusi = $this->m_model->update_data('absensi', $data, $where);
	
			if ($eksekusi) {
				$this->session->set_flashdata('success', 'Berhasil melakukan pulang');
				redirect(base_url('page/dashboard'));
			} else {
				$this->session->set_flashdata('error', 'Gagal melakukan pulang');
				redirect(base_url('page/dashboard'));
			}
		} else {
			$this->session->set_flashdata('error', 'Anda belum melakukan masuk');
			redirect(base_url('page/dashboard'));
		}
	}

}