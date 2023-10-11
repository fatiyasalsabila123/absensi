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
		$data['dashboard'] = $this->m_model->getAbsensiByIdKaryawan($this->session->userdata('id'));
		$data['total_data'] = count($data['dashboard']);
		$data['count'] = $this->m_model->jam_kerja($this->session->userdata('id'));
		$latest_work_time = $this->m_model->jam_kerja($this->session->userdata('id'));

		if (empty($latest_work_time)) {
			$data['cuti'] = $this->m_model->jam_kerja($this->session->userdata('id'));
		} else {
			$data['cuti'] = "Tidak sedang cuti";
		}
		$this->load->view('page/dashboard', $data);
	}
	public function absensi_karyawan()
	{
		$idKaryawan = $this->session->userdata('id');
		$totalAbsensi = $this->m_model->getAbsensiByIdKaryawan($idKaryawan);
		$data['karyawan'] = $totalAbsensi;
		$this->load->view('page/karyawan/absensi_karyawan', $data);
	}

	public function pulang()
	{
		$user_id = $this->session->userdata('id');
		$absensi_data = $this->m_model->get_absensi_terkini($user_id);

		if (!empty($absensi_data)) {
			$jam_pulang = date('H:i:s');

			$data = [
				"jam_pulang" => $jam_pulang,
				"status" => "done"
			];

			$where = ["id" => $absensi_data['id']];

			// Melakukan update ke dalam database
			$eksekusi = $this->m_model->update_data('absensi', $data, $where);

			if ($eksekusi) {
				$this->session->set_flashdata('success', 'Berhasil melakukan pulang');
				redirect(base_url('page/absensi_karyawan'));
			} else {
				$this->session->set_flashdata('error', 'Gagal melakukan pulang');
				redirect(base_url('page/absensi_karyawan'));
			}
		} else {
			$this->session->set_flashdata('error', 'Anda belum melakukan masuk');
			redirect(base_url('page/dashboard'));
		}
	}

	public function hapus($id)
	{
		$this->m_model->delete('absensi', 'id', $id);
		redirect(base_url('page/absensi_karyawan'));
	}


	public function aksi_edit()
	{
		$data = [
			'kegiatan' => $this->input->post('kegiatan'),
		];
		$eksekusi = $this->m_model->ubah_data('absensi', $data, array('id' => $this->input->post('id')));
		if ($eksekusi) {
			$this->session->set_flashdata('success_message', 'berhasil');
			redirect(base_url('page/abensi_karyawan'));
		} else {
			$this->session->set_flashdata('error', "Data guru belum di edit");
			redirect(base_url('page/edit_kegiatan/' . $this->input->post('id')));
		}
	}

	public function edit_kegiatan($id)
	{
		$data['karyawan1'] = $this->m_model->get_by_id('absensi', 'id', $id)->result();
		// $data['user'] = $this->m_model->get_data('user')->result();
		$this->load->view('page/karyawan/edit_kegiatan', $data);
	}

	public function profile() {
		$this->load->view('page/karyawan/profile');
	}

}