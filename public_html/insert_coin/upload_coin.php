 <?php
    session_start();
    //print_r($_SESSION);
    
    $con=mysqli_connect("localhost","b1n_cpe231","123456","b1n_bitnance");
    // Check connection
    if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } //else echo "success";
    

    if (isset($_POST['insert'])) {
        $item_code = $_POST['item_code'];
        $item_name = $_POST['item_name'];
        $image_link = $_POST['image_link'];
        $crypto_owner_id = $_SESSION['trader_id'];
        
        $sql="INSERT INTO crypto (item_code, item_name, image_link, crypto_owner_id)
    	VALUES ('$item_code', '$item_name', '$image_link', '$crypto_owner_id')";
    	if (!mysqli_query($con,$sql)) {
    	die('Error: ' . mysqli_error($con));
    	} else {
    	    echo "<script>alert('Record Inserted Successfully!');</script>";
            echo "<script>window.location.href='upload_coin.php'</script>";
    	}
    }
 
?>

  <!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
        <title>Owner Crypto | Bitnance</title>
      </head>
      <body>
        <!-- Image and text -->
            <nav class="navbar navbar-dark bg-dark">
              <a class="navbar-brand" href="#">
                <img src="../dist/img/owner_crypto.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Bitnance
              </a>
              <!--log out button-->  
                </div>
                <button class="btn btn-outline-danger btn-sm" type="button" onclick="document.location='../logout.php'">Log Out</button>
                </div>
            </nav>
            
        <!-- Insert Form -->
                <div class="container">
                    <h1 class="mt-5">Insert Page</h1>
                    <hr>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="item_code" class="form-label">Short name of crypto coin</label>
                            <input type="text" class="form-control" name="item_code" required>
                        </div>
                        <div class="mb-3">
                            <label for="item_name" class="form-label">Full name of cryptocoin</label>
                            <input type="text" class="form-control" name="item_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="image_link">Image Link</label>
                            <input type="text" class="form-control" name="image_link" required>
                        </div>
                        
                        <button type="submit" name="insert" class="btn btn-success">Insert</button>
                    </form>
                </div>
                <hr>
                
                
                
                <!-- Onwer crypto Coin Insert-->
                <div class="container">
                <h1 class="mt-5">Coin Made</h1>
                <hr>
                <table class="table table-striped">
                    <thead class = "table">
                        <tr>
                            <th scope="col">Coin Name</th>
                            <th scope="col">Full name</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $con=mysqli_connect("localhost","b1n_cpe231","123456","b1n_bitnance");
                        if (mysqli_connect_errno())
                            {
                            echo "Failed to connect to MySQL: " . mysqli_connect_error();
                            }
                        
                        $trader_id = $_SESSION['trader_id'];
                        $result = mysqli_query($con,"SELECT * FROM crypto WHERE crypto_owner_id = $trader_id");
                        while($row = mysqli_fetch_array($result))
                            {
                            echo "<tr>";
                            echo "<td>" . $row['item_code'] . "</td>";
                            echo "<td>" . $row['item_name'] . "</td>";
                            echo "<td>" . $row['image_link'] . "</td>";
                            echo "</tr>";
                            }
    
                            
                            mysqli_close($con);
                        ?>
                        
                    </tbody>
                </table>
            </div>
      </body>
    </html>