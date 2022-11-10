<?php
    session_start();
    
    $con=mysqli_connect("localhost","b1n_cpe231","123456","b1n_bitnance");
    // Check connection
    if (mysqli_connect_errno()) {
    //echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else //echo "success";
    
$trader_id = $_SESSION['trader_id'];
                     echo $trader_id;
?>
    
<?php require_once('includes/nav_loggedin.php')?>
<!DOCTYPE html>
<html lang="en">


<head?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="market.css" >
    <?php 
        
    ?>
</head>
<body>

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
                            <th scope="col">Asset</th>
                            <th scope="col">Pay with</th>
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
                    $query = "SELECT transaction_trade.offer_id,transaction_trade.price,transaction_trade.quantity,crypto.item_code,transaction_trade.buyer_id,transaction_trade.seller_id,crypto.item_id,transaction_trade.pay_by_item,transaction_trade.ts FROM transaction_trade 
                    JOIN offer
                    ON offer.offer_id = transaction_trade.offer_id 
                    JOIN crypto 
                    ON crypto.item_id = transaction_trade.item_id 
                    WHERE (buyer_id = $trader_id OR seller_id = $trader_id) AND DATE(transaction_trade.ts) BETWEEN '$from_date' AND '$to_date' ";
                    $query_run = mysqli_query($con,$query);
                    if(mysqli_num_rows($query_run)>0)
                    {
                        foreach($query_run as $row)
                        {
                            
                            ?>
                            <tr>
                            <td><?= $row['ts'];?></td>
                            <td><?php if($trader_id!=$row['offer_id']){$itemque = "SELECT * FROM crypto";
                                        $item = $con->query($itemque);
                                        if($trader_id == $row['buyer_id']){
                                        while($rows = $item->fetch_assoc()){
                                            if($rows['item_id']==$row['item_id']){echo $rows['item_code']; }}
                                        }
                                        else{
                                            while($rows = $item->fetch_assoc()){
                                            if($rows['item_id']==$row['pay_by_item']){echo $rows['item_code']; }}
                                        }
                                
                            }
                                            else{ $itemque = "SELECT * FROM crypto";
                                        $item = $con->query($itemque);
                                         if($trader_id == $row['buyer_id']){
                                        while($rows = $item->fetch_assoc()){
                                            if($rows['item_id']==$row['pay_by_item']){echo $rows['item_code']; }}
                                        }
                                        else{
                                            while($rows = $item->fetch_assoc()){
                                            if($rows['item_id']==$row['item_id']){echo $rows['item_code']; }}
                                        } }
                                        ?></td>
                            
                            <td><?php if($trader_id!=$row['offer_id']){$itemque = "SELECT * FROM crypto";
                                        $item = $con->query($itemque);
                                        if($trader_id == $row['buyer_id']){
                                        while($rows = $item->fetch_assoc()){
                                            if($rows['item_id']==$row['pay_by_item']){echo $rows['item_code']; }}
                                        }
                                        else{
                                            while($rows = $item->fetch_assoc()){
                                            if($rows['item_id']==$row['item_id']){echo $rows['item_code']; }}
                                        }
                                
                            }
                                            else{ $itemque = "SELECT * FROM crypto";
                                        $item = $con->query($itemque);
                                         if($trader_id == $row['buyer_id']){
                                        while($rows = $item->fetch_assoc()){
                                            if($rows['item_id']==$row['item_id']){echo $rows['item_code']; }}
                                        }
                                        else{
                                            while($rows = $item->fetch_assoc()){
                                            if($rows['item_id']==$row['pay_by_item']){echo $rows['item_code']; }}
                                        } }
                                        ?></td>
                            <td><?php if($trader_id==$row['buyer_id']){echo "Buy";}else{echo "Sell";}?></td>
                            <td><?php if($trader_id!=$row['offer_id']){echo $row['quantity'];}else{echo $row['price'];}?> <?php if($trader_id!=$row['offer_id']){$itemque = "SELECT * FROM crypto";
                                        $item = $con->query($itemque);
                                        if($trader_id == $row['buyer_id']){
                                        while($rows = $item->fetch_assoc()){
                                            if($rows['item_id']==$row['pay_by_item']){echo $rows['item_code']; }}
                                        }
                                        else{
                                            while($rows = $item->fetch_assoc()){
                                            if($rows['item_id']==$row['item_id']){echo $rows['item_code']; }}
                                        }
                                
                            }
                                            else{ $itemque = "SELECT * FROM crypto";
                                        $item = $con->query($itemque);
                                         if($trader_id == $row['buyer_id']){
                                        while($rows = $item->fetch_assoc()){
                                            if($rows['item_id']==$row['item_id']){echo $rows['item_code']; }}
                                        }
                                        else{
                                            while($rows = $item->fetch_assoc()){
                                            if($rows['item_id']==$row['pay_by_item']){echo $rows['item_code']; }}
                                        } }
                                        ?></td>
                            <td><?php if($trader_id!=$row['offer_id']){echo $row['price'];}else{echo $row['quantity'];}?> <?php if($trader_id!=$row['offer_id']){$itemque = "SELECT * FROM crypto";
                                        $item = $con->query($itemque);
                                        if($trader_id == $row['buyer_id']){
                                        while($rows = $item->fetch_assoc()){
                                            if($rows['item_id']==$row['item_id']){echo $rows['item_code']; }}
                                        }
                                        else{
                                            while($rows = $item->fetch_assoc()){
                                            if($rows['item_id']==$row['pay_by_item']){echo $rows['item_code']; }}
                                        }
                                
                            }
                                            else{ $itemque = "SELECT * FROM crypto";
                                        $item = $con->query($itemque);
                                         if($trader_id == $row['buyer_id']){
                                        while($rows = $item->fetch_assoc()){
                                            if($rows['item_id']==$row['pay_by_item']){echo $rows['item_code']; }}
                                        }
                                        else{
                                            while($rows = $item->fetch_assoc()){
                                            if($rows['item_id']==$row['item_id']){echo $rows['item_code']; }}
                                        } }
                                        ?></td>
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