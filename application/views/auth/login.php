<div class="row justify-content-center w-100">
	<div class="col-12 col-md-10 col-lg-8 col-xl-7">
		<div class="card card-round overflow-hidden mb-0">
			<div class="row g-0">
				<!-- Left brand panel (desktop) -->
				<div class="col-md-5 d-none d-md-flex bg-primary text-white">
					<div class="p-4 d-flex flex-column justify-content-between w-100 side-bar-login">
						<div>
							<div class="d-flex align-items-center mb-4">
								<img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" height="36" class="me-2" />
								<div class="fw-bold">SIMAK</div>
							</div>
							<!-- <h3 class="fw-bold mb-2">Portal Mahasiswa</h3>
							<p class="mb-0 opacity-75">Masuk untuk melihat KHS, pembayaran, dan data profil.</p> -->
						</div>
						<div class="small opacity-75">&copy; <?= date('Y') ?> SIMAK</div>
					</div>
				</div>

				<!-- Form panel -->
				<div class="col-12 col-md-7 bg-purple-ppg text-white">
					<div class="p-4 p-md-5">
						<div class="d-md-none d-flex align-items-center mb-4">
							<img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo" height="32" class="me-2" />
							<div>
								<div class="fw-bold">SIMAK</div>
								<div class="text-muted small">Portal Mahasiswa</div>
							</div>
						</div>

						<h4 class="fw-bold mb-1">Login</h4>
						<p class="text-muted mb-4">Silakan masukkan akun Anda.</p>

						<?php if (!empty($flash_success)): ?>
							<div class="alert alert-success text-primary" role="alert"><?= htmlspecialchars((string) $flash_success, ENT_QUOTES, 'UTF-8') ?></div>
						<?php endif; ?>
						<?php if (!empty($flash_error)): ?>
							<div class="alert alert-danger text-danger" role="alert"><?= htmlspecialchars((string) $flash_error, ENT_QUOTES, 'UTF-8') ?></div>
						<?php endif; ?>
						<?php if (!empty($login_error)): ?>
							<div class="alert alert-danger text-danger" role="alert"><?= htmlspecialchars((string) $login_error, ENT_QUOTES, 'UTF-8') ?></div>
						<?php endif; ?>
						<?php if (validation_errors()): ?>
							<div class="alert alert-danger" role="alert">
								<?= validation_errors('<div class="small">• ', '</div>') ?>
							</div>
						<?php endif; ?>

						<form action="<?= site_url('login') ?>" method="post" autocomplete="on">
							<div class="form-group">
								<label for="identity">NIM / Email</label>
								<input
									type="text"
									class="form-control"
									id="identity"
									name="identity"
									placeholder="Masukkan NIM atau email"
									value="<?= set_value('identity') ?>"
									required />
							</div>

							<div class="form-group">
								<label for="password">Password</label>
								<input
									type="password"
									class="form-control"
									id="password"
									name="password"
									placeholder="Masukkan password"
									required />
							</div>

							<div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
								<div class="form-check mb-0">
									<input class="form-check-input" type="checkbox" value="1" id="remember" name="remember" />
									<label class="form-check-label" for="remember">Ingat saya</label>
								</div>
								<a href="#" class="small">Lupa password?</a>
							</div>

							<button type="submit" class="btn btn-primary w-100">
								<i class="fas fa-sign-in-alt me-2"></i>Masuk
							</button>
						</form>

						<div class="text-center mt-4">
							<span class="text-muted">Belum punya akun?</span>
							<a href="<?= site_url('register') ?>" class="fw-bold ms-1">Daftar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
