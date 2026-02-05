<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">
            <i class="bi bi-person-circle"></i> My Profile
        </h2>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-person-lines-fill"></i> Personal Information</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="text-muted small">Student ID</label>
                        <p class="mb-0"><strong><?php echo $student['id']; ?></strong></p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Full Name</label>
                        <p class="mb-0"><strong><?php echo $student['name']; ?></strong></p>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="text-muted small">Email Address</label>
                        <p class="mb-0"><?php echo $student['email']; ?></p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Phone Number</label>
                        <p class="mb-0"><?php echo $student['phone']; ?></p>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="text-muted small">Address</label>
                        <p class="mb-0"><?php echo $student['address']; ?></p>
                    </div>
                </div>
                
                <hr>
                
                <h6 class="mb-3">Academic Information</h6>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="text-muted small">Major</label>
                        <p class="mb-0"><strong><?php echo $student['major']; ?></strong></p>
                    </div>
                    <div class="col-md-4">
                        <label class="text-muted small">Current Semester</label>
                        <p class="mb-0"><strong><?php echo $student['semester']; ?></strong></p>
                    </div>
                    <div class="col-md-4">
                        <label class="text-muted small">Enrollment Year</label>
                        <p class="mb-0"><strong><?php echo $student['enrollment_year']; ?></strong></p>
                    </div>
                </div>
                
                <div class="mt-4">
                    <button class="btn btn-primary" disabled>
                        <i class="bi bi-pencil"></i> Edit Profile (Demo Mode)
                    </button>
                    <button class="btn btn-outline-secondary" disabled>
                        <i class="bi bi-key"></i> Change Password (Demo Mode)
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-image"></i> Profile Picture</h5>
            </div>
            <div class="card-body text-center">
                <div class="mb-3">
                    <i class="bi bi-person-circle" style="font-size: 8rem; color: var(--secondary-color);"></i>
                </div>
                <button class="btn btn-outline-primary" disabled>
                    <i class="bi bi-upload"></i> Upload Photo (Demo Mode)
                </button>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-info-circle"></i> Account Status</h5>
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <span class="badge bg-success">Active</span>
                </div>
                <p class="text-muted small mb-0">Last login: <?php echo date('M d, Y H:i'); ?></p>
            </div>
        </div>
    </div>
</div>

<div class="mt-3">
    <a href="/students/dashboard" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back to Dashboard
    </a>
</div>
