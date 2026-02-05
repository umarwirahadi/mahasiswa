<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">
            <i class="bi bi-book"></i> My Courses
        </h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-calendar-check"></i> Current Semester Courses</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th>Credits</th>
                                <th>Instructor</th>
                                <th>Schedule</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($courses as $course): ?>
                            <tr>
                                <td><strong><?php echo $course['code']; ?></strong></td>
                                <td><?php echo $course['name']; ?></td>
                                <td><?php echo $course['credits']; ?></td>
                                <td><?php echo $course['instructor']; ?></td>
                                <td><small><?php echo $course['schedule']; ?></small></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" disabled>
                                        <i class="bi bi-eye"></i> Details
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="alert alert-info mt-3" role="alert">
                    <i class="bi bi-info-circle"></i> 
                    <strong>Total Credits:</strong> <?php 
                        $total = array_sum(array_column($courses, 'credits'));
                        echo $total; 
                    ?> credits
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-calendar3"></i> Weekly Schedule</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>10:00-11:30</strong></td>
                                <td class="table-primary">CS301<br><small>Database Systems</small></td>
                                <td class="table-success">CS304<br><small>Web Development</small></td>
                                <td class="table-primary">CS301<br><small>Database Systems</small></td>
                                <td class="table-success">CS304<br><small>Web Development</small></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td><strong>13:00-14:30</strong></td>
                                <td>-</td>
                                <td class="table-warning">CS302<br><small>Software Engineering</small></td>
                                <td>-</td>
                                <td class="table-warning">CS302<br><small>Software Engineering</small></td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td><strong>14:00-15:30</strong></td>
                                <td class="table-info">CS303<br><small>Computer Networks</small></td>
                                <td>-</td>
                                <td class="table-info">CS303<br><small>Computer Networks</small></td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-3">
    <a href="/students/dashboard" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Back to Dashboard
    </a>
</div>
