<?php
  class Rooms extends Controller {
    public function __construct(){
      if(!adminisLoggedIn()){
        redirect('users/login');
      }

      $this->roomModel = $this->model('Room');
    }

    public function index(){
      // Get Rooms
      $rooms = $this->roomModel->getRooms();
      $reservations = $this->roomModel->getReservations();
      $guests = $this->roomModel->getguestsByreservation();

      
        
      
      $data = [
        'rooms' => $rooms,
        'reservations' => $reservations,
        'guests' => $guests
      ];
      

      

      $this->view('rooms/index', $data);

  
    }
   
    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){



        // initiate data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
         
       
          // update data
          
            
        $data = [
          
          'picture' => trim($_POST['picture']),
          'title' => trim($_POST['title']),
          'Price' => trim($_POST['Price']),
          'type' => trim($_POST['type']),
          'Occupied' => trim($_POST['Statut']), 
          'Suitetype' => trim($_POST['Suitetype']),
          'title_err' => '',
          'Price_err' => '',
          'picture_err' => ''
        ];
      
              
            
       

        // Validate data
        if(empty($data['title'])){
          $data['title_err'] = 'Please enter title';
        }
        if(empty($data['Price'])){
          $data['Price_err'] = 'Please enter Price';
        }
        if (empty($data['picture'])) {
          $data['picture_err'] = 'Please enter room picture';
         }
        
       

        // Make sure no errors
        if(empty($data['title_err']) && empty($data['Price_err']) && empty($data['picture_err']) ){
          // Validated
          if($this->roomModel->addRoom($data)){
            $_SESSION['message'] = 'Room Succesfully Added';
            redirect('rooms');
            
          } else {
            die('Something went wrong');
          }
          
        } else {
          // Load view with errors
          $this->view('rooms/add', $data);
        }
        
      } else {
        $data = [
          
          'title' => '',
          'Price' => '',
          'type' => '',
          'Suitetype' => '',
          'picture' => '',
          'picture_err' => ''
        ];
  
        $this->view('rooms/add', $data);
        
      }
    }
    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){


        
        // initiate data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $room = $this->roomModel->getroomById($id);
        
        
        
          // update data
          
            $data = [
              'picture' => trim($_POST['picture']),
              'picture_e' => $room->picture,
              'id' => $id,
              'title' => trim($_POST['title']),
              'Price' => trim($_POST['Price']),
              'type' => trim($_POST['type']),
              'Occupied' => trim($_POST['Statut']), 
              'Suitetype' => trim($_POST['Suitetype']),
              'title_err' => '',
              'Price_err' => ''
              
            ];
          
     
        
        
        
        
        
        
       

        // Validate data
        if(empty($data['title'])){
          $data['title_err'] = 'Please enter title';
        }
        if(empty($data['Price'])){
          $data['Price_err'] = 'Please enter Price';
        }
      
        
       

        // Make sure no errors
        if(empty($data['title_err']) && empty($data['Price_err']) && empty($data['picture_err']) ){
          // Validated
          if($this->roomModel->updateRoom($data)){
            $_SESSION['message'] = 'Room Succesfully Modified';
            redirect('rooms');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('rooms/edit', $data);
        }

      } else {
        // Get existing post from model
        $room = $this->roomModel->getroomById($id);
        $data = [
          'id' => $id,
          'picture' => $room->picture,
          'title' => $room->title,
          'Price' => $room->Price,
          'type' => $room->type,
          'Occupied' => $room->Occupied,
          'Suitetype' => $room->Suitetype
          
        ];
  
        $this->view('rooms/edit', $data);
      }
    }
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing room from model
        $post = $this->roomModel->getroomById($id);
        

        if($this->roomModel->deleteroom($id)){
          $_SESSION['message'] = 'Room Succesfully Deleted';
          redirect('rooms');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('rooms');
      }
    }
  }