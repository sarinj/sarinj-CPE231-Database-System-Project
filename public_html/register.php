<?php require_once('includes/nav-pending.php')?>
<?php require_once('includes/footer.php')?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Register | Bitnance</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-8"> <br> 
          <h4>Register</h4>
          <form action="" method="post">
            <div class="mb-2">
                <div class="col-sm-9">
                <input type="text" name="first_name" class="form-control" required minlength="3" placeholder="Firstname">
              </div>
              </div>
              <div class="mb-2">
                <div class="col-sm-9">
                  <input type="text" name="last_name" class="form-control" required minlength="3" placeholder="Lastname">
                </div>
                </div>
                
                <div class="mb-2">
                <div class="col-sm-9">
                  <input type="date" name="dob" class="form-control" placeholder="Date of Birth">
                </div>
                </div>
                
                <?php
                    $con = mysqli_connect("localhost", "b1n_cpe231", "123456", "b1n_bitnance");
                    if(mysqli_connect_errno()){
                        echo "Connection failed .." .mysqli_connect_error();
                    }
                    $result = mysqli_query($con, "select * from country");
                    echo "<label for='country' class='col-form-label'>Country:</label><select name='country_id' id ='country'>";
                    //echo "<option>Country</option>";
                    while($row=mysqli_fetch_array($result)){
                        $country_id = $row['country_id'];
                        echo "<option value='$country_id'>$row[name_country]</option>";
                    }
                    echo "</select>";
                    mysqli_close($con);
                ?>
            
            	<div class="mb-2">
                <div class="col-sm-9">
                  <input type="text" name="email" class="form-control" required minlength="3" placeholder="E-mail">
                </div>
                </div>
            
                <div class="mb-2">
                <div class="col-sm-9">
                  <input type="text" name="username" class="form-control" required minlength="3" placeholder="Username">
                </div>
                </div>
                
                <div class="mb-3">
                <div class="col-sm-9">
                  <input type="password" name="password" class="form-control" required minlength="3" placeholder="Password">
                </div>
                </div>
                <div class="d-grid gap-2 col-sm-9 mb-3">
                <button type="submit" class="btn btn-primary">Sign Up</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <center>Already have a account?<a href="./login.php" target="_blank">LogIn</a> </center>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      </body>
    </html>  


    <?php

  //print_r($_POST); //check input

    if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['dob']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) ){
    // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    
    require_once 'connect.php';

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $country_id = $_POST['country_id'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    //check duplicat
      $stmt = $conn->prepare("SELECT trader_id FROM trader_member WHERE username = :username");
      $stmt->execute(array(':username' => $username));
        //print_r($stmt);
      if($stmt->rowCount() > 0){
          echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "Username Duplicate !!",  
                            text: "Please inform again",
                            type: "Warning"
                        }, function() {
                            window.location = "formRegister.php";
                        });
                      }, 1000);
                </script>';
      }else{ // username  ก็อ
              //sql insert
              $stmt = $conn->prepare("INSERT INTO trader_member (first_name, last_name, dob, country_id, email, username, password)
              VALUES (:first_name, :last_name, :dob, :country_id, :email, :username, :password)");
              $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
              $stmt->bindParam(':last_name', $last_name , PDO::PARAM_STR);
              $stmt->bindParam(':dob', $dob , PDO::PARAM_STR);
              $stmt->bindParam(':country_id', $country_id , PDO::PARAM_STR);
              $stmt->bindParam(':email', $email , PDO::PARAM_STR);
              $stmt->bindParam(':username', $username , PDO::PARAM_STR);
              $stmt->bindParam(':password', $password , PDO::PARAM_STR);
              $result = $stmt->execute();
              if($result){
                  echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "Successful registration",
                            text: "",
                            type: "success"
                        }, function() {
                            window.location = "login.php";
                        });
                      }, 1000);
                  </script>';
              }else{
                 echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "Error occurred!!",
                            type: "error"
                        }, function() {
                            window.location = "formRegister.php";
                        });
                      }, 1000);
                  </script>';
              }
              $conn = null; //close connect db
        } //else chk dup
    } //isset 
    ?>