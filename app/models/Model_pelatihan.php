<?php
class Model_pelatihan
{
    private $table = "pelatihan";
    private $db;
    // Kolom: idxPelatihan,kodeRelawan,namaPelatihan,jenjang,tanggalMulai,tanggalSelesai,jamKurikulum

    public function __construct()
    {
        $this->db = new Database();
    }

    // insert
    public function nambahPelatihan($data){
        $sql = "INSERT INTO  {$this->table}  SET kodeRelawan = :korel , namaPelatihan = :nmPelat , jenjang = :jenjang ,tanggalMulai = :tgMulai , tanggalSelesai = :tgAkhir , jamKurikulum = :jam";

        $this->db->query($sql);
        $this->db->bind('korel',$data['kodeRelawan']);
        $this->db->bind('nmPelat',$data['namaPelatihan']);
        $this->db->bind('jenjang',$data['jenjang']);
        $this->db->bind('tgMulai',$data['tanggalMulai']);
        $this->db->bind('tgAkhir',$data['tanggalSelesai']);
        $this->db->bind('jam',$data['jamKurikulum']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    // update
    public function ngubahPelatihan($data){
        $sql = "UPDATE  {$this->table}  SET kodeRelawan = :korel , namaPelatihan = :nmPelat , jenjang = :jenjang ,tanggalMulai = :tgMulai , tanggalSelesai = :tgAkhir , jamKurikulum = :jam WHERE idxPelatihan = :idx";

        $this->db->query($sql);
        $this->db->bind('korel',$data['kodeRelawan']);
        $this->db->bind('nmPelat',$data['namaPelatihan']);
        $this->db->bind('jenjang',$data['jenjang']);
        $this->db->bind('tgMulai',$data['tanggalMulai']);
        $this->db->bind('tgAkhir',$data['tanggalSelesai']);
        $this->db->bind('jam',$data['jamKurikulum']);
        $this->db->bind('idx',$data['idxPelatihan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // delete
    public function mbusakPelatihan($data){
        $sql = "DELETE FROM  {$this->table} WHERE idxPelatihan = :idx";

        $this->db->query($sql);
        $this->db->bind('idx',$data['idxPelatihan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // select All
    public function mbeberPelatihan($hal = 1){
        $row = ( $hal -1 ) * slarik;
        // $sql = "SELECT * FROM  {$this->table}  ORDER BY tanggalMulai LIMIT $row , " . slarik;
        $sql = "SELECT namaPelatihan,jenjang,DATE_FORMAT(tanggalMulai,'%d-%m-%Y') AS tanggalMulai,DATE_FORMAT(tanggalSelesai,'%d-%m-%Y') AS tanggalSelesai , jamKurikulum FROM pelatihan GROUP BY namaPelatihan ORDER BY tanggalMulai LIMIT $row,".slarik;

        $this->db->query($sql);
        $this->db->execute();
        return $this->db->resultSet();
    }

    // select One
    public function ndelokPelatihan($data){
        $sql = "SELECT * FROM {$this->table} WHERE idxPelatihan = :idx";

        $this->db->query($sql);
        $this->db->bind('idx',$data['idxPelatihan']);
        $this->db->execute();
        return $this->db->resultOne();
    }

    // filtered selection
    public function pelatihanRelawan($kodeRelawan){
        $sql = "SELECT * FROM pelatihan WHERE kodeRelawan = :korel ORDER BY tanggalMulai DESC";
        $this->db->query($sql);
        $this->db->bind('korel',$kodeRelawan);
        $this->db->execute();
        return $this->db->resultSet();
    }
    

}
