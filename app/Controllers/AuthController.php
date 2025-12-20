<?php

class AuthController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function login()
    {
        if (isset($_SESSION['user'])) {
            $this->redirect('/dashboard');
        }

        $this->view('auth/login', [], false); // ❌ TANPA layout
    }


    public function authenticate()
    {
        session_start();

        $email = $_POST['email'];
        $password = $_POST['password'];

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if (!$user) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        // MODE BELAJAR (tanpa hash)
        if ($password !== $user['password_pengguna']) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }

        // ⬇️ INI YANG PALING PENTING
        $_SESSION['user'] = [
            'id_pengguna'    => $user['id_pengguna'],
            'nama_pengguna'  => $user['nama_pengguna'],
            'email_pengguna' => $user['email_pengguna'],
            'nama_role'      => $user['nama_role']
        ];

        header('Location: ' . BASEURL . '/dashboard');
        exit;
    }


    public function register()
    {
        if (isset($_SESSION['user'])) {
            $this->redirect('/dashboard');
        }

        $this->view('auth/register', [], false); // ❌ TANPA layout
    }
    public function logout()
    {
        session_destroy();
        $this->redirect('/home');
    }


    public function registerProcess()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/register');
        }

        $username = trim($_POST['username'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirm  = $_POST['confirm_password'] ?? '';
        $phone    = trim($_POST['phone'] ?? '');

        // VALIDASI
        if (!$username || !$email || !$password || !$confirm || !$phone) {
            $_SESSION['error'] = 'Semua field wajib diisi';
            $this->redirect('/register');
        }

        if ($password !== $confirm) {
            $_SESSION['error'] = 'Password dan konfirmasi tidak sama';
            $this->redirect('/register');
        }

        // CEK EMAIL SUDAH ADA
        if ($this->userModel->findByEmail($email)) {
            $_SESSION['error'] = 'Email sudah terdaftar';
            $this->redirect('/register');
        }

        // ===============================
        // SIMPAN USER BARU KE DATABASE
        // ===============================
        $this->userModel->create([
            'nama_pengguna'  => $username,
            'email_pengguna' => $email,
            'password'       => $password,   // MODE BELAJAR (belum hash)
            'phone'          => $phone,
            'role_pengguna'  => 1 // default USER
        ]);

        // ===============================
        // AMBIL DATA USER BARU
        // ===============================
        $user = $this->userModel->findByEmail($email);

        // ===============================
        // 🔑 BUAT SESSION (WAJIB)
        // ===============================
        $_SESSION['user'] = [
            'id_pengguna'    => $user['id_pengguna'],
            'nama_pengguna'  => $user['nama_pengguna'],
            'email_pengguna' => $user['email_pengguna'],
            'nama_role'      => $user['nama_role']
        ];

        // ===============================
        // REDIRECT KE DASHBOARD
        // ===============================
        $this->redirect('/dashboard');
    }
}
