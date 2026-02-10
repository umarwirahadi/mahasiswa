<div class="page-inner">
	<!-- Student Info Card -->
	<!-- <div class="row mb-4">
		<div class="col-12">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="d-flex flex-column flex-md-row align-items-start align-items-md-center">
						<div class="me-md-3 mb-3 mb-md-0">
							<div class="avatar avatar-xl bg-primary rounded-circle">
								<i class="fas fa-user-graduate fa-2x text-white"></i>
							</div>
						</div>
						<div class="flex-grow-1 w-100">
							<div class="row g-3">
								<div class="col-12 col-sm-6 col-md-4">
									<span class="text-muted small d-block">Nama Mahasiswa</span>
									<strong class="h6 mb-0">Ahmad Rizki Pratama</strong>
								</div>
								<div class="col-12 col-sm-6 col-md-2">
									<span class="text-muted small d-block">NIM</span>
									<strong class="h6 mb-0">2024001234</strong>
								</div>
								<div class="col-12 col-sm-6 col-md-3">
									<span class="text-muted small d-block">Program Studi</span>
									<strong class="h6 mb-0">Teknik Informatika</strong>
								</div>
								<div class="col-12 col-sm-6 col-md-3">
									<span class="text-muted small d-block">Angkatan</span>
									<strong class="h6 mb-0">2024</strong>
								</div>
							</div>

							<hr class="my-3" />

							<div class="row g-3">
								<div class="col-6 col-md-3">
									<span class="text-muted small d-block">IPK</span>
									<strong class="h6 mb-0">3.71</strong>
								</div>
								<div class="col-6 col-md-3">
									<span class="text-muted small d-block">Total SKS</span>
									<strong class="h6 mb-0">72</strong>
								</div>
								<div class="col-6 col-md-3">
									<span class="text-muted small d-block">Matakuliah Lulus</span>
									<strong class="h6 mb-0">24</strong>
								</div>
								<div class="col-6 col-md-3">
									<span class="text-muted small d-block">Semester Aktif</span>
									<strong class="h6 mb-0">4</strong>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<!-- KHS Tabs -->
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center justify-content-between flex-wrap">
						<h4 class="card-title mb-2 mb-md-0"><?= $title ?></h4>
						<div class="btn-group btn-group-sm" role="group">
							<button type="button" class="btn btn-outline-primary" onclick="window.print()">
								<i class="fas fa-print me-1"></i> Cetak
							</button>
							<button type="button" class="btn btn-outline-success">
								<i class="fas fa-download me-1"></i> Export
							</button>
						</div>
					</div>
				</div>
				<div class="card-body">
					<!-- Modern Nav tabs with pills style -->
					<ul class="nav nav-pills nav-secondary nav-pills-no-bd flex-column flex-md-row mb-4" id="semesterTabs" role="tablist">
						<?php for ($i = 1; $i <= 8; $i++): ?>
						<li class="nav-item" role="presentation">
							<a class="nav-link <?= $i === 1 ? 'active' : '' ?> px-3" id="tab-smt<?= $i ?>" data-bs-toggle="pill" href="#smt<?= $i ?>" role="tab">
								<span class="d-none d-md-inline">Semester </span><?= $i ?>
							</a>
						</li>
						<?php endfor; ?>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content" id="semesterTabContent">
						<?php for ($sem = 1; $sem <= 8; $sem++): ?>
						<?php 
						// Filter khs_list for current semester
						$semester_courses = isset($khs_list) ? array_filter($khs_list, function($item) use ($sem) {
							if (is_object($item)) {
								$item_sem = isset($item->semester) ? $item->semester : (isset($item->smt) ? $item->smt : 0);
							} else {
								$item_sem = isset($item['smt']) ? $item['smt'] : (isset($item['smt']) ? $item['smt'] : 0);
							}
							return $item_sem == $sem;
						}) : [];
						$semester_courses = array_values($semester_courses);
						
						// Calculate totals for current semester
						$total_sks = 0;
						$total_bobot = 0;
						foreach ($semester_courses as $course) {
							if (is_object($course)) {
								$sks = isset($course->sks) ? $course->sks : 0;
								$bobot = isset($course->bobot) ? $course->bobot : 0;
							} else {
								$sks = isset($course['sks']) ? $course['sks'] : 0;
								$bobot = isset($course['bobot']) ? $course['bobot'] : 0;
							}
							$total_sks += $sks;
							$total_bobot += ($sks * $bobot);
						}
						$ips = $total_sks > 0 ? $total_bobot / $total_sks : 0;
						?>
						<div class="tab-pane fade <?= $sem === 1 ? 'show active' : '' ?>" id="smt<?= $sem ?>" role="tabpanel">

							<?php if (count($semester_courses) > 0): ?>
							<!-- Course Table -->
							<div class="table-responsive">
								<table class="table table-hover table-striped align-middle">
									<thead class="table-dark">
										<tr>
											<th class="text-center" style="width: 50px;">No</th>
											<th style="width: 120px;">Kode MK</th>
											<th>Nama Mata Kuliah</th>
											<th class="text-center" style="width: 80px;">SKS</th>
											<th class="text-center" style="width: 80px;">UTS</th>
											<th class="text-center" style="width: 80px;">UAS</th>
											<th class="text-center" style="width: 80px;">Nilai</th>
											<th class="text-center" style="width: 80px;">Bobot</th>
											<th class="text-center" style="width: 100px;">SKS × Bobot</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; foreach ($semester_courses as $course): ?>
										<?php 
										if (is_object($course)) {
											$kodematkul = isset($course->kodematkul) ? $course->kodematkul : '-';
											$namamatkul = isset($course->namamatkul) ? $course->namamatkul : '-';
											$sks = isset($course->sks) ? $course->sks : 0;
											$uts = isset($course->nilaiuts) ? $course->nilaiuts : '-';
											$uas = isset($course->nilaiuas) ? $course->nilaiuas : '-';
											$nilai = isset($course->nilaiakhir) ? $course->nilaiakhir : '-';
											$bobot = isset($course->bobot) ? $course->bobot : 0;
										} else {
											$kodematkul = isset($course['kodematkul']) ? $course['kodematkul'] : '-';
											$namamatkul = isset($course['namamatkul']) ? $course['namamatkul'] : '-';
											$sks = isset($course['sks']) ? $course['sks'] : 0;
											$uts = isset($course['nilaiuts']) ? $course['nilaiuts'] : '-';
											$uas = isset($course['nilaiuas']) ? $course['nilaiuas'] : '-';
											$nilai = isset($course['nilaiakhir']) ? $course['nilaiakhir'] : '-';
											$bobot = isset($course['bobot']) ? $course['bobot'] : 0;
										}
										$sks_bobot = $sks * $bobot;
										
										// Determine badge color based on grade
										$badge_class = 'bg-secondary';
										if (in_array($nilai, ['A', 'A-'])) {
											$badge_class = 'bg-success';
										} elseif (in_array($nilai, ['B+', 'B', 'B-'])) {
											$badge_class = 'bg-primary';
										} elseif (in_array($nilai, ['C+', 'C'])) {
											$badge_class = 'bg-warning';
										} elseif (in_array($nilai, ['D', 'E'])) {
											$badge_class = 'bg-danger';
										}
										?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td><span class="badge bg-secondary"><?= htmlspecialchars($kodematkul) ?></span></td>
											<td><?= htmlspecialchars($namamatkul) ?></td>
											<td class="text-center"><?= $sks ?></td>
											<td class="text-center"><?= htmlspecialchars($uts) ?></td>
											<td class="text-center"><?= htmlspecialchars($uas) ?></td>
											<td class="text-center"><span class="badge <?= $badge_class ?>"><?= htmlspecialchars($nilai) ?></span></td>
											<td class="text-center"><?= number_format($bobot, 1) ?></td>
											<td class="text-center fw-bold"><?= number_format($sks_bobot, 1) ?></td>
										</tr>
										<?php endforeach; ?>
									</tbody>
									<tfoot class="table-light">
										<tr class="fw-bold">
											<td colspan="3" class="text-end">Total:</td>
											<td class="text-center"><?= $total_sks ?></td>
											<td colspan="2" class="text-end">IPS:</td>
											<td class="text-center text-primary"><?= number_format($ips, 2) ?></td>
										</tr>
									</tfoot>
								</table>
							</div>
							<?php else: ?>
							<!-- Empty State -->
							<div class="text-center py-5">
								<div class="mb-3">
									<i class="fas fa-folder-open fa-4x text-muted opacity-50"></i>
								</div>
								<h5 class="text-muted">Belum Ada Data</h5>
								<p class="text-muted small">Data KHS untuk semester <?= $sem ?> belum tersedia.</p>
							</div>
							<?php endif; ?>
						</div>
						<?php endfor; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
