
<?php
class LogoutController extends Controller
{
    public function index()
    {
        session_destroy();
        header('Location: ' . BASEURL . '/login');
        exit;
    }
}
