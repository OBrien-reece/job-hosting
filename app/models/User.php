<?php

class User {

    public function __construct() {

        $this->db = new Database();
    }

    public function register($data) {

        $this->db->query("INSERT INTO users (first_name, last_name, username, email, password)
        VALUES(:first_name, :last_name, :username, :email, :password)");
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        return $this->db->execute() ? true : false;
    }

    public function findUserByEmail($email) {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        return $this->db->rowCount() > 0 ? true : false;
    }

    public function login($password, $email) {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        $hashed_password = $row->password;

        return password_verify($password, $hashed_password) ? $row : false;
    }
}