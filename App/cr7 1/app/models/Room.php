<?php
  class Room {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getRooms(){
      $this->db->query('SELECT * FROM rooms');

      $results = $this->db->resultSet();

      return $results;
    }
    public function addRoom($data){
      $this->db->query('INSERT INTO rooms (title, Price  , picture, type , Suitetype) VALUES(:title, :Price , :picture, :type , :Suitetype)');
      // Bind values
      
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':Price', $data['Price']);
      $this->db->bind(':picture', $data['picture']);
      $this->db->bind(':type', $data['type']);
      $this->db->bind(':Suitetype', $data['Suitetype']);
      

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    public function getroomById($id){
      $this->db->query('SELECT * FROM rooms WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }



    public function updateRoom($data){
      $this->db->query('UPDATE rooms SET title = :title, Price = :Price, type = :type, Suitetype = :Suitetype, picture = :picture  WHERE id = :id');
      // Bind values    
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':Price', $data['Price']);
      $this->db->bind(':type', $data['type']);
      $this->db->bind(':Suitetype', $data['Suitetype']);
      $this->db->bind(':picture', $data['picture']);

      

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
       
    public function deleteroom($id){
      $this->db->query('DELETE FROM rooms WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


  }