<?php
  require_once('./secure.php');
  require_once('./mysql.php');

  if (isset($loggedIn) && $loggedIn) {
    $keys = ['id', 'id_user', 'title', 'completed'];

    $connection = connect();

    $toDos = readTodos($connection);
  }
?>