-- Student Portal Database Schema
-- Database for Higher Education Student Portal

CREATE DATABASE IF NOT EXISTS mahasiswa_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE mahasiswa_db;

-- Students table
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(20) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    major VARCHAR(100),
    semester INT,
    enrollment_year YEAR,
    gpa DECIMAL(3,2) DEFAULT 0.00,
    status ENUM('active', 'inactive', 'graduated', 'suspended') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Courses table
CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(20) UNIQUE NOT NULL,
    course_name VARCHAR(200) NOT NULL,
    credits INT NOT NULL,
    semester INT,
    instructor VARCHAR(100),
    schedule VARCHAR(100),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Enrollments table (student-course relationship)
CREATE TABLE IF NOT EXISTS enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    enrollment_date DATE NOT NULL,
    status ENUM('enrolled', 'completed', 'dropped') DEFAULT 'enrolled',
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    UNIQUE KEY unique_enrollment (student_id, course_id)
) ENGINE=InnoDB;

-- Grades table
CREATE TABLE IF NOT EXISTS grades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    enrollment_id INT NOT NULL,
    grade VARCHAR(5),
    grade_points DECIMAL(3,2),
    semester VARCHAR(20),
    academic_year VARCHAR(10),
    graded_date DATE,
    FOREIGN KEY (enrollment_id) REFERENCES enrollments(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Insert demo student
INSERT INTO students (student_id, name, email, password, phone, address, major, semester, enrollment_year, gpa, status)
VALUES 
('2024001', 'John Doe', 'john.doe@university.edu', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+1234567890', '123 University Ave, City, State 12345', 'Computer Science', 6, 2021, 3.75, 'active');
-- Password is: password123

-- Insert demo courses
INSERT INTO courses (course_code, course_name, credits, semester, instructor, schedule, description)
VALUES 
('CS301', 'Database Systems', 3, 6, 'Dr. Smith', 'Mon/Wed 10:00-11:30', 'Introduction to database management systems and SQL'),
('CS302', 'Software Engineering', 3, 6, 'Dr. Johnson', 'Tue/Thu 13:00-14:30', 'Software development methodologies and best practices'),
('CS303', 'Computer Networks', 3, 6, 'Dr. Williams', 'Mon/Wed 14:00-15:30', 'Network protocols and architectures'),
('CS304', 'Web Development', 3, 6, 'Dr. Brown', 'Tue/Thu 10:00-11:30', 'Modern web development technologies and frameworks');

-- Insert demo enrollments
INSERT INTO enrollments (student_id, course_id, enrollment_date, status)
VALUES 
(1, 1, '2023-09-01', 'enrolled'),
(1, 2, '2023-09-01', 'enrolled'),
(1, 3, '2023-09-01', 'enrolled'),
(1, 4, '2023-09-01', 'enrolled');

-- Insert demo grades
INSERT INTO grades (enrollment_id, grade, grade_points, semester, academic_year, graded_date)
VALUES 
(1, 'A', 4.0, 'Fall 2023', '2023-2024', '2023-12-15'),
(2, 'A-', 3.7, 'Fall 2023', '2023-2024', '2023-12-15'),
(3, 'B+', 3.3, 'Fall 2023', '2023-2024', '2023-12-15'),
(4, 'A', 4.0, 'Fall 2023', '2023-2024', '2023-12-15');