/* Custom gradient backgrounds */
.bg-primary-gradient {
	background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}
.bg-info-gradient {
	background: linear-gradient(135deg, #17a2b8 0%, #1abc9c 100%);
}
.bg-success-gradient {
	background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
}
.bg-warning-gradient {
	background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
}

/* Card hover effect */
.card-stats:hover {
	transform: translateY(-2px);
	box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
	transition: all 0.3s ease;
}

/* Avatar styling */
.avatar {
	width: 60px;
	height: 60px;
	display: flex;
	align-items: center;
	justify-content: center;
}
.avatar-xl {
	width: 70px;
	height: 70px;
}

/* Nav pills responsive */
@media (max-width: 767.98px) {
	.nav-pills-no-bd .nav-link {
		padding: 0.5rem 0.75rem;
		font-size: 0.875rem;
		margin-bottom: 0.25rem;
	}
	
	.nav-pills.flex-column .nav-item {
		width: 25%;
		text-align: center;
	}
	
	.nav-pills.flex-column {
		flex-direction: row !important;
		flex-wrap: wrap;
	}
}

/* Table improvements */
.table th, .table td {
	vertical-align: middle;
}

/* Badge styling for grades */
.badge {
	font-size: 0.85em;
	padding: 0.4em 0.6em;
}

/* Print styles */
@media print {
	.btn-group, .nav-pills {
		display: none !important;
	}
	.tab-pane {
		display: block !important;
		opacity: 1 !important;
	}
}
</style>

<script>
$(document).ready(function() {
	// Smooth tab transition
	$('#semesterTabs a[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
		$(e.target).addClass('active');
	});
});
</script>
