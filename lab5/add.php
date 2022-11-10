<?php
   $title = isset($_POST['title']) ? $_POST['title'] : false;
    
    if ($title !== false) {
      require_once('./readDb.php');

      $max = 0;
      foreach($toDos as $todo) {
        if ($todo['userId'] === 1 && $todo['id'] > $max) {
          $max = $todo['id'];
        }
      }

      $toDos[] = [
        'userId' => 1,
        'id' => $max + 1,
        'title' => $title,
        'completed' => false,
      ];

      $stringData = json_encode($toDos);
      file_put_contents($dbFile, $stringData);
    }

  header('Location: index.php');
?>