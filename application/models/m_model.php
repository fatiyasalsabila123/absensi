<?php 
    class M_model extends CI_Model{
        function get_data($table) {
            return $this->db->get($table);
        }
        function getWhere($table, $data) {
            return $this->db->get_where($table, $data);
        }
        public function register($data) {
            $this->db->insert('user', $data);
        }
        public function get_absensi() {
            $query = $this->db->get('absensi');
            return $query->reuslt();
        }
        public function get_by_id($table, $id_colomn, $id) {
            $data = $this->db->where($id_colomn, $id)->get($table);
            return $data;
        }
        public function ubah_data($table, $data, $where) {
         $this->db->where($where);
         $this->db->update($table, $data);
         return $this->db->affected_rows();
      }
      public function tambah_data($table, $data) {
         $this->db->insert($table, $data);
         return $this->db->insert_id();
      }
      public function delete($table, $field, $id) {
         $data=$this->db->delete($table, array($field => $id));
         return $data;
      }
      public function get_karyawan() {
        $this->db->select('absensi.*, user.nama_depan, user.nama_belakang');
        $this->db->from('absensi');
        $this->db->join('user', 'absensi.id_karyawan = user.id', 'left');
        $query = $this->db->get();
        return $query->result();
      }
        
    }
?>