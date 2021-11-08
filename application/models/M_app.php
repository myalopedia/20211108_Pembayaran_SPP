<?php

class M_app extends CI_Model{

    function __construct() {
        parent::__construct();
    }

    public function getidbayar($nis)
    {
        $query = $this->db->query("SELECT max(id_pembayaran) AS max_code FROM tb_pembayaran");
        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 12, 6);

        $max_new = $max_fix + 1;
        $tanggal = $time = date("d");
        $bulan = $time = date("m");
        $tahun = $time = date("Y");

        $id = $tahun.$bulan.$tanggal.$nis.sprintf("%06s", $max_new);
        return $id;
    }

    public function tagihan($nis)
    {
        $query = $this->db->query("SELECT sum(biaya) AS tagihan FROM tb_tagihan_siswa A JOIN tb_tagihan B ON A.id_tagihan=B.id WHERE A.nis='$nis'");
        $row = $query->row_array();
        $tagihan = $row['tagihan'];

        return $tagihan;
    }

    public function tagihan_ket($nis)
    {
        $query = $this->db->query("SELECT A.keterangan, B.ket_tambahan FROM tb_tagihan A JOIN tb_tagihan_siswa B ON A.id=B.id_tagihan WHERE nis='$nis'");
        return $query->result();
    }

    public function bulan_tagihan($nis)
    {
        $sql = $this->db->query("SELECT max(id) AS id FROM tb_tagihan_siswa WHERE nis='$nis'");
        $row = $sql->row_array();
        $id = $row['id'];

        if (!empty($id)) {
            $query = $this->db->query("SELECT * FROM tb_tagihan_siswa WHERE id='$id'");
            $d = $query->row();
            $batas_waktu = $d->batas_waktu;
        } else {
            $batas_waktu = "";
        }

        return $batas_waktu;
    }

    public function bayar_tagihan($id) 
    {
        $query = $this->db->query("SELECT * FROM tb_pembayaran WHERE id_pembayaran='$id'");
        return $query->result();
    }

    public function data_tagihan($nis)
    {
        $query = $this->db->query("SELECT * FROM tb_tagihan A JOIN tb_tagihan_siswa B ON A.id=B.id_tagihan WHERE B.nis='$nis'");
        return $query->result();
    }

    public function data_riwayat($nis)
    {
        $query = $this->db->query("SELECT * FROM tb_pembayaran A JOIN tb_siswa B ON A.nis=B.nis WHERE A.nis='$nis'");
        return $query->result();
    }   

    public function status_notif($nis)
    {
        $query = $this->db->query("SELECT status FROM tb_pembayaran WHERE nis='$nis' AND status=2");
        return $query->result();
    }

}
?>