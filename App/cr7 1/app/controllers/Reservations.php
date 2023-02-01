<?php
   class Reservations extends Controller {
    public function __construct(){
        if(!userisLoggedIn()){
          redirect('users/login');
        }
  
        $this->roomModel = $this->model('Room');
      }
  
      public function index(){
        // Get Rooms
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          
          // initiate data
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);  
          $data = [
            'arrival' => trim($_POST['arrival']),
            'departure' => trim($_POST['departure'])
          ];
          if($this->roomModel->checkreservations($data)){
            $rooms = $this->roomModel->checkreservations($data);
            

      $data = [
          'rooms' => $rooms
         ];
            
                 $this->view('reservations/index', $data);
          } else {
            die('Something went wrong');
          }
      
      }
      else  

      $rooms = $this->roomModel->getRooms();

      $data = [
        'rooms' => $rooms
      ];
      

      $this->view('reservations/index',$data);  
      }
      public function add($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){


          $data2 = [
            'num' =>$_POST['guestnum'],
            'name' => $_POST['gname'],
            'age' => $_POST['g-age']
            
            
          ];
          // initiate data
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          
           
         
          $data = [
            'roomdid' => $id,
            'userid' => $_SESSION['user_id'],
            'arrival' => trim($_POST['arrival']),
            'departure' => trim($_POST['departure']),
            'total' =>trim($_POST['total'])
            
          ];
          
          
          if($this->roomModel->addReservation($data) ){
            
            if($this->roomModel->addGuests($data2)){
            $_SESSION['message'] = 'Reservation Succesfully ADDED';
            redirect('reservations');
            }
          
          redirect('reservations');  
          } else {
            die('Something went wrong');
          }
                
        
        
      }
      else{
        
      
        
          // Get existing post from model
          $room = $this->roomModel->getroomById($id);
          $discount = $this->roomModel->getReservationscount();
          $data = [
            'id' => $id,
            'title' => $room->title,
            'Price' => $room->Price,
            'type' => $room->type,
            'Suitetype' => $room->Suitetype,
            'picture' => $room->picture,
            'discount' => $discount->total
          ];
          
          $this->view('reservations/add', $data);
        
      }
     
    }
    public function search(){
      $reservations = $this->roomModel->getReservationsbyuser();
      $guests = $this->roomModel->getguestsByreservation();

      $data = [
        
        'reservations' => $reservations,
        'guests' => $guests
      ];
      
      
      $this->view('reservations/search', $data);
      
    }
    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){


        
        // initiate data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $reservation = $this->roomModel->getreservationById($id);
        
        
        
          // update data
          
            $data = [
              'id' => $id,
              'roomdid' => $reservation -> roomdid,
              'arrival' => trim($_POST['arrival']),
              'departure' => trim($_POST['departure']),
              'arrival_err' => '',
              'departure_err' => ''
              
            ];
          
     
        
        
        
        
        
        
       

        // Validate data
        if(empty($data['arrival'])){
          $data['arrival_err'] = 'Please enter Arrival';
        }
        if(empty($data['departure'])){
          $data['departure_err'] = 'Please enter departure';
        }
      
        
       

        // Make sure no errors
        if(empty($data['arrival_err']) && empty($data['departure_err'])  ){
          // Validated
          if($this->roomModel->updateReservation($data)){
            $_SESSION['message'] = 'Reservation Succesfully Modified';
            redirect('reservations/search');
          } else {
            $_SESSION['message'] = 'The room is taken during the selected date';
            $this->view('reservations/edit', $data);
          }
        } else {
          // Load view with errors
          $this->view('reservations/edit', $data);
        }

      } else {
      $reservation = $this->roomModel->getreservationById($id);
      
      $data = [
        'id' => $id,
        'arrival' => $reservation -> arrival,
        'departure' => $reservation -> departure
        
        
      ];
      
      
      $this->view('reservations/edit', $data);
      
      }}
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing room from model
        $post = $this->roomModel->getreservationById($id);
        

        if($this->roomModel->deletereservation($id)){
          $_SESSION['message'] = 'Reservation Succesfully Deleted';
          redirect('reservations/search');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('reservations/search');
      }
    }
    

    }
