-- 2. Tabel Riwayat Pendidikan (Registrasi)
CREATE TABLE riwayat_pendidikan (
    id CHAR(36) NOT NULL, -- UUID
    id_mahasiswa CHAR(36) NOT NULL,
    id_prodi VARCHAR(10) NOT NULL COMMENT 'Kode Prodi Internal/Dikti',
    nim VARCHAR(24) NOT NULL,
    
    -- Detail Masuk
    id_jenis_daftar INT NOT NULL COMMENT 'Ref: 1=Baru, 2=Pindahan',
    id_jalur_masuk INT NULL,
    id_periode_masuk CHAR(5) NOT NULL COMMENT 'Format YYYY1/YYYY2',
    tanggal_daftar DATE NOT NULL,
    
    -- Status Akhir (Diisi jika sudah lulus/keluar)
    id_jenis_keluar INT NULL COMMENT 'Ref: 1=Lulus, 2=Mutasi, 3=DO',
    tanggal_keluar DATE NULL,
    sk_yudisium VARCHAR(50) NULL,
    tanggal_yudisium DATE NULL,
    no_seri_ijazah VARCHAR(80) NULL,
    
    PRIMARY KEY (id),
    UNIQUE KEY unique_nim (nim, id_prodi)    
);
