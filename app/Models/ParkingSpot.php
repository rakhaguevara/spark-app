<?php

/**
 * ParkingSpot Model
 * Handles parking location operations
 */
class ParkingSpot
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Get all parking spots
    public function getAll($filters = [])
    {
        $query = 'SELECT t.*, u.nama_pengguna as nama_pemilik,
                  (SELECT COUNT(*) FROM slot_parkir WHERE id_tempat = t.id_tempat AND status_slot = "available") as available_slots,
                  (SELECT AVG(rating) FROM ulasan_tempat WHERE id_tempat = t.id_tempat) as avg_rating,
                  (SELECT COUNT(*) FROM ulasan_tempat WHERE id_tempat = t.id_tempat) as total_reviews
                  FROM tempat_parkir t
                  LEFT JOIN data_pengguna u ON t.id_pemilik = u.id_pengguna
                  WHERE 1=1';

        // Add filters
        if (!empty($filters['search'])) {
            $query .= ' AND (t.nama_tempat LIKE :search OR t.alamat_tempat LIKE :search)';
        }

        $query .= ' ORDER BY t.created_at DESC';

        $this->db->query($query);

        if (!empty($filters['search'])) {
            $this->db->bind(':search', '%' . $filters['search'] . '%');
        }

        return $this->db->resultSet();
    }

    // Get parking spot by ID
    public function getById($id)
    {
        $this->db->query('SELECT t.*, u.nama_pengguna as nama_pemilik,
                         (SELECT COUNT(*) FROM slot_parkir WHERE id_tempat = t.id_tempat AND status_slot = "available") as available_slots,
                         (SELECT AVG(rating) FROM ulasan_tempat WHERE id_tempat = t.id_tempat) as avg_rating,
                         (SELECT COUNT(*) FROM ulasan_tempat WHERE id_tempat = t.id_tempat) as total_reviews
                         FROM tempat_parkir t
                         LEFT JOIN data_pengguna u ON t.id_pemilik = u.id_pengguna
                         WHERE t.id_tempat = :id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    // Search nearby parking spots
    public function searchNearby($lat, $lng, $radius = 5)
    {
        // Using Haversine formula for distance calculation
        $query = 'SELECT t.*, u.nama_pengguna as nama_pemilik,
                  (6371 * acos(cos(radians(:lat)) * cos(radians(latitude)) * 
                  cos(radians(longitude) - radians(:lng)) + sin(radians(:lat)) * 
                  sin(radians(latitude)))) AS distance,
                  (SELECT COUNT(*) FROM slot_parkir WHERE id_tempat = t.id_tempat AND status_slot = "available") as available_slots,
                  (SELECT AVG(rating) FROM ulasan_tempat WHERE id_tempat = t.id_tempat) as avg_rating
                  FROM tempat_parkir t
                  LEFT JOIN data_pengguna u ON t.id_pemilik = u.id_pengguna
                  HAVING distance < :radius
                  ORDER BY distance ASC';

        $this->db->query($query);
        $this->db->bind(':lat', $lat);
        $this->db->bind(':lng', $lng);
        $this->db->bind(':radius', $radius);

        return $this->db->resultSet();
    }

    // Add new parking spot (for owners)
    public function add($data)
    {
        $this->db->query('INSERT INTO tempat_parkir 
                         (id_pemilik, nama_tempat, alamat_tempat, latitude, longitude, 
                          total_spot, harga_per_jam, jam_buka, jam_tutup) 
                         VALUES (:pemilik, :nama, :alamat, :lat, :lng, :total, :harga, :buka, :tutup)');

        $this->db->bind(':pemilik', $data['id_pemilik']);
        $this->db->bind(':nama', $data['nama_tempat']);
        $this->db->bind(':alamat', $data['alamat_tempat']);
        $this->db->bind(':lat', $data['latitude']);
        $this->db->bind(':lng', $data['longitude']);
        $this->db->bind(':total', $data['total_spot']);
        $this->db->bind(':harga', $data['harga_per_jam']);
        $this->db->bind(':buka', $data['jam_buka']);
        $this->db->bind(':tutup', $data['jam_tutup']);

        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        }
        return false;
    }

    // Get available slots for a parking spot
    public function getAvailableSlots($tempatId)
    {
        $this->db->query('SELECT * FROM slot_parkir 
                         WHERE id_tempat = :id AND status_slot = "available"
                         ORDER BY nomor_slot ASC');
        $this->db->bind(':id', $tempatId);

        return $this->db->resultSet();
    }

    // Get reviews for parking spot
    public function getReviews($tempatId)
    {
        $this->db->query('SELECT u.*, p.nama_pengguna, p.email_pengguna
                         FROM ulasan_tempat u
                         LEFT JOIN data_pengguna p ON u.id_pengguna = p.id_pengguna
                         WHERE u.id_tempat = :id
                         ORDER BY u.created_at DESC');
        $this->db->bind(':id', $tempatId);

        return $this->db->resultSet();
    }
}
