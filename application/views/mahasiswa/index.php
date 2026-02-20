<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Mahasiswa</h4>
                        <!-- <a href="<?= base_url('mahasiswa/create') ?>" class="btn btn-primary btn-round ms-auto">
                            <i class="fa fa-plus"></i>
                            Tambah Mahasiswa
                        </a> -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="mahasiswa-table" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>HP</th>
                                    <th>Nama Ibu</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach ($mahasiswa as $mhs): ?>
								<tr>
									<td><?= htmlspecialchars($mhs->nik, ENT_QUOTES, 'UTF-8') ?></td>
									<td><?= htmlspecialchars($mhs->nama_mahasiswa, ENT_QUOTES, 'UTF-8') ?></td>
									<td><?= htmlspecialchars($mhs->tanggal_lahir, ENT_QUOTES, 'UTF-8') ?></td>
									<td><?= htmlspecialchars($mhs->handphone, ENT_QUOTES, 'UTF-8') ?></td>
									<td><?= htmlspecialchars($mhs->nama_ibu_kandung, ENT_QUOTES, 'UTF-8') ?></td>
									<td>
										<a href="javascript:void(0)" class="btn btn-sm btn-warning"><span class="fas fa-edit"></span></a>
										<a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><span class="fas fa-trash"></span></a>
									</td>
								</tr>
								<?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- <div class="row">
		<div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Jurusan dan Kelas</h4>
                        <a href="<?= base_url('mahasiswa/create') ?>" class="btn btn-primary btn-round ms-auto">
                            <i class="fa fa-plus"></i>
                            Tambah Mahasiswa
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="jurusan-kelas-table" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>NPM</th>
                                    <th>Kelas</th>
                                    <th>Program</th>
                                    <th>Angkatan</th>
                                    <th>Jurusan</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<tr>
									<td>07302156</td>
									<td>MIF-K31/25</td>
									<td>Karyawan</td>
									<td>2025</td>
									<td>D3 - Manajemen Informatika</td>
									<td>
										<a href="#" class="btn btn-sm btn-warning"><span class="fas fa-edit"></span></a>
										<a href="#" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><span class="fas fa-trash"></span></a>
									</td>
								</tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
	</div> -->
</div>

<script>
    $(document).ready(function() {
        $('#mahasiswa-table').DataTable();
    });
</script>
