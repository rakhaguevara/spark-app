<?php
class DashboardController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        $this->view('dashboard/index', [], 'dashboard');
    }
}
