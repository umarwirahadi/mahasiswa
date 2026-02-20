<div class="page-inner">
  <div class="row">
    <div class="col-md-4">
      <div class="card card-profile">
        <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
          <div class="profile-picture">
            <div class="avatar avatar-xl">
              <img src="<?= base_url('assets/img/user.png') ?>" alt="..." class="avatar-img rounded-circle" />
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="user-profile text-center">
            <div class="name"><?= $mahasiswa->nama_mahasiswa ?? '' ?></div>
            <div class="job"><?= $this->session->userdata('auth_identity') ?? '-' ?></div>
            <div class="job">-</div>
            <div class="desc">- </div>           
          </div>
        </div>
        <div class="card-footer">
					<?php if ($this->session->flashdata('success')): ?>
						<div class="alert alert-success" role="alert">
							<?= $this->session->flashdata('success') ?>
						</div>
					<?php endif; ?>
					<?php if ($this->session->flashdata('error')): ?>
						<div class="alert alert-danger" role="alert">
							<?= $this->session->flashdata('error') ?>
						</div>
					<?php endif; ?>
          <form action="<?= site_url('profile/upload-photo') ?>" method="post" enctype="multipart/form-data" class="p-3">
						<div class="form-group mb-2">
							<label for="profile_photo" class="form-label">Ganti Foto Profil</label>
							<input class="form-control" type="file" id="profile_photo" name="profile_photo" required>
							<small class="form-text text-muted">Pilih file gambar (JPG, PNG, maks 2MB).</small>
						</div>
						<button type="submit" class="btn btn-primary btn-sm w-100">
							<i class="fas fa-upload me-2"></i>Unggah
						</button>
					</form>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Edit Profile</div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 col-lg-4">
              <div class="form-group">
                <label for="email2">Email Address</label>
                <input type="email" class="form-control" id="email2" placeholder="Enter Email" value="<?= $mahasiswa->email?? '' ?>" />
                
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" />
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="address">Address</label>
								<?php
								$alamat = '';
								if (isset($mahasiswa->jalan) && $mahasiswa->jalan != '') {
									$alamat .= $mahasiswa->jalan;
								}
								if (isset($mahasiswa->kelurahan) && $mahasiswa->kelurahan != '') {
									if ($alamat != '') {
										$alamat .= ', ';
									}
									$alamat .= 'Kel. ' . $mahasiswa->kelurahan;;
								}
								if (isset($mahasiswa->kecamatan) && $mahasiswa->kecamatan != '') {
									if ($alamat != '') {
										$alamat .= ', ';
									}
									$alamat .= 'Kec. ' . $mahasiswa->kecamatan;;
								}
								if (isset($mahasiswa->kode_pos) && $mahasiswa->kode_pos != '') {
									if ($alamat != '') {
										$alamat .= ', ';
									}
									$alamat .= $mahasiswa->kode_pos;;
								}
								?>
                <textarea class="form-control" id="address" rows="5"><?= $alamat ?></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="card-action">
          <button class="btn btn-success">Submit</button>
          <button class="btn btn-danger">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>
