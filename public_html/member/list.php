<?php 

    session_start();

    require_once "connect.php";
    
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deletestmt = $conn->query("DELETE FROM trader_member WHERE trader_id = $delete_id");
        $deletestmt->execute();

        if ($deletestmt) {
            echo "<script>alert('Data has been deleted successfully');</script>";
            $_SESSION['success'] = "Data has been deleted succesfully";
            header("refresh:1; url=admin.php");
        }
        
    }

?>
<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 10%;
color: #000000;
font-family: monospace;
font-size: 14px;
text-align: left;
}
th {

}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table id="example1" class="table table-bordered  table-hover table-striped">
  <thead>
    <tr class="danger">
      <th><center>ID</center></th>
      <th><center>First Name</center></th>
      <th><center>Last Name</center></th>
      <th><center>Date of Birth</center></th>
      <th><center>Country</center></th>
      <th><center>Email</center></th>
      <th><center>Username</center></th>
      <th><center>Password</center></th>
      <th><center>Role</center></th>
      <th><center>Edit</center></th>
      <th><center>Delete</center></th>
    </tr>
  </thead>
  <tbody>
  <?php 
                    $stmt = $conn->query("SELECT * FROM trader_member");
                    $stmt->execute();
                    $users = $stmt->fetchAll();

                    if (!$users) {
                        echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
                    } else {
                    foreach($users as $user)  {  
                ?>
                    <tr>
                        <th scope="row"><?php echo $user['trader_id']; ?></th>
                        <td><?php echo $user['first_name']; ?></td>
                        <td><?php echo $user['last_name']; ?></td>
                        <td><?php echo $user['dob']; ?></td>
                        <td><?php echo $user['country_id']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['password']; ?></td>
                        <td><?php echo $user['role']; ?></td>
                        <td>
                            <a href="edit.php?edit=<?php echo $user['trader_id']; ?>" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure you want to delete?');" href="?delete=<?php echo $user['trader_id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php }  } ?>
  </tbody>
</table>
</body>
</html>