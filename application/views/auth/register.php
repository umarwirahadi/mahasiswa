<div class="row justify-content-center w-100">
	<div class="col-12 col-md-11 col-lg-9 col-xl-8">
		<div class="card card-round overflow-hidden mb-0">
			<div class="row g-0">
				<!-- Left info panel (desktop) -->
				<div class="col-md-5 d-none d-md-flex bg-primary text-white">
					<div class="p-4 d-flex flex-column justify-content-between w-100">
						<div>
							<div class="d-flex align-items-center mb-4">
								<img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" height="36" class="me-2" />
								<div class="fw-bold">SIMAK</div>
							</div>
							<h3 class="fw-bold mb-2">Buat Akun</h3>
							<p class="mb-0 opacity-75">Daftar untuk mengakses layanan Portal Mahasiswa.</p>
						</div>
						<div class="small opacity-75">Pastikan data sesuai identitas kampus.</div>
					</div>
				</div>

				<!-- Form panel -->
				<div class="col-12 col-md-7">
					<div class="p-4 p-md-5">
						<div class="d-md-none d-flex align-items-center mb-4">
							<img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" height="32" class="me-2" />
							<div>
								<div class="fw-bold">SIMAK</div>
								<div class="text-muted small">Portal Mahasiswa</div>
							</div>
						</div>

						<h4 class="fw-bold mb-1">Register</h4>
						<p class="text-muted mb-4">Lengkapi data untuk membuat akun.</p>

						<?php if (!empty($flash_success)): ?>
							<div class="alert alert-success" role="alert"><?= htmlspecialchars((string) $flash_success, ENT_QUOTES, 'UTF-8') ?></div>
						<?php endif; ?>
						<?php if (!empty($flash_error)): ?>
							<div class="alert alert-danger" role="alert"><?= htmlspecialchars((string) $flash_error, ENT_QUOTES, 'UTF-8') ?></div>
						<?php endif; ?>
						<?php if (!empty($register_error)): ?>
							<div class="alert alert-danger" role="alert"><?= htmlspecialchars((string) $register_error, ENT_QUOTES, 'UTF-8') ?></div>
						<?php endif; ?>
						<?php if (validation_errors()): ?>
							<div class="alert alert-danger" role="alert">
								<div class="fw-bold mb-1">Periksa kembali input Anda:</div>
								<?= validation_errors('<div class="small">• ', '</div>') ?>
							</div>
						<?php endif; ?>

						<form action="<?= site_url('register') ?>" method="post" autocomplete="on">
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="nama">Nama Lengkap</label>
										<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required value="<?= set_value('nama') ?>" />
									</div>
								</div>

								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label for="nim">NPM</label>
										<input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NPM" required value="<?= set_value('nim') ?>" />
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label for="tanggal_lahir">Tanggal Lahir</label>
										<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required value="<?= set_value('tanggal_lahir') ?>" />
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email aktif" required value="<?= set_value('email') ?>" />
									</div>
								</div>

								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label for="password">Password</label>
										<input type="password" class="form-control" id="password" name="password" placeholder="Buat password" required />
									</div>
								</div>
								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label for="password_confirm">Konfirmasi Password</label>
										<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Ulangi password" required />
									</div>
								</div>
							</div>

							<div class="form-check mb-3">
								<input class="form-check-input" type="checkbox" value="1" id="terms" name="terms" required <?= set_checkbox('terms', '1') ?> />
								<label class="form-check-label" for="terms">
									Saya menyetujui ketentuan yang berlaku
								</label>
							</div>

							<button type="submit" class="btn btn-primary w-100">
								<i class="fas fa-user-plus me-2"></i>Daftar
							</button>
						</form>

						<div class="text-center mt-4">
							<span class="text-muted">Sudah punya akun?</span>
							<a href="<?= site_url('login') ?>" class="fw-bold ms-1">Login</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
