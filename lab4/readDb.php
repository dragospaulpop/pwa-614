<?php
  $dbFile = './db.json';
  $dbExists = file_exists($dbFile);
  $keys = ['userId', 'id', 'title', 'completed'];

  if ($dbExists) {
    $stringData = file_get_contents($dbFile);
  } else {
    $stringData = file_get_contents('https://jsonplaceholder.typicode.com/todos/');
    file_put_contents($dbFile, $stringData);
  }

  $toDos=json_decode($stringData, true);
?>