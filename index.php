<?php 
  $title = 'PWA - 614';   
  $produse = [
    [1, 'mere', 123.25],
    [2, 'pere', 45.21],
    [3, 'gutui', 52.20],
  ];
  // var_dump($produse);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Denumire</th>
        <th>Pret</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($produse as $row): ?>
      <tr>
        <?php foreach($row as $cell): ?>
        <td><?= $cell ?></td>        
        <?php endforeach; ?>    
      </tr>  
      <?php endforeach; ?>    
    </tbody>
  </table>
</body>
</html>