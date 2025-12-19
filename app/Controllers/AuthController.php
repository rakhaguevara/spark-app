<?php

class AuthController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    // HALAMAN LOGIN
    public function login()
    {
        // ⛔ Kalau sudah login, jangan boleh ke login lagi
        if (isset($_SESSION['user'])) {
            $this->redirect('/dashboard');
        }

        require_once __DIR__ . '/../Views/auth/login.php';
    }

    // PROSES LOGIN
    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/login');
        }

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!$email || !$password) {
            $_SESSION['error'] = 'Email dan password wajib diisi';
            $this->redirect('/login');
        }

        $user = $this->userModel->findByEmail($email);

        if (!$user || !password_verify($password, $user->password_pengguna)) {
            $_SESSION['error'] = 'Email atau password salah';
            $this->redirect('/login');
        }

        // ✅ SET SESSION
        $_SESSION['user'] = [
            'id'    => $user->id_pengguna,
            'nama'  => $user->nama_pengguna,
            'email' => $user->email_pengguna,
            'role'  => $user->nama_role
        ];

        $this->redirect('/dashboard');
    }

    // LOGOUT
    public function logout()
    {
        session_destroy();
        $this->redirect('/login');
    }
}
