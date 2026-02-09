CREATE TABLE mahasiswa (
    -- == IDENTITAS UTAMA ==
    id CHAR(36) NOT NULL,
    nama_mahasiswa VARCHAR(100) NOT NULL,
    jenis_kelamin ENUM('L', 'P') NOT NULL,
    tempat_lahir VARCHAR(80) NOT NULL,
    tanggal_lahir DATE NOT NULL,
    id_agama INT NOT NULL,
    nik VARCHAR(16) NOT NULL,
    nisn VARCHAR(10) NULL,
    kewarganegaraan CHAR(2) DEFAULT 'ID',

    -- == ALAMAT DOMISILI ==
    jalan VARCHAR(255),
    dusun VARCHAR(60),
    rt VARCHAR(5),
    rw VARCHAR(5),
    kelurahan VARCHAR(60) NOT NULL,
    kode_pos VARCHAR(5),
    id_kecamatan CHAR(6) NOT NULL,
    id_jenis_tinggal INT NULL COMMENT 'Ref: 1=Ortu, 2=Kost, 3=Asrama',
    id_alat_transportasi INT NULL COMMENT 'Ref: 1=Jalan kaki, 2=Motor',

    -- == KONTAK ==
    telepon VARCHAR(20),
    handphone VARCHAR(20) NOT NULL,
    email VARCHAR(60) NOT NULL,

    -- == DATA AYAH ==
    nik_ayah VARCHAR(16) NULL,
    nama_ayah VARCHAR(100) NULL,
    tanggal_lahir_ayah DATE NULL,
    id_pendidikan_ayah INT NULL COMMENT 'Ref: 1=SD, ..., 5=S1',
    id_pekerjaan_ayah INT NULL COMMENT 'Ref: 1=PNS, 2=Wiraswasta',
    id_penghasilan_ayah INT NULL COMMENT 'Ref: 1=<500rb, 2=500-1jt',

    -- == DATA IBU ==
    nik_ibu VARCHAR(16) NULL,
    nama_ibu_kandung VARCHAR(100) NOT NULL COMMENT 'Wajib untuk validasi',
    tanggal_lahir_ibu DATE NULL,
    id_pendidikan_ibu INT NULL,
    id_pekerjaan_ibu INT NULL,
    id_penghasilan_ibu INT NULL,

    -- == DATA WALI (Opsional) ==
    nama_wali VARCHAR(100) NULL,
    tanggal_lahir_wali DATE NULL,
    id_pendidikan_wali INT NULL,
    id_pekerjaan_wali INT NULL,
    id_penghasilan_wali INT NULL,

    -- == METADATA ==
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (id),
    UNIQUE KEY unique_nik (nik)
);
