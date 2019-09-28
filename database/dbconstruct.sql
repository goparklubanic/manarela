-- tabel relawan

-- DROP TABLE IF EXIST namaTabel;
-- CREATE TABLE namaTabel();

DROP TABLE IF EXISTS relawan;
CREATE TABLE relawan(
    kodeRelawan varchar(16) NOT NULL UNIQUE,
    angkatan int(4) NOT NULL,
    namaLengkap varchar(40) NOT NULL,
    jenisKelamin enum ("Pria","Wanita") default "Pria",
    email tinytext,
    nomorTelp varchar(14),
    pendidikanTerakhir enum('SD','SLTP','SLTA','Diploma','Sarjana') default 'SLTA'
);


DROP TABLE IF EXISTS pelatihan;
CREATE TABLE pelatihan(
    idxPelatihan int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    kodeRelawan varchar(16) NOT NULL,
    namaPelatihan tinytext,
    jenjang enum('Kabupaten' , 'Propinsi' , 'Nasional') default 'Kabupaten',
    tanggalMulai date,
    tanggalSelesai date,
    jamKurikulum int(3) default 0,
    CONSTRAINT pel_kodeRelawan
		  FOREIGN KEY (kodeRelawan) REFERENCES relawan (kodeRelawan)
		  ON DELETE CASCADE
		  ON UPDATE RESTRICT
);


DROP TABLE IF EXISTS penugasan;
CREATE TABLE penugasan(
    idxPenugasan int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    kodeRelawan varchar(16) NOT NULL,
    namaTugas tinytext,
    lokasiTugas tinytext,
    skope enum('Dalam Kabupaten','Luar Kabupaten','Luar Propinsi','Luar Negeri') default 'Dalam Kabupaten',
    tanggalMulai date,
    tanggalSelesai date,
    CONSTRAINT pen_kodeRelawan
		FOREIGN KEY (kodeRelawan) REFERENCES relawan (kodeRelawan)
		  ON DELETE CASCADE
		  ON UPDATE RESTRICT
);


DROP TABLE IF EXISTS spesialisasi;
CREATE TABLE spesialisasi(
    idxSpesialisasi int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    kodeRelawan varchar(16) NOT NULL,
    jobSpec enum ('PP','Siaga Bencana','H2P','PSP','WASH','DU','PK','GPM','UKTD'),
    CONSTRAINT spc_kodeRelawan
		  FOREIGN KEY (kodeRelawan) REFERENCES relawan (kodeRelawan)
		  ON DELETE CASCADE
		  ON UPDATE RESTRICT
);
