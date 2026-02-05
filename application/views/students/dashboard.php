<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">
            <i class="bi bi-speedometer2"></i> Student Dashboard
        </h2>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-1">Current GPA</p>
                    <h3 class="mb-0"><?php echo $student['gpa']; ?></h3>
                </div>
                <i class="bi bi-graph-up" style="font-size: 2.5rem; opacity: 0.5;"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-1">Semester</p>
                    <h3 class="mb-0"><?php echo $student['semester']; ?></h3>
                </div>
                <i class="bi bi-calendar-check" style="font-size: 2.5rem; opacity: 0.5;"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-1">Active Courses</p>
                    <h3 class="mb-0"><?php echo count($courses); ?></h3>
                </div>
                <i class="bi bi-book" style="font-size: 2.5rem; opacity: 0.5;"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-1">Credits</p>
                    <h3 class="mb-0"><?php 
                        $total_credits = array_sum(array_column($courses, 'credits'));
                        echo $total_credits; 
                    ?></h3>
                </div>
                <i class="bi bi-award" style="font-size: 2.5rem; opacity: 0.5;"></i>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-book"></i> Current Courses</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th>Credits</th>
                                <th>Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($courses as $course): ?>
                            <tr>
                                <td><strong><?php echo $course['code']; ?></strong></td>
                                <td><?php echo $course['name']; ?></td>
                                <td><?php echo $course['credits']; ?></td>
                                <td>
                                    <span class="badge bg-success"><?php echo $course['grade']; ?></span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-3">
                    <a href="/students/courses" class="btn btn-primary">
                        <i class="bi bi-eye"></i> View All Courses
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-person-circle"></i> Student Info</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="text-muted small">Student ID</label>
                    <p class="mb-0"><strong><?php echo $student['id']; ?></strong></p>
                </div>
                <div class="mb-3">
                    <label class="text-muted small">Name</label>
                    <p class="mb-0"><strong><?php echo $student['name']; ?></strong></p>
                </div>
                <div class="mb-3">
                    <label class="text-muted small">Email</label>
                    <p class="mb-0"><?php echo $student['email']; ?></p>
                </div>
                <div class="mb-3">
                    <label class="text-muted small">Major</label>
                    <p class="mb-0"><?php echo $student['major']; ?></p>
                </div>
                <a href="/students/profile" class="btn btn-outline-primary w-100">
                    <i class="bi bi-pencil"></i> Edit Profile
                </a>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-bell"></i> Quick Actions</h5>
            </div>
            <div class="card-body">
                <a href="/students/grades" class="btn btn-outline-secondary w-100 mb-2">
                    <i class="bi bi-graph-up"></i> View Grades
                </a>
                <a href="/students/courses" class="btn btn-outline-secondary w-100">
                    <i class="bi bi-book"></i> Course Schedule
                </a>
            </div>
        </div>
    </div>
</div>
