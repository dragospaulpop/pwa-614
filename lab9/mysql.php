<?php
  function connect () {
    $connection = mysqli_connect('localhost', 'root', '', 'todos');

    return $connection;
  }

  function login ($connection, $user, $pass) {
    $sql = "SELECT id, username  FROM users WHERE username = '$user' AND active = 1 and password = PASSWORD('$pass');";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);

      return $row;
    } else {
      return false;
    }
  }

  function readTodos ($connection) {
    if (isset($_SESSION) && isset($_SESSION['id_user'])) {
      $id_user = $_SESSION['id_user'];

      $sql = "SELECT *  FROM `todos` WHERE `id_user` = $id_user;";

      $result = mysqli_query($connection, $sql);

      if (mysqli_num_rows($result) > 0) {
        $todos = [];

        while ($row = mysqli_fetch_assoc($result)) {
          $todos[] = $row;
        }

        return $todos;
      } else {
        return [];
      }
    } else {
      return [];
    }
  }

  function editTodo ($connection, $id, $id_user, $title) {
    $sql = "UPDATE `todos` SET `title` = '$title' WHERE `id` = $id AND `id_user` = $id_user;";

    mysqli_query($connection, $sql);
  }

  function addTodo($connection, $title) {
    if (isset($_SESSION) && isset($_SESSION['id_user'])) {
      $id_user = $_SESSION['id_user'];

      $sql = "INSERT INTO `todos` (`id_user`, `title`) VALUES ($id_user, '$title');";

      mysqli_query($connection, $sql);
    }
  }

  function deleteTodo($connection, $id, $id_user) {
    $sql = "DELETE FROM todos WHERE `id` = $id AND `id_user` = $id_user;";

    mysqli_query($connection, $sql);
  }
?>