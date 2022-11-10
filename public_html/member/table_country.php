<?php 

    session_start();

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
      <th><center>Country</center></th>
      <th><center>Name of Country</center></th>
    </tr>
  </thead>
  <tbody>
        <?php $con=mysqli_connect("localhost","b1n_cpe231","123456","b1n_bitnance");
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                } else echo "success";
                    $result = mysqli_query($con,"SELECT * FROM country");
                    while($row = mysqli_fetch_array($result))
                    {
                    echo "<tr>";
                    echo "<td>" . $row['country_id'] . "</td>";
                    echo "<td>" . $row['currency_code'] . "</td>";
                    echo "<td>" . $row['name_country'] . "</td>";
                    echo "</tr>";
                    }      
                        
                            
                            mysqli_close($con);
                        ?>
  </tbody>
</table>
</body>
</html>