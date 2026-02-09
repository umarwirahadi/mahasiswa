<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<?php if (validation_errors()): ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?= validation_errors() ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>
			<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?= $this->session->flashdata('success') ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>
			<?php if ($this->session->flashdata('error')): ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?= $this->session->flashdata('error') ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>
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
									<label for="nama_mahasiswa">Nama Mahasiswa </label>
									<input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Masukkan Nama Mahasiswa" required value="<?= isset($mahasiswa) ? $mahasiswa->nama : '' ?>">
								</div>
								<div class="form-group">
									<label for="jenis_kelamin">Jenis Kelamin</label>
									<select class="form-select form-select-lg" id="jenis_kelamin" name="jenis_kelamin" required>
										<option value="L" <?= set_select('jenis_kelamin', 'L', TRUE) ?>>Laki-laki</option>
										<option value="P" <?= set_select('jenis_kelamin', 'P') ?>>Perempuan</option>
									</select>
								</div>
								<div class="form-group">
									<label for="tempat_lahir">Tempat Lahir</label>
									<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required value="<?= set_value('tempat_lahir') ?>">
								</div>
								<div class="form-group">
									<label for="tanggal_lahir">Tanggal Lahir</label>
									<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required value="<?= isset($mahasiswa) ? $mahasiswa->tanggallahir : set_value('tanggal_lahir') ?>">
								</div>

							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label for="nik">NIK</label>
									<input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" required value="<?= set_value('nik') ?>">
								</div>
								<div class="form-group">
									<label for="nisn">NISN</label>
									<input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN" value="<?= set_value('nisn') ?>">
								</div>
								<div class="form-group">
									<label for="kewarganegaraan">Kewarganegaraan</label>
									<input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" placeholder="Masukkan Kewarganegaraan" required value="<?= set_value('kewarganegaraan') ?>">
								</div>
								<div class="form-group">
									<label for="id_agama">Agama</label>
									<select class="form-select form-select-lg" id="id_agama" name="id_agama" required>
										<option value="">-- Pilih --</option>
										<?php foreach ($referensi as $ref): ?>
											<?php if ($ref->kelompok != 'AGAMA') continue; ?>
											<option value="<?= $ref->kode_dikti ?>" <?= set_select('id_agama', $ref->kode_dikti) ?>><?= $ref->nama_referensi ?></option>

										<?php endforeach; ?>
									</select>
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
									<input type="text" class="form-control" id="jalan" name="jalan" placeholder="Masukkan Jalan" value="<?= isset($mahasiswa) ? $mahasiswa->alamat1 : set_value('jalan') ?>">
								</div>
								<div class="form-group">
									<label for="dusun">Dusun</label>
									<input type="text" class="form-control" id="dusun" name="dusun" placeholder="Masukkan Dusun" value="<?= set_value('dusun') ?>">
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="rt">RT</label>
											<input type="text" class="form-control" id="rt" name="rt" placeholder="Masukkan RT" value="<?= set_value('rt') ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="rw">RW</label>
											<input type="text" class="form-control" id="rw" name="rw" placeholder="Masukkan RW" value="<?= set_value('rw') ?>">
										</div>
									</div>

								</div>


							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label for="kelurahan">Kelurahan</label>
									<input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Masukkan Kelurahan" required	value="<?= set_value('kelurahan') ?>">
								</div>
								<div class="form-group">
									<label for="kode_pos">Kode Pos</label>
									<input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Masukkan Kode Pos" value="<?= set_value('kode_pos') ?>">
								</div>
								<div class="form-group">
									<label for="id_kecamatan">Kecamatan</label>
									<input type="text" class="form-control" id="id_kecamatan" name="id_kecamatan" placeholder="Masukkan Kecamatan" value="<?= set_value('id_kecamatan') ?>">
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
									<select class="form-select form-select-lg" id="id_jenis_tinggal" name="id_jenis_tinggal">
										<option value="">-- Pilih --</option>
										<?php foreach ($referensi as $ref): ?>
											<?php if ($ref->kelompok != 'JENIS_TINGGAL') continue; ?>
											<option value="<?= $ref->kode_dikti ?>" <?= set_select('id_jenis_tinggal', $ref->kode_dikti) ?>><?= $ref->nama_referensi ?></option>

										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="id_alat_transportasi">Alat Transportasi</label>
									<select name="id_alat_transportasi" id="id_alat_transportasi" class="form-select form-select-lg">
										<option value="">-- Pilih --</option>
										<?php foreach ($referensi as $ref): ?>
											<?php if ($ref->kelompok != 'TRANSPORTASI') continue; ?>
											<option value="<?= $ref->kode_dikti ?>" <?= set_select('id_alat_transportasi', $ref->kode_dikti) ?>><?= $ref->nama_referensi ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="telepon">Telepon</label>
											<input type="tel" class="form-control" id="telepon" name="telepon" placeholder="Masukkan Nomor Telepon" value="<?= isset($mahasiswa) ? $mahasiswa->tlprumah : set_value('telepon') ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="handphone">Handphone</label>
											<input type="tel" class="form-control" id="handphone" name="handphone" placeholder="Masukkan Nomor Handphone" value="<?= isset($mahasiswa) ? $mahasiswa->hp : set_value('handphone') ?>">
										</div>
									</div>

								</div>


								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?= $this->session->userdata('email')!=='' ? $this->session->userdata('email') : set_value('email') ?>">
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
									<input type="text" class="form-control" id="nik_ayah" name="nik_ayah" placeholder="Masukkan NIK Ayah"	value="<?= set_value('nik_ayah') ?>">
								</div>
								<div class="form-group">
									<label for="nama_ayah">Nama Ayah</label>
									<input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah" required value="<?= set_value('nama_ayah') ?>">
								</div>
								<div class="form-group">
									<label for="tanggal_lahir_ayah">Tanggal Lahir Ayah</label>
									<input type="date" class="form-control" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" value="<?= set_value('tanggal_lahir_ayah') ?>">
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label for="id_pendidikan_ayah">Pendidikan Ayah</label>
									<select name="id_pendidikan_ayah" id="id_pendidikan_ayah" class="form-select form-select-lg">
										<option value="">-- Pilih --</option>
										<?php foreach ($referensi as $ref): ?>
											<?php if ($ref->kelompok != 'PENDIDIKAN') continue; ?>
											<option value="<?= $ref->kode_dikti ?>" <?= set_select('id_pendidikan_ayah', $ref->kode_dikti) ?>><?= $ref->nama_referensi ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="id_pekerjaan_ayah">Pekerjaan Ayah</label>
									<select name="id_pekerjaan_ayah" id="id_pekerjaan_ayah" class="form-select form-select-lg">
										<option value="">-- Pilih --</option>
										<?php foreach ($referensi as $ref): ?>
											<?php if ($ref->kelompok != 'PEKERJAAN') continue; ?>
											<option value="<?= $ref->kode_dikti ?>" <?= set_select('id_pekerjaan_ayah', $ref->kode_dikti) ?>><?= $ref->nama_referensi ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="id_penghasilan_ayah">Penghasilan Ayah</label>
									<select name="id_penghasilan_ayah" id="id_penghasilan_ayah" class="form-select form-select-lg">
										<option value="">-- Pilih --</option>
										<?php foreach ($referensi as $ref): ?>
											<?php if ($ref->kelompok != 'PENGHASILAN') continue; ?>
											<option value="<?= $ref->kode_dikti ?>" <?= set_select('id_penghasilan_ayah', $ref->kode_dikti) ?>><?= $ref->nama_referensi ?></option>
										<?php endforeach; ?>
									</select>
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
									<input type="text" class="form-control" id="nik_ibu" name="nik_ibu" placeholder="Masukkan NIK Ibu" value="<?= set_value('nik_ibu') ?>">
								</div>
								<div class="form-group">
									<label for="nama_ibu_kandung">Nama Ibu Kandung</label>
									<input type="text" class="form-control" id="nama_ibu_kandung" name="nama_ibu_kandung" placeholder="Masukkan Nama Ibu" required value="<?= set_value('nama_ibu_kandung') ?>">
								</div>
								<div class="form-group">
									<label for="tanggal_lahir_ibu">Tanggal Lahir Ibu</label>
									<input type="date" class="form-control" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" value="<?= set_value('tanggal_lahir_ibu') ?>">
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label for="id_pendidikan_ibu">Pendidikan Ibu</label>
									<select name="id_pendidikan_ibu" id="id_pendidikan_ibu" class="form-select form-select-lg">
										<option value="">-- Pilih --</option>
										<?php foreach ($referensi as $ref): ?>
											<?php if ($ref->kelompok != 'PENDIDIKAN') continue; ?>
											<option value="<?= $ref->kode_dikti ?>" <?= set_select('id_pendidikan_ibu', $ref->kode_dikti) ?>><?= $ref->nama_referensi ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="id_pekerjaan_ibu">Pekerjaan Ibu</label>
									<select name="id_pekerjaan_ibu" id="id_pekerjaan_ibu" class="form-select form-select-lg">
										<option value="">-- Pilih --</option>
										<?php foreach ($referensi as $ref): ?>
											<?php if ($ref->kelompok != 'PEKERJAAN') continue; ?>
											<option value="<?= $ref->kode_dikti ?>" <?= set_select('id_pekerjaan_ibu', $ref->kode_dikti) ?>><?= $ref->nama_referensi ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="id_penghasilan_ibu">Penghasilan Ibu</label>
									<select name="id_penghasilan_ibu" id="id_penghasilan_ibu" class="form-select form-select-lg">
										<option value="">-- Pilih --</option>
										<?php foreach ($referensi as $ref): ?>
											<?php if ($ref->kelompok != 'PENGHASILAN') continue; ?>
											<option value="<?= $ref->kode_dikti ?>" <?= set_select('id_penghasilan_ibu', $ref->kode_dikti) ?>><?= $ref->nama_referensi ?></option>
										<?php endforeach; ?>
									</select>
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
									<input type="text" class="form-control" id="nama_wali" name="nama_wali" placeholder="Masukkan Nama Wali" value="<?= set_value('nama_wali') ?>">
								</div>
								<div class="form-group">
									<label for="tanggal_lahir_wali">Tanggal Lahir Wali</label>
									<input type="date" class="form-control" id="tanggal_lahir_wali" name="tanggal_lahir_wali" value="<?= set_value('tanggal_lahir_wali') ?>">
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label for="id_pendidikan_wali">Pendidikan Wali</label>
									<select name="id_pendidikan_wali" id="id_pendidikan_wali" class="form-select form-select-lg">
										<option value="">-- Pilih --</option>
										<?php foreach ($referensi as $ref): ?>
											<?php if ($ref->kelompok != 'PENDIDIKAN') continue; ?>
											<option value="<?= $ref->kode_dikti ?>" <?= set_select('id_pendidikan_wali', $ref->kode_dikti) ?>><?= $ref->nama_referensi ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="id_pekerjaan_wali">Pekerjaan Wali</label>
											<select name="id_pekerjaan_wali" id="id_pekerjaan_wali" class="form-select form-select-lg">
												<option value="">-- Pilih --</option>
												<?php foreach ($referensi as $ref): ?>
													<?php if ($ref->kelompok != 'PEKERJAAN') continue; ?>
													<option value="<?= $ref->kode_dikti ?>" <?= set_select('id_pekerjaan_wali', $ref->kode_dikti) ?>><?= $ref->nama_referensi ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="id_penghasilan_wali">Penghasilan Wali</label>
											<select name="id_penghasilan_wali" id="id_penghasilan_wali" class="form-select form-select-lg">
												<option value="">-- Pilih --</option>
												<?php foreach ($referensi as $ref): ?>
													<?php if ($ref->kelompok != 'PENGHASILAN') continue; ?>
													<option value="<?= $ref->kode_dikti ?>" <?= set_select('id_penghasilan_wali', $ref->kode_dikti) ?>><?= $ref->nama_referensi ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
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
