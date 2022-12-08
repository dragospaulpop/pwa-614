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
?>