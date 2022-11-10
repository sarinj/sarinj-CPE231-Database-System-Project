<?php session_start();?>

<!--Nav bar-->
<?php require_once('includes/nav-pending.php')?>
<?php require_once('includes/footer.php')?>

 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
    <title>LogIn | Bitnance</title>
     </head>
      <body>
		<div class="container">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-8"> <br> 
              <h4>Log in</h4>
              <form action="" method="post">
                    <div class="mb-2">
                    <div class="col-sm-9">
                      <input type="text" name="username" class="form-control" required minlength="3" placeholder="username">
                    </div>
                    </div>
                    <div class="mb-3">
                    <div class="col-sm-9">
                      <input type="password" name="password" class="form-control" required minlength="3" placeholder="password">
                    </div>
                    </div>
                    <div class="d-grid gap-2 col-sm-9 mb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
        <center>If you don't have an account<a href="./register.php" target="_blank">Sign Up</a> </center>r>
      </body>
    </html>  


    <?php

  //print_r($_POST); //check in 
    if(isset($_POST['username']) && isset($_POST['password']) ){
    // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';


    require_once 'connect.php';

    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    //check username  & password
      $stmt = $conn->prepare("SELECT * FROM trader_member WHERE username = :username AND password = :password");
      $stmt->bindParam(':username', $username , PDO::PARAM_STR);
      $stmt->bindParam(':password', $password , PDO::PARAM_STR);
      $stmt->execute();

      //username & password correct
      if($stmt->rowCount() == 1){
      
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['trader_id'] = $row['trader_id'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['time_register'] = $row['time_register'];
			
        	if ($row['role'] == 'admin') {
                  $_SESSION['admin_login'] = $row['trader_id'];
                  header("location: member/admin.php");
            } else if ($row['role'] == 'owner') {
                  $_SESSION['owner_login'] = $row['trader_id'];
                  header("location: ./insert_coin/upload_coin.php");
            } else {
                  $_SESSION['user_login'] = $row['trader_id'];
                  header("location: main.php");
            }
        //header('location: main.php');
        
      }else{ 

         echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "Something went wrong",
                             text: "Username or Password incorrect",
                            type: "warning"
                        }, function() {
                            window.location = "login.php";
                        });
                      }, 1000);
                  </script>';
              $conn = null; //close connect db
            } //else
    } //isset 
    //devbanban.com
    ?>