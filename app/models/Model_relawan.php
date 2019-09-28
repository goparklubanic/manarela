<?php
class Model_relawan
{
    private $table = "relawan";
    private $db;
    // Kolom: kodeRelawan,angkatan,namaLengkap,jenisKelamin,email,nomorTelp,pendidikanTerakhir

    public function __construct()
    {
        $this->db = new Database();
    }

    // insert
    public function nambahRelawan($data){
        $sql = "INSERT INTO {$this->table} SET kodeRelawan = :korel ,angkatan = :angk , namaLengkap = :nama , jenisKelamin = :jnk ,email = :email ,nomorTelp = :telp , pendidikanTerakhir = :pend";

        $this->db->query($sql);
        $this->db->bind('korel',$data['kodeRelawan']);
        $this->db->bind('angk',$data['angkatan']);
        $this->db->bind('nama',$data['namaLengkap']);
        $this->db->bind('jnk',$data['jenisKelamin']);
        $this->db->bind('email',$data['email']);
        $this->db->bind('telp',$data['nomorTelp']);
        $this->db->bind('pend',$data['pendidikanTerakhir']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    // update
    public function ngubahRelawan($data){
        $sql = "UPDATE {$this->table} SET angkatan = :angk , namaLengkap = :nama , jenisKelamin = :jnk ,email = :email ,nomorTelp = :telp , pendidikanTerakhir = :pend WHERE kodeRelawan = :korel";

        $this->db->query($sql);
        $this->db->bind('korel',$data['kodeRelawan']);
        $this->db->bind('angk',$data['angkatan']);
        $this->db->bind('nama',$data['namaLengkap']);
        $this->db->bind('jnk',$data['jenisKelamin']);
        $this->db->bind('email',$data['email']);
        $this->db->bind('telp',$data['nomorTelp']);
        $this->db->bind('pend',$data['pendidikanTerakhir']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // delete
    public function mbusakRelawan($data){
        $sql = "DELETE FROM {$this->table} WHERE kodeRelawan = :korel";
        $this->db->query($sql);
        $this->db->bind('korel',$data['kodeRelawan']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // select All
    public function mbeberRelawan($hal = 1){
        $row = ($hal - 1 ) * slarik;
        $sql = "SELECT * FROM {$this->table} ORDER BY angkatan DESC,namaLengkap LIMIT $row , ".slarik;
        $this->db->query($sql);
        $this->db->execute();
        return $this->db->resultSet();
    }

    // select One
    public function ndelokRelawan($kode){
        $sql = "SELECT * FROM {$this->table} WHERE kodeRelawan = :kode";
        $this->db->query($sql);
        $this->db->bind('kode',$kode);
        $this->db->execute();
        return $this->db->resultOne();
    }

    // filtered selection
    public function nguyakRelawan($nama){
        $sql = "SELECT * FROM {$this->table} WHERE namaLengkap LIKE :nama";
        $this->db->query($sql);
        $this->db->bind('nama','%'.$nama.'%');
        $this->db->execute();
        return $this->db->resultSet();
    }

}
