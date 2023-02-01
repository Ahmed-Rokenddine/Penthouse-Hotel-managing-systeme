<?php
  class Admin {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
    // Login admin
    public function login($email, $password){
      $this->db->query('SELECT * FROM admins WHERE email = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      $hashed_password = $row->password;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }

    // Find admin by email
    public function findadminByEmail($email){
      $this->db->query('SELECT * FROM admins WHERE email = :email');
      // Bind value
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }
  }