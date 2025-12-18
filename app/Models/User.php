<?php

/**
 * User Model
 * Handles all user-related database operations
 */
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Register new user
    public function register($data)
    {
        $this->db->query('INSERT INTO data_pengguna (role_pengguna, nama_pengguna, email_pengguna, password_pengguna, noHp_pengguna) 
                         VALUES (:role, :nama, :email, :password, :noHp)');

        $this->db->bind(':role', $data['role_pengguna']);
        $this->db->bind(':nama', $data['nama_pengguna']);
        $this->db->bind(':email', $data['email_pengguna']);
        $this->db->bind(':password', password_hash($data['password_pengguna'], PASSWORD_DEFAULT));
        $this->db->bind(':noHp', $data['noHp_pengguna']);

        return $this->db->execute();
    }

    // Find user by email
    public function findByEmail($email)
    {
        $this->db->query('SELECT u.*, r.nama_role 
                         FROM data_pengguna u 
                         LEFT JOIN role_pengguna r ON u.role_pengguna = r.id_role 
                         WHERE u.email_pengguna = :email');
        $this->db->bind(':email', $email);

        return $this->db->single();
    }

    // Find user by ID
    public function findById($id)
    {
        $this->db->query('SELECT u.*, r.nama_role 
                         FROM data_pengguna u 
                         LEFT JOIN role_pengguna r ON u.role_pengguna = r.id_role 
                         WHERE u.id_pengguna = :id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    // Verify password
    public function verifyPassword($password, $hash)
    {
        return password_verify($password, $hash);
    }

    // Update user profile
    public function updateProfile($id, $data)
    {
        $this->db->query('UPDATE data_pengguna 
                         SET nama_pengguna = :nama, 
                             noHp_pengguna = :noHp 
                         WHERE id_pengguna = :id');

        $this->db->bind(':id', $id);
        $this->db->bind(':nama', $data['nama_pengguna']);
        $this->db->bind(':noHp', $data['noHp_pengguna']);

        return $this->db->execute();
    }

    // Check if email exists
    public function emailExists($email)
    {
        $this->db->query('SELECT id_pengguna FROM data_pengguna WHERE email_pengguna = :email');
        $this->db->bind(':email', $email);
        $this->db->single();

        return $this->db->rowCount() > 0;
    }
}
