CREATE TABLE m_referensi_global (
    id_ref INT AUTO_INCREMENT PRIMARY KEY,
    
    -- Pembeda (Discriminator)
    kelompok VARCHAR(50) NOT NULL COMMENT 'Contoh: AGAMA, PEKERJAAN, PENDIDIKAN',
    
    -- Nilai Standar PDDIKTI
    kode_dikti INT NOT NULL COMMENT 'Kode angka sesuai standar Feeder (misal: 1, 99)',
    
    -- Label yang Muncul di Aplikasi
    nama_referensi VARCHAR(255) NOT NULL COMMENT 'Label teks (misal: Islam, PNS, S1)',
    
    -- Urutan Tampilan (Opsional)
    urutan INT DEFAULT 0,
    
    -- Status Aktif
    is_active TINYINT(1) DEFAULT 1,
    
    -- Mencegah duplikasi kode di dalam satu kelompok
    UNIQUE KEY unique_ref (kelompok, kode_dikti) 
);


INSERT IGNORE INTO m_referensi_global (kelompok, kode_dikti, nama_referensi, urutan) VALUES 

-- ============================================================
-- 1. KELOMPOK: AGAMA
-- Standar Kemenag & Dikti
-- ============================================================
('AGAMA', 1, 'Islam', 1),
('AGAMA', 2, 'Kristen', 2),
('AGAMA', 3, 'Katholik', 3),
('AGAMA', 4, 'Hindu', 4),
('AGAMA', 5, 'Budha', 5),
('AGAMA', 6, 'Khonghucu', 6),
('AGAMA', 98, 'Kepercayaan Kepada Tuhan YME', 7),
('AGAMA', 99, 'Lainnya', 99),

-- ============================================================
-- 2. KELOMPOK: PEKERJAAN (Ortu/Wali)
-- Mengacu pada standar BPS/Dikti
-- ============================================================
('PEKERJAAN', 1, 'Tidak Bekerja', 1),
('PEKERJAAN', 2, 'Nelayan', 2),
('PEKERJAAN', 3, 'Petani', 3),
('PEKERJAAN', 4, 'Peternak', 4),
('PEKERJAAN', 5, 'PNS/TNI/POLRI', 5),
('PEKERJAAN', 6, 'Karyawan Swasta', 6),
('PEKERJAAN', 7, 'Pedagang Besar', 7),
('PEKERJAAN', 8, 'Pedagang Kecil', 8),
('PEKERJAAN', 9, 'Wiraswasta', 9),
('PEKERJAAN', 10, 'Buruh', 10),
('PEKERJAAN', 11, 'Pensiunan', 11),
('PEKERJAAN', 12, 'Sudah Meninggal', 12),
('PEKERJAAN', 99, 'Lainnya', 99),

-- ============================================================
-- 3. KELOMPOK: PENGHASILAN
-- Format Range Terbaru (Kode 11-16)
-- ============================================================
('PENGHASILAN', 11, 'Kurang dari Rp 500.000', 1),
('PENGHASILAN', 12, 'Rp 500.000 - Rp 999.999', 2),
('PENGHASILAN', 13, 'Rp 1.000.000 - Rp 1.999.999', 3),
('PENGHASILAN', 14, 'Rp 2.000.000 - Rp 4.999.999', 4),
('PENGHASILAN', 15, 'Rp 5.000.000 - Rp 20.000.000', 5),
('PENGHASILAN', 16, 'Lebih dari Rp 20.000.000', 6),
('PENGHASILAN', 0, 'Tidak Diisi', 99),

-- ============================================================
-- 4. KELOMPOK: PENDIDIKAN (Orang Tua)
-- Jenjang Pendidikan Terakhir
-- ============================================================
('PENDIDIKAN', 0, 'Tidak Sekolah', 0),
('PENDIDIKAN', 1, 'SD / Sederajat', 1),
('PENDIDIKAN', 2, 'SMP / Sederajat', 2),
('PENDIDIKAN', 3, 'SMA / Sederajat', 3),
('PENDIDIKAN', 4, 'D1', 4),
('PENDIDIKAN', 5, 'D2', 5),
('PENDIDIKAN', 6, 'D3', 6),
('PENDIDIKAN', 7, 'D4', 7),
('PENDIDIKAN', 8, 'S1', 8),
('PENDIDIKAN', 9, 'S2', 9),
('PENDIDIKAN', 10, 'S3', 10),
('PENDIDIKAN', 99, 'Lainnya', 99),

-- ============================================================
-- 5. KELOMPOK: ALAT TRANSPORTASI
-- Transportasi rutin ke kampus
-- ============================================================
('TRANSPORTASI', 1, 'Jalan Kaki', 1),
('TRANSPORTASI', 2, 'Angkutan Umum / Bus / Pete-pete', 2),
('TRANSPORTASI', 3, 'Mobil Pribadi', 3),
('TRANSPORTASI', 4, 'Sepeda Motor Pribadi', 4),
('TRANSPORTASI', 5, 'Kereta Api', 5),
('TRANSPORTASI', 6, 'Ojek', 6),
('TRANSPORTASI', 7, 'Andong / Bendi / Dokar', 7),
('TRANSPORTASI', 8, 'Perahu / Sampan / Rakit', 8),
('TRANSPORTASI', 9, 'Sepeda', 9),
('TRANSPORTASI', 99, 'Lainnya', 99),

-- ============================================================
-- 6. KELOMPOK: JENIS TINGGAL
-- Domisili saat kuliah
-- ============================================================
('JENIS_TINGGAL', 1, 'Bersama Orang Tua', 1),
('JENIS_TINGGAL', 2, 'Bersama Wali', 2),
('JENIS_TINGGAL', 3, 'Kost', 3),
('JENIS_TINGGAL', 4, 'Asrama Kampus', 4),
('JENIS_TINGGAL', 5, 'Panti Asuhan', 5),
('JENIS_TINGGAL', 99, 'Lainnya', 99);