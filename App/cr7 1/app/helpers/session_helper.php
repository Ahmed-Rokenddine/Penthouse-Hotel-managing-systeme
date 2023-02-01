<?php
  session_start();

  
  function userisLoggedIn(){
    if(isset($_SESSION['user_id'])){
      return true;
    } else {
      return false;
    }
  }
  function adminisLoggedIn(){
    if(isset($_SESSION['admin_id'])){
      return true;
    } else {
      return false;
    }
  }
