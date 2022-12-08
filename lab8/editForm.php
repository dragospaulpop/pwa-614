<?php
  require_once('./secure.php');

  if (isset($loggedIn) && $loggedIn) {    
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $userId = isset($_GET['userId']) ? $_GET['userId'] : null;

    if ($id && $userId) {
      require_once('./readDb.php');
      $foundTodo = null;

      foreach($toDos as $todo) {
        if ($todo['userId'] == $userId && $todo['id'] == $id) {
          $foundTodo = $todo;
        }
      }

      if(!$foundTodo) {
        header('Location: index.php');
      }    
    } else {
      header('Location: index.php');
    }
  } else {
    header('Location: login.php');
  }
?>

<?php if (isset($loggedIn) && $loggedIn): ?>
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
<form action="edit.php" method="post">
  <input type="text" name="title" value="<?= $foundTodo['title']; ?>">
  <input type="hidden" name="userId" value="<?= $userId; ?>">
  <input type="hidden" name="id" value="<?= $id; ?>">
  <button class="waves-effect waves-light green btn">
    <i class="material-icons white-text">save</i>
  </button>
</form>
</body>
</html>
<?php endif; ?>