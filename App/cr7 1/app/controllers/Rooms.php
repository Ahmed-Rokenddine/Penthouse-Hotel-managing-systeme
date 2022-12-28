<?php
  class Rooms extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->roomModel = $this->model('Room');
    }

    public function index(){
      // Get Rooms
      $rooms = $this->roomModel->getRooms();

      $data = [
        'rooms' => $rooms
      ];

      $this->view('rooms/index', $data);
    }
   
    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){



        // initiate data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        
        $data = [
          
          'picture' => trim($_POST['picture']),
          'title' => trim($_POST['title']),
          'Price' => trim($_POST['Price']),
          'type' => trim($_POST['type']),
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
            flash('room_message', 'Room added');
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
        
        
        if (!empty($data['picture'])) {
          // update data
          
            $data = [
              'id' => $id,
              'title' => trim($_POST['title']),
              'Price' => trim($_POST['Price']),
              'picture' => trim($_POST['picture']),
              'type' => trim($_POST['type']),
              'Suitetype' => trim($_POST['Suitetype']),
              'title_err' => '',
              'Price_err' => ''
              
            ];
          
      } else {
          // update data
          
            $data = [
              'id' => $id,
              'title' => trim($_POST['title']),
              'Price' => trim($_POST['Price']),
              'picture' => $room->picture,
              'type' => trim($_POST['type']),
              'Suitetype' => trim($_POST['Suitetype']),
              'title_err' => '',
              'Price_err' => ''
              
            ];
          
      }
        
        
        
        
        
        
       

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
            flash('room_message', 'Room Updated');
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
          'title' => $room->title,
          'Price' => $room->Price,
          'type' => $room->type,
          'Suitetype' => $room->Suitetype,
          'picture' => $room->picture
        ];
  
        $this->view('rooms/edit', $data);
      }
    }
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing room from model
        $post = $this->roomModel->getroomById($id);
        

        if($this->roomModel->deleteroom($id)){
          flash('room_message', 'room Removed');
          redirect('rooms');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('rooms');
      }
    }
  }