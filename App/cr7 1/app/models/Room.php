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
      $this->db->query('INSERT INTO rooms (title, Price  , picture, type , Occupied , Suitetype) VALUES(:title, :Price , :picture, :type , :Occupied , :Suitetype)');
      // Bind values
      
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':Price', $data['Price']);
      $this->db->bind(':picture', $data['picture']);
      $this->db->bind(':type', $data['type']);
      $this->db->bind(':Occupied', $data['Occupied']);
      if($data['type']=='Suite'){$this->db->bind(':Suitetype', $data['Suitetype']);}
      else {$this->db->bind(':Suitetype', '');}
      
      

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
      
      $this->db->query('UPDATE rooms SET title = :title, Price = :Price, type = :type, Occupied = :Occupied , Suitetype = :Suitetype, picture = :picture  WHERE id = :id');
      // Bind values    
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':Price', $data['Price']);
      $this->db->bind(':type', $data['type']);
      $this->db->bind(':Occupied', $data['Occupied']);
      $this->db->bind(':Suitetype', $data['Suitetype']);
      if($data['picture']!=''){$this->db->bind(':picture', $data['picture']);}
      else{$this->db->bind(':picture', $data['picture_e']);}

      

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
    public function addReservation($data){
      $this->db->query('INSERT INTO reservations ( roomdid  , userid, arrival , departure ,Total) VALUES( :roomdid , :userid, :arrival , :departure, :total)');
      $this->db->bind(':userid', $data['userid']);
      // Bind values
      $this->db->bind(':roomdid', $data['roomdid']);
      $this->db->bind(':arrival', $data['arrival']);
      $this->db->bind(':departure', $data['departure']);
      $this->db->bind(':total', $data['total']);


      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    /*public function checkreservations($arr,$dep){

      $this->db->query('SELECT distinct r.id
      FROM rooms  as r 
      INNER JOIN reservations as b 
      ON r.id = b.roomdid
      WHERE ('$arr' NOT BETWEEN arrival AND departure) 
          AND ('$dep' NOT BETWEEN arrival AND departure)
      ')
    }*/
   
public function checkreservations($data){

  
  $this->db->query("SELECT r.* FROM rooms r LEFT JOIN reservations res ON r.id = res.roomdid AND ((:arr BETWEEN res.arrival AND res.departure OR :dep BETWEEN res.arrival AND res.departure) OR (res.arrival BETWEEN :arr AND :dep OR res.departure BETWEEN :arr AND :dep)) WHERE res.roomdid IS NULL;");
  $this->db->bind(":arr", $data['arrival']);
  $this->db->bind(":dep", $data['departure']);
 
  $catches = $this->db->resultSet();
  
  if($this->db->execute()){
    return $catches;
  } else {
    return false;
  }
  
 /* ->select('*')
  ->from('rooms r')
  //join with ones that are not available in the given dates
  $this->db->query('SELECT * FROM ROOMS JOIN RESERVATIONS WHERE ROOMS.id = RESERVATIONS.roomdid and (RESERVATIONS.departure <= $date_in and RESERVATIONS.departure > $date_in) and (RESERVATIONS.arrival < $date_out and RESERVATIONS.departure > $date_out LEFT WHERE RESERVATIONS   ')
  ->join('reservations rs', "r.id = rs.roomdid and (rs.arrival <= '$date_in' and rs.departure > '$date_in') and (rs.arrival < '$date_out' and rs.departure > '$date_out'  ", 'LEFT')
  //then filter those unavailable rooms
  ->where('rs.roomdid', NULL);*/
 
}
public function getReservations(){
  $this->db->query('SELECT *,
                             reservations.id as resID,
                             rooms.id as roomID,
                             users.id as userID
                             FROM reservations
                             INNER JOIN rooms
                             ON reservations.roomdid = rooms.id
                             INNER JOIN users
                             ON reservations.userid = users.id');

  $files = $this->db->resultSet();

  return $files;
}

public function getReservationsbyuser(){
  $this->db->query('SELECT *,
                             reservations.id as resID,
                             rooms.id as roomID
                             FROM reservations
                             INNER JOIN rooms
                             ON reservations.roomdid = rooms.id
                             WHERE reservations.userid = :iid');
                             
 $this->db->bind(':iid', $_SESSION['user_id']);
  $stonks = $this->db->resultSet();

  return $stonks;
}
public function getReservationscount(){
  $this->db->query("SELECT COUNT(*) as total FROM reservations WHERE userid = :iid");
                             
 $this->db->bind(':iid', $_SESSION['user_id']);

 $row = $this->db->single();

 return $row;
}

public function getreservationById($id){
  $this->db->query('SELECT * FROM reservations WHERE id = :id');
  $this->db->bind(':id', $id);

  $row = $this->db->single();

  return $row;
}

public function deletereservation($id){
  $this->db->query('DELETE FROM reservations WHERE id = :id');
  // Bind values
  $this->db->bind(':id', $id);

  // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}
public function updateReservation($data){
  $this->db->query("SELECT * FROM reservations WHERE roomdid = :roomdid  AND (  ( :arr BETWEEN arrival AND departure ) OR ( :dep BETWEEN arrival AND departure ) ) AND id != :id");  
  $this->db->bind(':id', $data['id']);
  $this->db->bind(':arr', $data['arrival']);
  $this->db->bind(':dep', $data['departure']);
  $this->db->bind(':roomdid', $data['roomdid']);
  $row = $this->db->single();
  if(empty($row))   {
  $this->db->query('UPDATE reservations SET arrival = :arrival, departure = :departure  WHERE id = :id');
  // Bind values    
  $this->db->bind(':id', $data['id']);
  $this->db->bind(':arrival', $data['arrival']);
  $this->db->bind(':departure', $data['departure']);
  
  // Execute
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }}
}

public function addGuests($data2){
  $this->db->query(' SELECT id FROM reservations WHERE id = (SELECT MAX(id) FROM reservations);');
  $row = $this->db->single();
  for ($i = 0; $i < $data2['num']; $i++) {
  
          
  $this->db->query('INSERT INTO guests ( name  , bday , reservationid) VALUES( :name , :bday , :iid)');
  $this->db->bind(':name', $data2['name'][$i]);
  $this->db->bind(':bday', $data2['age'][$i]);
  $this->db->bind(':iid', $row->id); 
  if($data2['name'][$i] != ''){$this->db->execute();}
  }
  

  // Execute
  
    return true;
  
}
public function getguestsByreservation(){
  $this->db->query('SELECT * FROM guests ');
  

  $row = $this->db->resultSet();

  return $row;
}
  }