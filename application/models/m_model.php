<?php
class M_model extends CI_Model
{
    function get_data($table)
    {
        return $this->db->get($table);
    }
    function getWhere($table, $data)
    {
        return $this->db->get_where($table, $data);
    }
    public function register($data)
    {
        $this->db->insert('user', $data);
    }
    public function get_absensi()
    {
        $query = $this->db->get('absensi');
        return $query->reuslt();
    }
    public function get_by_id($table, $id_colomn, $id)
    {
        $data = $this->db->where($id_colomn, $id)->get($table);
        return $data;
    }
    public function ubah_data($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }
    public function tambah_data($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function delete($table, $field, $id)
    {
        $data = $this->db->delete($table, array($field => $id));
        return $data;
    }
    public function get_all_karyawan()
    {
        $this->db->select('absensi.*, user.nama_depan, user.nama_belakang');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_karyawan = user.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_absensi_terkini($user_id)
    {
        // Query untuk mengambil data absensi terkini berdasarkan ID pengguna
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->where('id_karyawan', $user_id);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Mengembalikan data absensi terkini
        } else {
            return null; // Jika tidak ada data absensi
        }
    }

    // public function data_kosong()
    // {
    //     $query = $this->db->query("SELECT SUM(CASE WHEN kegiatan IS NULL OR kegiatan = '' THEN 0 ELSE kegiatan END) as total_jumlah FROM absensi");
    //     $result = $query->row();

    //     $total_jumlah = $result->total_jumlah;

    // }

    public function getAbsensiByIdKaryawan($idKaryawan)
    {
        $this->db->select('absensi.*, user.nama_depan, user.nama_belakang');
        $this->db->where('absensi.id_karyawan', $idKaryawan);
        $this->db->join('user', 'user.id = absensi.id_karyawan', 'left');
        $query = $this->db->get('absensi');
        return $query->result();
    }

    public function jam_kerja()
    {
        $id_user = $this->session->userdata('id');

        $this->db->select('id, SUM(jam_masuk) AS total_jam_masuk');
        $this->db->from('absensi');
        $this->db->where('id', $id_user);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            $total_jam_masuk = $result->total_jam_masuk;
        }
        return $total_jam_masuk;
    }

    public function updateAbsensiPulang($user_id)
    {
        $data = array(
            'jam_pulang' => date('Y-m-d H:i:s'),
            // Menggunakan waktu saat ini
            'status' => 'done'
        );

        $this->db->where('id_karyawan', $user_id);
        $this->db->where('jam_masuk IS NOT NULL'); // Pastikan sudah ada data jam masuk
        $this->db->where('jam_pulang IS NULL'); // Pastikan belum ada data jam pulang
        $this->db->update('absensi', $data);
    }

    public function ubahKegiatan($id_absensi, $kegiatan_baru)
    {
        $data = array('kegiatan' => $kegiatan_baru);

        $this->db->where('id', $id_absensi); // Sesuaikan dengan nama kolom ID di tabel absensi
        $this->db->update('absensi', $data);

        return $this->db->affected_rows(); // Mengembalikan jumlah baris yang berubah
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query; // Tidak perlu row() di sini
    }

    public function hariIniAbsen($id)
    {
        $this->db->where('id_karyawan', $id);
        $this->db->where('date', date('Y-m-d'));
        $query = $this->db->get('absensi');
        return $query->result();
    }

    public function izin_satu_kali($id)
    {
        $this->db->where('id_karyawan', $id);
        $this->db->where('date', date('Y-m-d'));
        $query = $this->db->get('absensi');
        return $query->result();
    }

    public function getHarianData($tanggal) {
        $this->db->select('absensi.*, user.nama_depan, user.nama_belakang');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_karyawan = user.id', 'left');
        $this->db->where('date', $tanggal);
        $query = $this->db->get();
        return $query->result();
    }
    public function getMingguanData($tanggal_awal, $tanggal_akhir) {
        $this->db->select('absensi.*, user.nama_depan, user.nama_belakang');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_karyawan = user.id', 'left');
        $this->db->where('date >=', $tanggal_awal);
        $this->db->where('date <=', $tanggal_akhir);
        $query = $this->db->get();
        return $query->result();
    }

}
?>