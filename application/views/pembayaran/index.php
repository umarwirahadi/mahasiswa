<div class="page-inner">
	<div class="row">
		<div class="col-12">
			<div class="card card-round">
				<div class="card-header">
					<div class="card-head-row card-tools-still-right">
						<div class="card-title"><?= isset($title) ? $title : 'Riwayat Pembayaran' ?></div>
					</div>
				</div>
				<div class="card-body">
					<?php
					// Demo data (replace with data from controller/model)
					$payments = isset($payments) ? $payments : [
						[
							'id' => 10021,
							'tanggal' => '2026-01-15 10:21',
							'jenis' => 'SPP',
							'semester' => 4,
							'nominal' => 2500000,
							'biaya_admin' => 2500,
							'channel' => 'Virtual Account',
							'referensi' => 'VA-8841-20260115',
							'status' => 'Lunas',
						],
						[
							'id' => 10008,
							'tanggal' => '2025-09-02 14:05',
							'jenis' => 'UKT',
							'semester' => 3,
							'nominal' => 2400000,
							'biaya_admin' => 2500,
							'channel' => 'QRIS',
							'referensi' => 'QR-20250902-7721',
							'status' => 'Lunas',
						],
						[
							'id' => 9992,
							'tanggal' => '2025-02-10 09:10',
							'jenis' => 'SPP',
							'semester' => 2,
							'nominal' => 2500000,
							'biaya_admin' => 2500,
							'channel' => 'Transfer Bank',
							'referensi' => 'TRF-20250210-1120',
							'status' => 'Menunggu Verifikasi',
						],
					];

					$totalTagihan = 0;
					$totalLunas = 0;
					foreach ($payments as $p) {
						$tagihan = (int) $p['nominal'] + (int) $p['biaya_admin'];
						$totalTagihan += $tagihan;
						if (isset($p['status']) && strtolower($p['status']) === 'lunas') {
							$totalLunas += $tagihan;
						}
					}
					$sisa = max(0, $totalTagihan - $totalLunas);
					?>

					<div class="row mb-4">
						<div class="col-sm-6 col-md-3">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-info bubble-shadow-small">
												<i class="fas fa-receipt"></i>
											</div>
										</div>
										<div class="col col-stats ms-3 ms-sm-0">
											<div class="numbers">
												<p class="card-category">Total Transaksi</p>
												<h4 class="card-title"><?= number_format(count($payments)) ?></h4>
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
											<div class="icon-big text-center icon-success bubble-shadow-small">
												<i class="fas fa-check-circle"></i>
											</div>
										</div>
										<div class="col col-stats ms-3 ms-sm-0">
											<div class="numbers">
												<p class="card-category">Total Lunas</p>
												<h4 class="card-title">Rp <?= number_format($totalLunas, 0, ',', '.') ?></h4>
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
											<div class="icon-big text-center icon-warning bubble-shadow-small">
												<i class="fas fa-hourglass-half"></i>
											</div>
										</div>
										<div class="col col-stats ms-3 ms-sm-0">
											<div class="numbers">
												<p class="card-category">Sisa / Belum Lunas</p>
												<h4 class="card-title">Rp <?= number_format($sisa, 0, ',', '.') ?></h4>
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
												<i class="fas fa-wallet"></i>
											</div>
										</div>
										<div class="col col-stats ms-3 ms-sm-0">
											<div class="numbers">
												<p class="card-category">Total Tagihan</p>
												<h4 class="card-title">Rp <?= number_format($totalTagihan, 0, ',', '.') ?></h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<?php if (!empty($payments)): ?>
						<div class="table-responsive">
							<table class="table align-items-center mb-0 table-hover">
								<thead class="thead-light">
									<tr>
										<th style="width: 70px;" class="text-center">ID</th>
										<th>Tanggal</th>
										<th>Jenis</th>
										<th class="text-center" style="width: 90px;">Semester</th>
										<th class="text-end" style="width: 160px;">Nominal</th>
										<th class="text-end" style="width: 140px;">Admin</th>
										<th>Metode</th>
										<th>Referensi</th>
										<th class="text-center" style="width: 170px;">Status</th>
										<th class="text-center" style="width: 110px;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($payments as $row): ?>
										<?php
											$status = isset($row['status']) ? (string) $row['status'] : '';
											$statusLower = strtolower($status);
											$badgeClass = 'badge badge-secondary';
											if ($statusLower === 'lunas') {
												$badgeClass = 'badge badge-success';
											} elseif (str_contains($statusLower, 'menunggu') || str_contains($statusLower, 'pending')) {
												$badgeClass = 'badge badge-warning';
											} elseif (str_contains($statusLower, 'gagal') || str_contains($statusLower, 'batal')) {
												$badgeClass = 'badge badge-danger';
											}
										?>
										<tr>
											<td class="text-center fw-bold">#<?= (int) $row['id'] ?></td>
											<td><?= htmlspecialchars((string) $row['tanggal'], ENT_QUOTES, 'UTF-8') ?></td>
											<td><?= htmlspecialchars((string) $row['jenis'], ENT_QUOTES, 'UTF-8') ?></td>
											<td class="text-center"><?= (int) $row['semester'] ?></td>
											<td class="text-end">Rp <?= number_format((int) $row['nominal'], 0, ',', '.') ?></td>
											<td class="text-end">Rp <?= number_format((int) $row['biaya_admin'], 0, ',', '.') ?></td>
											<td><?= htmlspecialchars((string) $row['channel'], ENT_QUOTES, 'UTF-8') ?></td>
											<td class="text-muted"><?= htmlspecialchars((string) $row['referensi'], ENT_QUOTES, 'UTF-8') ?></td>
											<td class="text-center"><span class="<?= $badgeClass ?>"><?= htmlspecialchars($status, ENT_QUOTES, 'UTF-8') ?></span></td>
											<td class="text-center">
												<a class="btn btn-sm btn-outline-primary" href="<?= site_url('pembayaran/show/' . (int) $row['id']) ?>">Detail</a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					<?php else: ?>
						<div class="text-center py-5">
							<div class="mb-3">
								<i class="fas fa-folder-open fa-4x text-muted opacity-50"></i>
							</div>
							<h5 class="text-muted">Belum Ada Riwayat Pembayaran</h5>
							<p class="text-muted small mb-0">Transaksi pembayaran Anda akan muncul di sini.</p>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
