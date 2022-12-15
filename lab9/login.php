<?php
  $user = isset($_POST['user']) ? trim($_POST['user']) : null;
  $pass = isset($_POST['pass']) ? trim($_POST['pass']) : null;

  if ($user && $pass) {
    require_once('mysql.php');
    $connection = connect();
    $user = login($connection, $user, $pass);

    if ($user !== false) {
      session_start();
      $_SESSION['user'] = $user['username'];
      $_SESSION['id_user'] = $user['id'];
      header('Location: index.php');
    } else {
      $msg = 'Credentiale invalide. Pls try again.';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<form action="login.php" method="post">
  <?php if (isset($msg)): ?>
    <p class="red-text"><?= $msg; ?></p>
  <?php endif; ?>
  <input type="text" name="user" placeholder="user">
  <input type="password" name="pass" placeholder="pass">
  <button class="waves-effect waves-light green btn">
    Login
    <i class="material-icons white-text right">login</i>
  </button>
</form>
</body>
</html>