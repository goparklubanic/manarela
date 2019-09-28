<?php
class Model_person
{
    private $table = "relawan";
    private $db;
    

    public function __construct()
    {
        $this->db = new Database();
    }

    public function sayalah($kore){
        $sql = "SELECT * FROM " . $this->table . " WHERE kodeRelawan = :kore ";
        $this->db->query($sql);
        $this->db->bind('kore' , $kore);
        $this->db->execute();
        return $this->db->resultOne();
    }

    public function diklatsaya($kore){
        $sql = "SELECT namaPelatihan , jenjang , DATE_FORMAT(tanggalMulai,'%d/%m/%Y') mulai, DATE_FORMAT(tanggalSelesai,'%d/%m/%Y') selesai , jamKurikulum FROM pelatihan WHERE kodeRelawan = :kore ";
        $this->db->query($sql);
        $this->db->bind('kore' , $kore);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function tugassaya($kore){
        $sql = "SELECT namaTugas , lokasiTugas , DATE_FORMAT(tanggalMulai , '%d/%m/%Y') mulai , DATE_FORMAT(tanggalSelesai ,'%d/%m/%Y') selesai FROM penugasan WHERE kodeRelawan = :kore ";
        $this->db->query($sql);
        $this->db->bind('kore' , $kore);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function specsaya($kore){
        $sql = "SELECT jobSpec spec FROM spesialisasi WHERE kodeRelawan = :kore";
        $this->db->query($sql);
        $this->db->bind('kore' , $kore);
        $this->db->execute();
        return $this->db->resultSet();
    }

}