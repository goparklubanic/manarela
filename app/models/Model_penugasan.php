<?php
class Model_penugasan
{
    private $table = "penugasan";
    private $db;
    // Kolom: idxPenugasan,kodeRelawan,namaTugas,lokasiTugas,skope,tanggalMulai,tanggalSelesai

    public function __construct()
    {
        $this->db = new Database();
    }

    // insert
    public function nambahPenugasan($data){
        $sql = "INSERT INTO {$this->table} SET kodeRelawan = :korel,namaTugas = :tugas ,lokasiTugas = :lokasi ,skope = :skope ,tanggalMulai = :tgMulai,tanggalSelesai = :tgAkhir";
        
        $this->db->query($sql);
        $this->db->bind('korel' , $data['kodeRelawan']);
        $this->db->bind('tugas' , $data['namaTugas']);
        $this->db->bind('lokasi' , $data['lokasiTugas']);
        $this->db->bind('skope' , $data['skope']);
        $this->db->bind('tgMulai' , $data['tanggalMulai']);
        $this->db->bind('tgAkhir' , $data['tanggalSelesai']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    // update
    public function ngubahPenugasan($data){

        $sql = "UPDATE {$this->table} SET kodeRelawan = :korel,namaTugas = :tugas ,lokasiTugas = :lokasi ,skope = :skope ,tanggalMulai = :tgMulai,tanggalSelesai = :tgAkhir WHERE idxPenugasan = :idx";
        
        $this->db->query($sq);
        $this->db->bind('korel' , $data['kodeRelawan']);
        $this->db->bind('tugas' , $data['namaTugas']);
        $this->db->bind('lokasi' , $data['lokasiTugas']);
        $this->db->bind('skope' , $data['skope']);
        $this->db->bind('tgMulai' , $data['tanggalMulai']);
        $this->db->bind('tgAkhir' , $data['tanggalSelesai']);
        $this->db->bind('idx' , $data['indexPenugasan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // delete
    public function mbusakPenugasan($data){
        $sql = "DELETE FROM {$this->table} WHERE idxPenugasan = :idx";
        $this->db->query($sql);
        $this->db->bind('idx' , $data['idxPenugasan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // select All
    public function mbeberPenugasan($hal = 1){
        $row = ($hal - 1) * slarik;
        //$sql = "SELECT * FROM {$this->table} ORDER BY namaTugas LIMIT $row , " . slarik;
        $sql = "SELECT idxPenugasan,namaTugas,lokasiTugas,skope,DATE_FORMAT(tanggalMulai,'%d-%m-%Y') AS tanggalMulai,DATE_FORMAT(tanggalSelesai,'%d-%m-%Y') AS tanggalSelesai FROM penugasan GROUP BY namaTugas ORDER BY tanggalMulai LIMIT $row , " . slarik;
        
        $this->db->query($sql);
        $this->db->execute();
        return $this->db->resultSet();
    }

    // select One
    public function ndelokPenugasan($idx){
        $sql = "SELECT * FROM {$this->table} WHERE idxPenugasan = :idx ";
        
        $this->db->query($sql);
        $this->db->bind('idx' , $idx);
        $this->db->execute();
        return $this->db->resultOne();
    }

    // filtered selection
    public function penugasanRelawan($kodeRelawan){
        $sql = " SELECT * FROM penugasan WHERE kodeRelawan = :korel ORDER BY tanggalMulai DESC";
        $this->db->query($sql);
        $this->db->bind('korel' , $kodeRelawan);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function relawanBertugas($idt){
        $sql = "SELECT penugasan.kodeRelawan , relawan.namaLengkap , relawan.jenisKelamin , relawan.angkatan FROM penugasan , relawan WHERE namaTugas = ( SELECT namaTugas FROM penugasan WHERE idxPenugasan=:idt ) && relawan.kodeRelawan = penugasan.kodeRelawan ";

        $this->db->query($sql);
        $this->db->bind('idt',$idt);
        $this->db->execute();

        return $this->db->resultSet();
    }

}
