<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">
            <i class="bi bi-graph-up"></i> My Grades
        </h2>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-trophy"></i> Academic Performance Summary</h5>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-4">
                        <div class="p-3">
                            <h6 class="text-muted">Cumulative GPA</h6>
                            <h2 class="text-primary"><?php echo $cumulative_gpa; ?></h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3">
                            <h6 class="text-muted">Total Credits</h6>
                            <h2 class="text-success">12</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3">
                            <h6 class="text-muted">Academic Status</h6>
                            <h2 class="text-info">Good Standing</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($semesters as $semester): ?>
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-calendar-event"></i> <?php echo $semester['name']; ?>
                    </h5>
                    <span class="badge bg-primary">GPA: <?php echo $semester['gpa']; ?></span>
                </div>
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
                                <th>Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($semester['courses'] as $course): ?>
                            <tr>
                                <td><strong><?php echo $course['code']; ?></strong></td>
                                <td><?php echo $course['name']; ?></td>
                                <td><?php echo $course['credits']; ?></td>
                                <td>
                                    <?php
                                    $gradeClass = 'grade-a';
                                    if (strpos($course['grade'], 'B') !== false) {
                                        $gradeClass = 'grade-b';
                                    } elseif (strpos($course['grade'], 'C') !== false) {
                                        $gradeClass = 'grade-c';
                                    }
                                    ?>
                                    <span class="<?php echo $gradeClass; ?>"><?php echo $course['grade']; ?></span>
                                </td>
                                <td><?php echo number_format($course['points'], 1); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr class="table-light">
                                <td colspan="2"><strong>Semester GPA</strong></td>
                                <td><strong><?php 
                                    $totalCredits = array_sum(array_column($semester['courses'], 'credits'));
                                    echo $totalCredits; 
                                ?></strong></td>
                                <td colspan="2"><strong class="text-primary"><?php echo $semester['gpa']; ?></strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-file-earmark-text"></i> Grade Scale Reference</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Letter Grade</th>
                                <th>Grade Points</th>
                                <th>Percentage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="grade-a">A</span></td>
                                <td>4.0</td>
                                <td>90-100%</td>
                            </tr>
                            <tr>
                                <td><span class="grade-a">A-</span></td>
                                <td>3.7</td>
                                <td>85-89%</td>
                            </tr>
                            <tr>
                                <td><span class="grade-b">B+</span></td>
                                <td>3.3</td>
                                <td>80-84%</td>
                            </tr>
                            <tr>
                                <td><span class="grade-b">B</span></td>
                                <td>3.0</td>
                                <td>75-79%</td>
                            </tr>
                            <tr>
                                <td><span class="grade-c">C+</span></td>
                                <td>2.3</td>
                                <td>70-74%</td>
                            </tr>
                            <tr>
                                <td><span class="grade-c">C</span></td>
                                <td>2.0</td>
                                <td>65-69%</td>
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
    <button class="btn btn-primary" disabled>
        <i class="bi bi-printer"></i> Print Transcript (Demo Mode)
    </button>
</div>
