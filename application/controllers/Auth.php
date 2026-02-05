<?php
/**
 * Auth Controller - Handles authentication
 */

require_once APPPATH . 'controllers/Controller.php';

class Auth extends Controller {
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $student_id = $_POST['student_id'] ?? '';
            $password = $_POST['password'] ?? '';
            
            // Demo authentication - in production, verify against database
            // Default credentials: student_id = "2024001", password = "password123"
            if ($student_id === '2024001' && $password === 'password123') {
                $_SESSION['student_id'] = $student_id;
                $_SESSION['student_name'] = 'John Doe';
                $this->redirect('/students/dashboard');
            } else {
                $data = [
                    'title' => 'Login',
                    'error' => 'Invalid student ID or password'
                ];
            }
        } else {
            $data = ['title' => 'Login'];
        }
        
        $this->view('layouts/header', $data);
        $this->view('auth/login', $data);
        $this->view('layouts/footer');
    }
    
    public function logout() {
        session_destroy();
        $this->redirect('/');
    }
}
