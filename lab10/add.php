<?php
  require_once('./secure.php');

  if (isset($loggedIn) && $loggedIn) {

    $title = isset($_POST['title']) ? trim($_POST['title']) : false;

    if ($title !== false && strlen($title) > 0) {
      require_once('./readDb.php');
      require_once('./mysql.php');

      $connection = connect();
      addTodo($connection, $title);
    }

    header('Location: index.php');
  } else {
    header('Location: login.php');
  }
?>