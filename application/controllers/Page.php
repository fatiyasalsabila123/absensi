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

	public function pulang($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$absensi = $this->db->get_where('absensi', array('id' => $id))->row();

		if ($absensi) {
			$data = array(
				'jam_pulang' => date('H:i:s'),
				'status' => 'done',
			);

			$this->db->where('id', $id);
			$this->db->update('absensi', $data);
			redirect(base_url('page/absensi_karyawan'));
		} else {
			echo 'Data absensi tidak ditemukan';
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
			redirect(base_url('page/absensi_karyawan'));
		} else {
			$this->session->set_flashdata('error', "Data belum di edit");
			redirect(base_url('page/edit_kegiatan/' . $this->input->post('id')));
		}
	}

	public function aksi_keterangan_izin()
	{
		$id = $this->input->post('id');
		$user_id = $this->session->userdata('id');

		$ijin_hari_ini = $this->m_model->izin_satu_kali($user_id, $id);
		if (!empty($ijin_hari_ini)) {
			$this->session->set_flashdata('gagal_ijin', "Anda sudah ijin hari ini");
			redirect(base_url('page/edit_kegiatan/' . $this->input->post('id')));
		} else {
		$data = [
			'keterangan_izin' => $this->input->post('keterangan_izin'),
			"jam_pulang" => "00:00:00",
			"jam_masuk" => "00:00:00",
			"kegiatan" => "-",
			"status" => "done",
		];
		$eksekusi = $this->m_model->ubah_data('absensi', $data, array('id' => $this->input->post('id')));
		if ($eksekusi) {
			$this->session->set_flashdata('berhasil_izin', 'Berhasil untuk izin');
			redirect(base_url('page/absensi_karyawan'));
		} else {
			$this->session->set_flashdata('gagal_izin', "Gagal memberi keterangan izin");
			redirect(base_url('page/edit_kegiatan/' . $this->input->post('id')));
		}
		}
	}

	public function edit_kegiatan($id)
	{
		$data['karyawan1'] = $this->m_model->get_by_id('absensi', 'id', $id)->result();
		// $data['user'] = $this->m_model->get_data('user')->result();
		$this->load->view('page/karyawan/edit_kegiatan', $data);
	}

	public function upload_image($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './images/user/';
        $config['allowed_types'] = 'jpg|png|jpeg|webp|avif';
        $config['max_size'] = '30000';
        $config['file_name'] = $kode;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($value)) {
            return array(false, '');
        } else {
            $fn = $this->upload->data();
            $nama = $fn['file_name'];
            return array(true, $nama);
        }
    }

	public function aksi_ubah_profile() {
		$data = [
			"username" => $this->input->post('username'),
			"email" => $this->input->post('email'),
			"nama_depan" => $this->input->post('nama_depan'),
			"nama_belakang" => $this->input->post('nama_belakang'),
		];
	
		$user_id = $this->session->userdata('id');
	
		$eksekusi = $this->m_model->ubah_data('user', $data, array('id' => $user_id));
	
		if ($eksekusi) {
			// Perbarui data sesi dengan data yang baru
			$this->session->set_userdata($data);
	
			redirect(base_url('page/profile'));
		} else {
			redirect(base_url('page/profile'));
		}
	}	

	public function profile()
	{
		$data['profile'] = $this->m_model->get_by_id('user', 'id', $this->session->userdata('id'))->result();
		$this->load->view('page/karyawan/profile', $data);
	}

}