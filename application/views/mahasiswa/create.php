<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Data Mahasiswa</div>
                </div>
                <form action="<?= base_url('mahasiswa/store') ?>" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <div class="card-title">Data Pribadi</div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Masukkan Nama Mahasiswa" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_agama">Agama</label>
                                    <input type="text" class="form-control" id="id_agama" name="id_agama" placeholder="Masukkan Agama" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" required>
                                </div>
                                <div class="form-group">
                                    <label for="nisn">NISN</label>
                                    <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN">
                                </div>
                                <div class="form-group">
                                    <label for="kewarganegaraan">Kewarganegaraan</label>
                                    <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" placeholder="Masukkan Kewarganegaraan" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <div class="card-title">Alamat</div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="jalan">Jalan</label>
                                    <input type="text" class="form-control" id="jalan" name="jalan" placeholder="Masukkan Jalan">
                                </div>
                                <div class="form-group">
                                    <label for="dusun">Dusun</label>
                                    <input type="text" class="form-control" id="dusun" name="dusun" placeholder="Masukkan Dusun">
                                </div>
                                <div class="form-group">
                                    <label for="rt">RT</label>
                                    <input type="text" class="form-control" id="rt" name="rt" placeholder="Masukkan RT">
                                </div>
                                <div class="form-group">
                                    <label for="rw">RW</label>
                                    <input type="text" class="form-control" id="rw" name="rw" placeholder="Masukkan RW">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="kelurahan">Kelurahan</label>
                                    <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Masukkan Kelurahan" required>
                                </div>
                                <div class="form-group">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Masukkan Kode Pos">
                                </div>
                                <div class="form-group">
                                    <label for="id_kecamatan">Kecamatan</label>
                                    <input type="text" class="form-control" id="id_kecamatan" name="id_kecamatan" placeholder="Masukkan Kecamatan">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <div class="card-title">Kontak & Lainnya</div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="id_jenis_tinggal">Jenis Tinggal</label>
                                    <input type="text" class="form-control" id="id_jenis_tinggal" name="id_jenis_tinggal" placeholder="Masukkan Jenis Tinggal">
                                </div>
                                <div class="form-group">
                                    <label for="id_alat_transportasi">Alat Transportasi</label>
                                    <input type="text" class="form-control" id="id_alat_transportasi" name="id_alat_transportasi" placeholder="Masukkan Alat Transportasi">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input type="tel" class="form-control" id="telepon" name="telepon" placeholder="Masukkan Nomor Telepon">
                                </div>
                                <div class="form-group">
                                    <label for="handphone">Handphone</label>
                                    <input type="tel" class="form-control" id="handphone" name="handphone" placeholder="Masukkan Nomor Handphone">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <div class="card-title">Data Ayah</div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="nik_ayah">NIK Ayah</label>
                                    <input type="text" class="form-control" id="nik_ayah" name="nik_ayah" placeholder="Masukkan NIK Ayah">
                                </div>
                                <div class="form-group">
                                    <label for="nama_ayah">Nama Ayah</label>
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir_ayah">Tanggal Lahir Ayah</label>
                                    <input type="date" class="form-control" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="id_pendidikan_ayah">Pendidikan Ayah</label>
                                    <input type="text" class="form-control" id="id_pendidikan_ayah" name="id_pendidikan_ayah" placeholder="Masukkan Pendidikan Ayah">
                                </div>
                                <div class="form-group">
                                    <label for="id_pekerjaan_ayah">Pekerjaan Ayah</label>
                                    <input type="text" class="form-control" id="id_pekerjaan_ayah" name="id_pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah">
                                </div>
                                <div class="form-group">
                                    <label for="id_penghasilan_ayah">Penghasilan Ayah</label>
                                    <input type="text" class="form-control" id="id_penghasilan_ayah" name="id_penghasilan_ayah" placeholder="Masukkan Penghasilan Ayah">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <div class="card-title">Data Ibu</div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="nik_ibu">NIK Ibu</label>
                                    <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" placeholder="Masukkan NIK Ibu">
                                </div>
                                <div class="form-group">
                                    <label for="nama_ibu_kandung">Nama Ibu Kandung</label>
                                    <input type="text" class="form-control" id="nama_ibu_kandung" name="nama_ibu_kandung" placeholder="Masukkan Nama Ibu" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir_ibu">Tanggal Lahir Ibu</label>
                                    <input type="date" class="form-control" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="id_pendidikan_ibu">Pendidikan Ibu</label>
                                    <input type="text" class="form-control" id="id_pendidikan_ibu" name="id_pendidikan_ibu" placeholder="Masukkan Pendidikan Ibu">
                                </div>
                                <div class="form-group">
                                    <label for="id_pekerjaan_ibu">Pekerjaan Ibu</label>
                                    <input type="text" class="form-control" id="id_pekerjaan_ibu" name="id_pekerjaan_ibu" placeholder="Masukkan Pekerjaan Ibu">
                                </div>
                                <div class="form-group">
                                    <label for="id_penghasilan_ibu">Penghasilan Ibu</label>
                                    <input type="text" class="form-control" id="id_penghasilan_ibu" name="id_penghasilan_ibu" placeholder="Masukkan Penghasilan Ibu">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="card-header">
                                    <div class="card-title">Data Wali (Opsional)</div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="nama_wali">Nama Wali</label>
                                    <input type="text" class="form-control" id="nama_wali" name="nama_wali" placeholder="Masukkan Nama Wali">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir_wali">Tanggal Lahir Wali</label>
                                    <input type="date" class="form-control" id="tanggal_lahir_wali" name="tanggal_lahir_wali">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="id_pendidikan_wali">Pendidikan Wali</label>
                                    <input type="text" class="form-control" id="id_pendidikan_wali" name="id_pendidikan_wali" placeholder="Masukkan Pendidikan Wali">
                                </div>
                                <div class="form-group">
                                    <label for="id_pekerjaan_wali">Pekerjaan Wali</label>
                                    <input type="text" class="form-control" id="id_pekerjaan_wali" name="id_pekerjaan_wali" placeholder="Masukkan Pekerjaan Wali">
                                </div>
                                <div class="form-group">
                                    <label for="id_penghasilan_wali">Penghasilan Wali</label>
                                    <input type="text" class="form-control" id="id_penghasilan_wali" name="id_penghasilan_wali" placeholder="Masukkan Penghasilan Wali">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="<?= base_url('mahasiswa') ?>" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
