<?php
session_start();
//เ็วป session อะไรบ้า
//print_r($_SESSION);
//exit();

?>

<?php require_once('includes/nav_loggedin.php')?>
<?php require_once('includes/footer.php')?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <title>Dashboard | Bitnance</title>
  </head>
  <body>
     <!--dashboard detail-->  
            <div class="container">
              <h3 class="text">hi <?= $_SESSION['first_name'].' '.$_SESSION['last_name'];?></h3>
              <h4 class="text"> User ID : <?= $_SESSION['trader_id'];?> Register since : <?= $_SESSION['time_register'];?> </h4>
            	
              <button type="button" class="btn btn-secondary btn-sm" onclick="document.location='#.php'">deposit</button>
              <button type="button" class="btn btn-secondary btn-sm" onclick="document.location='#.php'">withdraw</button>
              
    		</div>
                
  </body>
</html>