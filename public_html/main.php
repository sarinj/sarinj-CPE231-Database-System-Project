<?php
session_start();
echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
//เช็คว่ามีตัวแป session อะไรบ้า
//print_r($_SESSION);
//exit();
//สร้างเงื่อ session
if(empty($_SESSION['trader_id']) && empty($_SESSION['first_name']) && empty($_SESSION['last_name'])){
            echo '<script>
                setTimeout(function() {
                swal({
                title: "Please Login first",
                type: "error"
                }, function() {
                window.location = "login.php"; 
                });
                }, 1000);
                </script>';
            exit();
}
?>

<?php require_once('includes/nav_loggedin.php')?>
<?php require_once('includes/analysis.php');?>
<?php require_once('includes/footer.php')?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <title>Bitnance | Cryptocurrency platform</title>

  </head>
  <body>
    
    
  </body>
</html>