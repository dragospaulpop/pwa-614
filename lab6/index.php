<?php 
  $title = 'PWA - 614';   
  
  require_once('./secure.php');

  if (isset($loggedIn) && $loggedIn) {    
    require_once('./readDb.php');
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
  <title><?= $title ?></title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
  <a href="logout.php">Logout</a>
  <?php include_once('./addForm.php'); ?>    
  <?php include_once('./table.php'); ?>    
</body>
</html>
<?php endif; ?>
