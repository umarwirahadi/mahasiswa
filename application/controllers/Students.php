<?php
/**
 * Students Controller - Main student portal features
 */

require_once APPPATH . 'controllers/Controller.php';

class Students extends Controller {
    
    public function dashboard() {
        $this->requireAuth();
        
        // Demo data - in production, fetch from database
        $data = [
            'title' => 'Student Dashboard',
            'student' => [
                'id' => $_SESSION['student_id'],
                'name' => $_SESSION['student_name'],
                'email' => 'john.doe@university.edu',
                'major' => 'Computer Science',
                'semester' => '6',
                'gpa' => '3.75'
            ],
            'courses' => [
                ['code' => 'CS301', 'name' => 'Database Systems', 'credits' => 3, 'grade' => 'A'],
                ['code' => 'CS302', 'name' => 'Software Engineering', 'credits' => 3, 'grade' => 'A-'],
                ['code' => 'CS303', 'name' => 'Computer Networks', 'credits' => 3, 'grade' => 'B+'],
                ['code' => 'CS304', 'name' => 'Web Development', 'credits' => 3, 'grade' => 'A']
            ]
        ];
        
        $this->view('layouts/header', $data);
        $this->view('students/dashboard', $data);
        $this->view('layouts/footer');
    }
    
    public function profile() {
        $this->requireAuth();
        
        $data = [
            'title' => 'My Profile',
            'student' => [
                'id' => $_SESSION['student_id'],
                'name' => $_SESSION['student_name'],
                'email' => 'john.doe@university.edu',
                'phone' => '+1234567890',
                'address' => '123 University Ave, City, State 12345',
                'major' => 'Computer Science',
                'semester' => '6',
                'enrollment_year' => '2021'
            ]
        ];
        
        $this->view('layouts/header', $data);
        $this->view('students/profile', $data);
        $this->view('layouts/footer');
    }
    
    public function courses() {
        $this->requireAuth();
        
        $data = [
            'title' => 'My Courses',
            'courses' => [
                ['code' => 'CS301', 'name' => 'Database Systems', 'credits' => 3, 'instructor' => 'Dr. Smith', 'schedule' => 'Mon/Wed 10:00-11:30'],
                ['code' => 'CS302', 'name' => 'Software Engineering', 'credits' => 3, 'instructor' => 'Dr. Johnson', 'schedule' => 'Tue/Thu 13:00-14:30'],
                ['code' => 'CS303', 'name' => 'Computer Networks', 'credits' => 3, 'instructor' => 'Dr. Williams', 'schedule' => 'Mon/Wed 14:00-15:30'],
                ['code' => 'CS304', 'name' => 'Web Development', 'credits' => 3, 'instructor' => 'Dr. Brown', 'schedule' => 'Tue/Thu 10:00-11:30']
            ]
        ];
        
        $this->view('layouts/header', $data);
        $this->view('students/courses', $data);
        $this->view('layouts/footer');
    }
    
    public function grades() {
        $this->requireAuth();
        
        $data = [
            'title' => 'My Grades',
            'semesters' => [
                [
                    'name' => 'Fall 2023',
                    'courses' => [
                        ['code' => 'CS301', 'name' => 'Database Systems', 'credits' => 3, 'grade' => 'A', 'points' => 4.0],
                        ['code' => 'CS302', 'name' => 'Software Engineering', 'credits' => 3, 'grade' => 'A-', 'points' => 3.7],
                        ['code' => 'CS303', 'name' => 'Computer Networks', 'credits' => 3, 'grade' => 'B+', 'points' => 3.3],
                        ['code' => 'CS304', 'name' => 'Web Development', 'credits' => 3, 'grade' => 'A', 'points' => 4.0]
                    ],
                    'gpa' => '3.75'
                ]
            ],
            'cumulative_gpa' => '3.75'
        ];
        
        $this->view('layouts/header', $data);
        $this->view('students/grades', $data);
        $this->view('layouts/footer');
    }
}
