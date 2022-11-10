<?php
session_start();

require_once "connect.php";
echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
//เช็ค session อะไรบ้า
//print_r($_SESSION);
//exit();
//ราเ่ session
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

if (isset($_POST['update'])) {
        $trader_id = $_POST['trader_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $dob = $_POST['dob'];
        $country_id = $_POST['country_id'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = sha1($_POST['password']);
        $sql = $conn->prepare("UPDATE trader_member SET first_name = :first_name, last_name = :last_name, dob = :dob, country_id = :country_id, email = :email, username = :username, password = :password WHERE trader_id = :trader_id");
        $sql->bindParam(":trader_id", $trader_id);
        $sql->bindParam(":first_name", $first_name);
        $sql->bindParam(":last_name", $last_name);
        $sql->bindParam(":dob", $dob);
        $sql->bindParam(":country_id", $country_id);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":username", $username);
        $sql->bindParam(":password", $password);
        $sql->execute();
        if ($sql) {
            $_SESSION['success'] = "Data has been updated successfully";
            //header("location: logout.php");
            echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "Update Success!",
                             text: "Plese, login again to update profile",
                            type: "success"
                        }, function() {
                            window.location = "logout.php";
                        });
                      }, 1000);
                  </script>';
        } else {
            $_SESSION['error'] = "Data has not been updated successfully";
            header("location: logout.php");
        }
    }
?>

<?php require_once('includes/nav_loggedin.php')?>


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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!--edit body-->
    <div class="container mt-5">
        <h1>Edit Data</h1>
        <hr>
        <form action="edit_profile.php" method="post" enctype="multipart/form-data">
            <?php
                if (isset($_SESSION['trader_id'])) {
                        $trader_id = $_SESSION['trader_id'];
                        $stmt = $conn->query("SELECT * FROM trader_member WHERE trader_id = $trader_id");
                        $stmt->execute();
                        $data = $stmt->fetch();
                }
            ?>
                <div class="mb-3">
                    <label for="id" class="col-form-label">ID:</label>
                    <input type="text" readonly value="<?php echo $data['trader_id']; ?>" required class="form-control" name="trader_id" >
                    <label for="firstname" class="col-form-label">First Name:</label>
                    <input type="text" value="<?php echo $data['first_name']; ?>" required class="form-control" name="first_name" >
                </div>
                <div class="mb-3">
                    <label for="lastname" class="col-form-label">Last Name:</label>
                    <input type="text" value="<?php echo $data['last_name']; ?>" required class="form-control" name="last_name">
                </div>
                <div class="mb-3">
                    <label for="dob" class="col-form-label">Date of Birth:</label>
                    <input type="date" value="<?php echo $data['dob']; ?>" required class="form-control" name="dob">
                </div>
                
                <!-- select country-->
                <?php
                    $con = mysqli_connect("localhost", "b1_cpe231", "123456", "b1_bitnance");
                    if(mysqli_connect_errno()){
                        echo "Connection failed .." .mysqli_connect_error();
                    }
                    $result = mysqli_query($con, "select * from country");
                    echo "<label for='country' class='col-form-label'>Country:</label><br/><select name='country_id' id ='country'>";
                    //echo "<option>Country</option>";
                    while($row=mysqli_fetch_array($result)){
                        $country_id = $row['country_id'];
                        echo "<option value='$country_id'>$row[name_country]</option>";
                    }
                    echo "</select>";
                    mysqli_close($con);
                ?>
                
                <div class="mb-3">
                    <label for="email" class="col-form-label">Email:</label>
                    <input type="text" value="<?php echo $data['email']; ?>" required class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="username" class="col-form-label">Username:</label>
                    <input type="text" value="<?php echo $data['username']; ?>" required class="form-control" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="col-form-label">Password:</label>
                    <input type="text" value="" required class="form-control" name="password">
                </div>
                <hr>
                <a href="admin.php" class="btn btn-secondary">Go Back</a>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
            </form>
    </div>
    
  </body>
</html>