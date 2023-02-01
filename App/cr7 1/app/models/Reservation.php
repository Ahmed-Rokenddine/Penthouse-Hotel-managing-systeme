<?php

  class Reservation {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getRooms(){
      $this->db->query('SELECT * FROM rooms');

      $results = $this->db->resultSet();

      return $results;
    }
    public function getroomById($id){
      $this->db->query('SELECT * FROM rooms WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }
    
}