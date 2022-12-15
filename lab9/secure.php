<?php
  session_start();

  if (isset($_SESSION['user'])) {
    $loggedIn = true;    
  } 
?>