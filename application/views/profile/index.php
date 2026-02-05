<div class="page-inner">
  <div class="row">
    <div class="col-md-4">
      <div class="card card-profile">
        <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
          <div class="profile-picture">
            <div class="avatar avatar-xl">
              <img src="<?= base_url('assets/img/profile.jpg') ?>" alt="..." class="avatar-img rounded-circle" />
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="user-profile text-center">
            <div class="name">Umar Wirahadi</div>
            <div class="job">07302156</div>
            <div class="job">MIF-B3/07</div>
            <div class="desc">D3 - Manajemen Informatika </div>
           
          </div>
        </div>
        <div class="card-footer">
          <div class="row user-stats text-center">
            <div class="col">
              <div class="number">125</div>
              <div class="title">Post</div>
            </div>
            <div class="col">
              <div class="number">25K</div>
              <div class="title">Followers</div>
            </div>
            <div class="col">
              <div class="number">134</div>
              <div class="title">Following</div>
            </div>
          </div>
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
                <input type="email" class="form-control" id="email2" placeholder="Enter Email" />
                <small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone
                  else.</small>
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
                <textarea class="form-control" id="address" rows="5"></textarea>
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