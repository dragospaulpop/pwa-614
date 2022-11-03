<?php
  $userId = isset($_POST['userId']) ? $_POST['userId'] : false;
  $id = isset($_POST['id']) ? $_POST['id'] : false;

  if ($userId !== false && $id !== false) {
    require_once('./readDb.php');

    $newTodos = [];
    foreach($toDos as $todo) {
      if (!($todo['userId'] == $userId && $todo['id'] == $id)) {
        $newTodos[] = $todo;
      }
    }

    $stringData = json_encode($newTodos);
    file_put_contents($dbFile, $stringData);
  }

  header('Location: index.php');
?>