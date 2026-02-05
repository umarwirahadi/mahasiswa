<?php
/**
 * Home Controller
 */

require_once APPPATH . 'controllers/Controller.php';

class Home extends Controller {
    
    public function index() {
        // If logged in, redirect to dashboard
        if (isset($_SESSION['student_id'])) {
            $this->redirect('/students/dashboard');
        }
        
        $data = [
            'title' => 'Welcome to Student Portal'
        ];
        
        $this->view('layouts/header', $data);
        $this->view('home', $data);
        $this->view('layouts/footer');
    }
}
