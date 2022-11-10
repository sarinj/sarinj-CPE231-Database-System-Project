<?php  
 $connect = mysqli_connect("localhost","b1n_cpe231","123456","b1n_bitnance");  
 $sql = "SELECT trader_member.trader_id, trader_member.first_name, trader_member.last_name, COUNT(offer.offer_id), SUM(offer.quantity), SUM(transaction_trade.quantity) FROM trader_member
         LEFT JOIN offer
         ON trader_member.trader_id = offer.trader_id
         LEFT JOIN transaction_trade
         ON transaction_trade.seller_id = offer.trader_id
         GROUP BY trader_member.trader_id
         ORDER BY SUM(offer.quantity) DESC
         LIMIT 10";  
 $result = mysqli_query($connect, $sql);  
 ?>  
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analysis Report 2</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>
<body>
    <div class="container" style="width:1000px;">
    <h3>Top 10 The Person Most Offering </h3><br />
    <div class="table-responsive ">
        <table class="table table-hover wallet_table">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Offer count</th> 
                    <th scope="col">Sum offer quantity</th> 
                    <th scope="col">Sum transaction quantity</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo $row['first_name']?></td>
                    <td><?php echo $row['last_name'] ?></td>
                    <td><?php echo $row['COUNT(offer.offer_id)'] ?></td>
                    <td><?php echo $row['SUM(offer.quantity)'] ?></td>
                    <td><?php echo $row['SUM(transaction_trade.quantity)'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>