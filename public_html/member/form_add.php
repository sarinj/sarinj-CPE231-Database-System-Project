<form action="" method="POST"   name="add" class="form-horizontal" id="add">
  <div class="form-group">
    <div class="col-sm-2" align="right"></div>
    <div class="col-sm-5" align="left"> <h3><i class="fas fa-user"></i> FORM ADD </h3> <hr/></div>
  </div>
  <div class="form-group">
    <div class="col-sm-1" align="right"> </div>
    <div class="col-sm-5" align="left">
      <b>First Name</b>
      <input  name="first_name" type="text" required class="form-control"  placeholder=""    minlength="2" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-1" align="right"> </div>
    <div class="col-sm-5" align="left">
      <b>Last Name</b>
      <input  name="last_name" type="text" required class="form-control"   minlength="2" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-1" align="right">  </div>
    <div class="col-sm-7" align="left">
      <b>Email </b>
      <input  name="email" type="email"  class="form-control" required />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-1" align="right">   </div>
    <div class="col-sm-4" align="left">
      <b>Username</b>
      <input  name="username" type="text" required class="form-control"  minlength="2"/>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-1" align="right"> </div>
    <div class="col-sm-4" align="left">
      <b>Password</b>
      <input  name="password" type="password" required class="form-control"  minlength="2" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-1"> </div>
    <div class="col-sm-5">
      <button type="submit" class="btn btn-primary" id="btn">Submit
      </button>
    </div>
  </div>
</form>

<?php

  //print_r($_POST); //check input

    if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) ){
    // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    
    require_once 'connect.php';

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = sha1($_POST['password']); 

    //check duplicat
      $stmt = $conn->prepare("SELECT trader_id FROM trader_member WHERE username = :username");
      $stmt->execute(array(':username' => $username));
     
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
      }else{ //ถ username ซ ก็้มลงร
              //sql insert
              $stmt = $conn->prepare("INSERT INTO trader_member (first_name, last_name, email, username, password)
              VALUES (:first_name, :last_name, :email, :username, :password)");
              $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
              $stmt->bindParam(':last_name', $last_name , PDO::PARAM_STR);
              $stmt->bindParam(':email', $email , PDO::PARAM_STR);
              $stmt->bindParam(':username', $username , PDO::PARAM_STR);
              $stmt->bindParam(':password', $password , PDO::PARAM_STR);
              $result = $stmt->execute();
              if($result){
                  echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "Successful Add Member",
                            text: "",
                            type: "success"
                        }, function() {
                            window.location = "admin.php";
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
                            window.location = "admin.php";
                        });
                      }, 1000);
                  </script>';
              }
              $conn = null; //close connect db
        } //else chk dup
    } //isset 
    ?>