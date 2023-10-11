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
    public function get_karyawan()
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

    public function getAbsensiByIdKaryawan($idKaryawan) {
        $this->db->select('absensi.*, user.nama_depan, user.nama_belakang');
        $this->db->where('absensi.id_karyawan', $idKaryawan);
        $this->db->join('user', 'user.id = absensi.id_karyawan', 'left');
        $query = $this->db->get('absensi');
        return $query->result();
    }

    public function jam_kerja($id) {
        $sql = "SELECT count(jam_masuk) as jam_masuk FROM absensi WHERE id_karyawan = ? AND jam_masuk IS NOT NULL";
        $result = $this->db->query($sql,  array($id));
        return $result->row()->jam_masuk;
    }
}
?>