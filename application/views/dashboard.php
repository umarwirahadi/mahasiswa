<div class="page-inner">
    <?php
  /*   $session_user = isset($session_user) && is_array($session_user) ? $session_user : [];
    $identity = isset($session_user['auth_identity']) ? (string) $session_user['auth_identity'] : '';
    $nim = isset($session_user['nim']) ? (string) $session_user['nim'] : '';
    $authUserId = isset($session_user['auth_user_id']) ? (string) $session_user['auth_user_id'] : '';

    $nama = isset($mahasiswa) && $mahasiswa_source=='' ? (string) $mahasiswa->nama_mahasiswa : (isset($mahasiswa_source['nama']) ? (string) $mahasiswa_source['nama'] : '');
    $email = isset($mahasiswa) && isset($mahasiswa->email) ? (string) $mahasiswa->email : '';
    $hp = isset($mahasiswa) && isset($mahasiswa->handphone) ? (string) $mahasiswa->handphone : '';
    $tglLahir = isset($mahasiswa) && isset($mahasiswa->tanggal_lahir) ? (string) $mahasiswa->tanggal_lahir : '';
    $source = isset($mahasiswa_source) ? (string) $mahasiswa_source : ''; */

	$mahasiswa = $this->db->get_where('mahasiswa_new', [
		'id' => $this->session->userdata('mahasiswa_id'),
	])->row();

    ?>

    <!-- User Summary -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="avatar avatar-xl bg-primary rounded-circle">
                                <i class="fas fa-user-graduate fa-2x text-white"></i>
                            </div>
                        </div>
                        <div class="col">							
                            <div class="row g-3">
                                <div class="col-12 col-md-4">
                                    <span class="text-muted small d-block">Login Sebagai</span>
                                    <strong class="h6 mb-0">Mahasiswa</strong>
                                </div>
                                <div class="col-12 col-md-3">
                                    <span class="text-muted small d-block">NIM/NPM</span>
                                    <strong class="h6 mb-0"><?= $this->session->userdata('nim') ?? '-'; ?></strong>
                                </div>
                                <div class="col-12 col-md-3">
                                    <span class="text-muted small d-block">Nama Mahasiswa</span>
                                    <strong class="h6 mb-0"><?= htmlspecialchars($mahasiswa->nama_mahasiswa !== '' ? $mahasiswa->nama_mahasiswa : '-', ENT_QUOTES, 'UTF-8') ?></strong>
                                </div>
                                <div class="col-12 col-md-2">
                                    <span class="text-muted small d-block">Sudah Melakukan update ?</span>
                                    <strong class="h6 mb-0">
										<?= !empty($mahasiswa) ? 'Ya' : 'Belum' ?>
									</strong>
                                </div>
                            </div>

                            <hr class="my-3" />

                            <div class="row g-3">
                                <div class="col-12 col-md-4">
                                    <span class="text-muted small d-block">Email</span>
                                    <strong class="h6 mb-0"><?= htmlspecialchars($mahasiswa->email !== '' ? $mahasiswa->email : '-', ENT_QUOTES, 'UTF-8') ?></strong>
                                </div>
                                <div class="col-12 col-md-4">
                                    <span class="text-muted small d-block">No. HP</span>
                                    <strong class="h6 mb-0"><?= htmlspecialchars($mahasiswa->handphone !== '' ? $mahasiswa->handphone : '-', ENT_QUOTES, 'UTF-8') ?></strong>
                                </div>
                                <div class="col-12 col-md-4">
                                    <span class="text-muted small d-block">Tanggal Lahir</span>
                                    <strong class="h6 mb-0"><?= htmlspecialchars($mahasiswa->tanggal_lahir !== '' ? $mahasiswa->tanggal_lahir : '-', ENT_QUOTES, 'UTF-8') ?></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Simple status cards -->
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="far fa-check-circle"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Status Login</p>
                                <h4 class="card-title">Aktif</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="fas fa-id-badge"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">User ID</p>
                                <h4 class="card-title"><?= htmlspecialchars($this->session->userdata('nim') !== '' ? substr($mahasiswa->id, 0, 20) . '…' : '-', ENT_QUOTES, 'UTF-8') ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-database"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Data Mahasiswa</p>
                                <h4 class="card-title"><?= !empty($is_mahasiswa_found) ? 'Ditemukan' : 'Tidak Ada' ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Tipe</p>
                                <h4 class="card-title">Mahasiswa</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="row">

    <div class="col-md-12">
        <div class="card card-round">
            <div class="card-header">
                <div class="card-head-row card-tools-still-right">
                    <div class="card-title">Jurusan dan Kelas</div>
                    
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">NPM</th>
                                <th scope="col" class="text-end">Kelas</th>
                                <th scope="col" class="text-end">Program</th>
                                <th scope="col" class="text-end">Jurusan</th>
                                <th scope="col" class="text-end">Status</th>
                                <th scope="col" class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
