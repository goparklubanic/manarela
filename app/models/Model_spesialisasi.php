<?php
class Model_spesialisasi
{
    private $table = "spesialisasi";
    private $db;
    // Kolom: idxSpesialisasi,kodeRelawan,jobSpec

    public function __construct()
    {
        $this->db = new Database();
    }

    // insert
    public function nambahSpesialisasi($data){
        $sql = "INSERT INTO {$this->table} SET kodeRelawan = :korel , jobSpec = :jobSpec";
        $this->db->query($sql);
        $this->db->bind('korel',$data['kodeRelawan']);
        $this->db->bind('jobSpec',$data['jobSpec']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    // update
    public function ngubahSpesialisasi($data){
        $sql = "UPDATE {$this->table} SET kodeRelawan = :korel , jobSpec = :jobSpec WHERE idxSpesialisasi = : idx";
        $this->db->query($sql);
        $this->db->bind('korel',$data['kodeRelawan']);
        $this->db->bind('jobSpec',$data['jobSpec']);
        $this->db->bind('idx',$data['idxSpesialisasi']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // delete
    public function mbusakSpesialisasi($data){
        $sql = "DELETE FROM {$this->table}  WHERE idxSpesialisasi = : idx";
        $this->db->query($sql);
        $this->db->bind('idx',$data['idxSpesialisasi']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    
    // filtered selection
    public function relawanKompeten($kompetensi){
        $sql = "SELECT spesialisasi.* , relawan.namaLengkap FROM spesialisasi,relawan WHERE jobSpec= :kompetensi && relawan.kodeRelawan = spesialisasi.kodeRelawan";
        $this->db->query($sql);
        $this->db->bind('kompetensi' , $kompetensi);
        $this->db->execute();
        return $this->db->resultSet();
    }
    
    public function kompetensiRelawan($kodeRelawan){
        $sql = "SELECT relawan.namaLengkap AS res FROM relawan WHERE kodeRelawan=:korel UNION SELECT jobSpec AS res FROM spesialisasi WHERE spesialisasi.kodeRelawan=:korel";
        $this->db->query($sql);
        $this->db->bind('korel' , $kodeRelawan);
        $this->db->execute();
        return $this->db->resultSet();
    }

}
