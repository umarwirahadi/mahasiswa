<?php
/**
 * Base Controller
 */

class Controller {
    protected $db;
    
    public function __construct() {
        require_once APPPATH . 'config/Database.php';
        $this->db = Database::getInstance();
    }
    
    protected function view($viewFile, $data = []) {
        extract($data);
        require VIEWPATH . $viewFile . '.php';
    }
    
    protected function redirect($url) {
        header("Location: " . $url);
        exit;
    }
    
    protected function requireAuth() {
        if (!isset($_SESSION['student_id'])) {
            $this->redirect('/auth/login');
        }
    }
}
