
<?php 
  $title = 'PWA - 614';   
  $stringData = file_get_contents('https://jsonplaceholder.typicode.com/todos/');
  $toDos=json_decode($stringData,true);
  $dbData=json_encode($toDos);
  file_put_contents("./db.json", $dbData);
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
  <title><?= $title ?></title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
  
  <table>
    <thead>
      <tr>
        <th>User Id</th>
        <th>Id</th>
        <th>Title</th>
        <th>Completed</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($toDos as $row): ?>
      <tr>
        <?php foreach($row as $key=>$cell): ?>
        <td>
         <?php if($key==="completed"): ?>
         <?php if($cell): ?>
          <i class="material-icons green-text">done</i>
          <?php else: ?>
            <i class="material-icons red-text">close</i>
            <?php endif; ?>
          <?php else: ?>
            <?= $cell ?>
          <?php endif; ?>
        </td>        
        <?php endforeach; ?>    
      </tr>  
      <?php endforeach; ?>    
    </tbody>
  </table>
</body>
</html>
