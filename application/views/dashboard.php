<div class="page-inner">
    <?php
    $session_user = isset($session_user) && is_array($session_user) ? $session_user : [];
    $identity = isset($session_user['auth_identity']) ? (string) $session_user['auth_identity'] : '';
    $nim = isset($session_user['nim']) ? (string) $session_user['nim'] : '';
    $authUserId = isset($session_user['auth_user_id']) ? (string) $session_user['auth_user_id'] : '';

    $nama = isset($mahasiswa) && $mahasiswa_source=='' ? (string) $mahasiswa->nama_mahasiswa : (isset($mahasiswa_source['nama']) ? (string) $mahasiswa_source['nama'] : '');
    $email = isset($mahasiswa) && isset($mahasiswa->email) ? (string) $mahasiswa->email : '';
    $hp = isset($mahasiswa) && isset($mahasiswa->handphone) ? (string) $mahasiswa->handphone : '';
    $tglLahir = isset($mahasiswa) && isset($mahasiswa->tanggal_lahir) ? (string) $mahasiswa->tanggal_lahir : '';
    $source = isset($mahasiswa_source) ? (string) $mahasiswa_source : '';
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
                                    <strong class="h6 mb-0"><?= htmlspecialchars($identity !== '' ? $identity : '-', ENT_QUOTES, 'UTF-8') ?></strong>
                                </div>
                                <div class="col-12 col-md-3">
                                    <span class="text-muted small d-block">NIM/NPM</span>
                                    <strong class="h6 mb-0"><?= htmlspecialchars($nim !== '' ? $nim : '-', ENT_QUOTES, 'UTF-8') ?></strong>
                                </div>
                                <div class="col-12 col-md-3">
                                    <span class="text-muted small d-block">Nama Mahasiswa</span>
                                    <strong class="h6 mb-0"><?= htmlspecialchars($nama !== '' ? $nama : '-', ENT_QUOTES, 'UTF-8') ?></strong>
                                </div>
                                <div class="col-12 col-md-2">
                                    <span class="text-muted small d-block">Sumber Data</span>
                                    <strong class="h6 mb-0"><?= htmlspecialchars($source !== '' ? $source : '-', ENT_QUOTES, 'UTF-8') ?></strong>
                                </div>
                            </div>

                            <hr class="my-3" />

                            <div class="row g-3">
                                <div class="col-12 col-md-4">
                                    <span class="text-muted small d-block">Email</span>
                                    <strong class="h6 mb-0"><?= htmlspecialchars($email !== '' ? $email : '-', ENT_QUOTES, 'UTF-8') ?></strong>
                                </div>
                                <div class="col-12 col-md-4">
                                    <span class="text-muted small d-block">No. HP</span>
                                    <strong class="h6 mb-0"><?= htmlspecialchars($hp !== '' ? $hp : '-', ENT_QUOTES, 'UTF-8') ?></strong>
                                </div>
                                <div class="col-12 col-md-4">
                                    <span class="text-muted small d-block">Tanggal Lahir</span>
                                    <strong class="h6 mb-0"><?= htmlspecialchars($tglLahir !== '' ? $tglLahir : '-', ENT_QUOTES, 'UTF-8') ?></strong>
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
                                <h4 class="card-title"><?= htmlspecialchars($authUserId !== '' ? substr($authUserId, 0, 8) . '…' : '-', ENT_QUOTES, 'UTF-8') ?></h4>
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
                    <div class="card-title">Transaction History</div>
                    <div class="card-tools">
                        <div class="dropdown">
                            <button
                                class="btn btn-icon btn-clean me-0"
                                type="button"
                                id="dropdownMenuButton"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <div
                                class="dropdown-menu"
                                aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Payment Number</th>
                                <th scope="col" class="text-end">Date & Time</th>
                                <th scope="col" class="text-end">Amount</th>
                                <th scope="col" class="text-end">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <button
                                        class="btn btn-icon btn-round btn-success btn-sm me-2">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    Payment from #10231
                                </th>
                                <td class="text-end">Mar 19, 2020, 2.45pm</td>
                                <td class="text-end">$250.00</td>
                                <td class="text-end">
                                    <span class="badge badge-success">Completed</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <button
                                        class="btn btn-icon btn-round btn-success btn-sm me-2">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    Payment from #10231
                                </th>
                                <td class="text-end">Mar 19, 2020, 2.45pm</td>
                                <td class="text-end">$250.00</td>
                                <td class="text-end">
                                    <span class="badge badge-success">Completed</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <button
                                        class="btn btn-icon btn-round btn-success btn-sm me-2">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    Payment from #10231
                                </th>
                                <td class="text-end">Mar 19, 2020, 2.45pm</td>
                                <td class="text-end">$250.00</td>
                                <td class="text-end">
                                    <span class="badge badge-success">Completed</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <button
                                        class="btn btn-icon btn-round btn-success btn-sm me-2">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    Payment from #10231
                                </th>
                                <td class="text-end">Mar 19, 2020, 2.45pm</td>
                                <td class="text-end">$250.00</td>
                                <td class="text-end">
                                    <span class="badge badge-success">Completed</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <button
                                        class="btn btn-icon btn-round btn-success btn-sm me-2">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    Payment from #10231
                                </th>
                                <td class="text-end">Mar 19, 2020, 2.45pm</td>
                                <td class="text-end">$250.00</td>
                                <td class="text-end">
                                    <span class="badge badge-success">Completed</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <button
                                        class="btn btn-icon btn-round btn-success btn-sm me-2">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    Payment from #10231
                                </th>
                                <td class="text-end">Mar 19, 2020, 2.45pm</td>
                                <td class="text-end">$250.00</td>
                                <td class="text-end">
                                    <span class="badge badge-success">Completed</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <button
                                        class="btn btn-icon btn-round btn-success btn-sm me-2">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    Payment from #10231
                                </th>
                                <td class="text-end">Mar 19, 2020, 2.45pm</td>
                                <td class="text-end">$250.00</td>
                                <td class="text-end">
                                    <span class="badge badge-success">Completed</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
