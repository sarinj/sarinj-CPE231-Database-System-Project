<?php 

    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="market.css" >
    <?php 
        $con = mysqli_connect("localhost","b1n_cpe231","123456","b1n_bitnance");
        $query2 = "SELECT * FROM crypto";
        $result1 = mysqli_query($con,$query2);
    ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">

            <!-- Navbar Logo-->
            <a class="navbar-brand text-white" href="#">Bitnance</a>

            <!-- Navbar -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white mx-1" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Market</a>
                    </li>
                </ul>
            </div>

            <button class="btn btn-sm btn-outline-secondary mx-2" type="button" onclick="document.location='login.php'">Log In</button>
            <button class="btn btn-sm btn-outline-secondary" type="button" onclick="document.location='register.php'">Register</button>
        </div>
    </nav>
    <div class = "market_trend">
        <div class="table_container">
            <div class = "market_trend_header">
                <h2>Trading History</h2>
            </div>
            <form action="" method="GET">
            <div class="row">
                
                <div class="col-sm">
                    <label>From date</label>
                    <input type = "date" name="from_date"  class = "form-control "  >
                </div>
                <div class="col-sm">
                    <label>To date</label>
                    <input type = "date" name="to_date" class = "form-control " >
                </div>
                
                <div class="col-sm">
                    <label>Click to Filter</label> <br>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
            </form>
            <div class = "marketscrolltable">
                <table class="table table-hover market_table">
                    <thead>
                        <tr>
                            <th scope="col">Date time</th>
                            <th scope="col">Asset1</th>
                            <th scope="col">Type</th>
                            <th scope="col">Asset2</th>
                            <th scope="col">Type</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php
                
                
                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                {
                    $from_date = $_GET['from_date'];
                    $to_date = $_GET['to_date'];
                    
                    
                    
                    
                    $query = "SELECT * FROM transaction_trade 
                    JOIN offer
                    ON offer.offer_id = transaction_trade.offer_id 
                    JOIN crypto 
                    ON crypto.item_id = transaction_trade.item_id 
                    WHERE DATE(transaction_trade.ts) BETWEEN '$from_date' AND '$to_date' ";
                    
                   
                    
                    
                    $query_run = mysqli_query($con,$query);
                    if(mysqli_num_rows($query_run)>0)
                    {
                        foreach($query_run as $row)
                        {
                            
                            ?>
                            <tr>
                            <td><?= $row['ts'];?></td>
                            <td><?php $itemque = "SELECT * FROM crypto";
                                        $item = $con->query($itemque);
                                        while($rows = $item->fetch_assoc()){
                                            if($rows['item_id']==$row['item_id']){echo $rows['item_code']; }}
                                        ?></td>
                            <td><?php if($row['is_buy']=1){echo "Buy";} else{echo "Sell";}?></td>
                            <td><?php $itemque = "SELECT * FROM crypto";
                                        $item = $con->query($itemque);
                                        while($rows = $item->fetch_assoc()){
                                            if($rows['item_id']==$row['pay_by_item']){echo $rows['item_code']; }}
                                        ?></td>
                            <td><?php if($row['is_buy']=1){echo "Sell";} else{echo "Buy";}?></td>
                            <td><?= $row['quantity'];?></td>
                            <td><?= $row['price'];?> <?= $row['item_name'];?></td>
                            </tr>
                            <?php    
                        }
                    }
                    else
                    {
                        NULL;
                    }
                }
                ?>    
                
                    
            </tbody>

            </table>
            </div>
        </div>
    </div>
</body>
</html>