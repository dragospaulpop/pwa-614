<?php

  require_once('./secure.php');

  if (isset($loggedIn) && $loggedIn) {
    $id = isset($_POST['id']) ? $_POST['id'] : false;

    if ($id !== false) {
      require_once('./mysql.php');
      $connection = connect();
      toggleCompletedTodo($connection, $id, $_SESSION['id_user']);
    }

    header('Location: index.php');
  }else {
    header('Location: login.php');
  }
?>