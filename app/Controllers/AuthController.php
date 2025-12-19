<?php

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    // HALAMAN LOGIN
    public function login()
    {
        // ⛔ Kalau sudah login, jangan boleh ke login lagi
        if (isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }

        require_once __DIR__ . '/../Views/auth/login.php';
    }

    // PROSES LOGIN
    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!$email || !$password) {
            $_SESSION['error'] = 'Email dan password wajib diisi';
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        $user = $this->userModel->findByEmail($email);

        if (!$user || !password_verify($password, $user->password_pengguna)) {
            $_SESSION['error'] = 'Email atau password salah';
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        // ✅ SET SESSION
        $_SESSION['user'] = [
            'id'    => $user->id_pengguna,
            'nama'  => $user->nama_pengguna,
            'email' => $user->email_pengguna,
            'role'  => $user->nama_role
        ];

        header('Location: ' . BASEURL . '/dashboard');
        exit;
    }

    // LOGOUT
    public function logout()
    {
        session_destroy();
        header('Location: ' . BASEURL . '/login');
        exit;
    }
}
