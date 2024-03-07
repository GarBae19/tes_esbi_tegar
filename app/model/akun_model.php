<?php
class akun_model
{
    private $table = 'akun';
    private $db;
    function __construct()
    {
        $this->db = new Database;
    }
    function cekuser($POST)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email=:email');
        $this->db->bind('email', $POST['email']);
        return $this->db->single();
    }
    function tambahUser($data)
    {
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $created_at = date("Y-m-d H:i:s");
        $query = "INSERT INTO $this->table VALUES ('',:nama,:email,:password,:created_at,:updated_at)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $password);
        $this->db->bind('created_at', $created_at);
        $this->db->bind('updated_at', $created_at);

        $this->db->execute();
        return $this->db->rowcount();
    }
    function getUser()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultset();
    }
    function hapusUser($POST)
    {
        $query = "DELETE FROM $this->table WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $POST['id']);

        $this->db->execute();
        return $this->db->rowcount();
    }
    function updateUser($data)
    {

        $updated_at = date("Y-m-d H:i:s");
        $query = "UPDATE $this->table SET nama = :nama, email = :email, updated_at = :updated_at WHERE id=:id;";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('updated_at', $updated_at);

        $this->db->execute();
        return $this->db->rowcount();
    }
}
