<?php
class Barang_model extends CI_Model {
    function __construct() {
        $this->load->database();
    }

    public function data_barang() {
        $query = $this->db->query("select * from barang");
        if($query->num_rows() > 0) {
            return $query->result();
        }
    }
}
?>
