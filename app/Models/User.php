<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // CARI USER BERDASARKAN EMAIL
    public function findByEmail($email)
    {
        $this->db->query("
            SELECT dp.*, rp.nama_role
            FROM data_pengguna dp
            JOIN role_pengguna rp ON dp.role_pengguna = rp.id_role
            WHERE dp.email_pengguna = :email
        ");

        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    // REGISTER USER (MODE BELAJAR)
    public function create($data)
    {
        $this->db->query("
            INSERT INTO data_pengguna 
            (role_pengguna, nama_pengguna, email_pengguna, password_pengguna, noHp_pengguna)
            VALUES 
            (:role, :nama, :email, :password, :phone)
        ");

        // 🔑 KONSISTEN DENGAN CONTROLLER
        $this->db->bind(':role', $data['role_pengguna']);
        $this->db->bind(':nama', $data['nama_pengguna']);
        $this->db->bind(':email', $data['email_pengguna']);
        $this->db->bind(':password', $data['password']); // tanpa hash (mode belajar)
        $this->db->bind(':phone', $data['phone']);

        return $this->db->execute();
    }
}
