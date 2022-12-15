<?php
  require_once('./secure.php');

  if (isset($loggedIn) && $loggedIn) {
    $title = isset($_POST['title']) ? trim($_POST['title']) : null;
    $id_user = isset($_POST['id_user']) ? $_POST['id_user'] : null;
    $id = isset($_POST['id']) ? $_POST['id'] : null;

    if ($id && $id_user && $title && strlen($title) > 0) {
      require_once('./readDb.php');
      require_once('./mysql.php');

      $connection = connect();
      editTodo($connection, $id, $id_user, $title);

      header('Location: index.php');
    } else {
      header('Location: index.php');
    }
  } else {
    header('Location: login.php');
  }
?>