<?php

    $connect = mysqli_connect("localhost","b1n_cpe231","123456","b1n_bitnance");

    $query = "SELECT COUNT(transaction_trade.buyer_id) AS TotalBuyer, country.name_country, country.country_id, country.currency_code, SUM(transaction_trade.quantity)
    FROM transaction_trade, trader_member, country 
    WHERE transaction_trade.buyer_id = trader_member.trader_id 
    AND trader_member.country_id = country.country_id 
    GROUP BY trader_member.country_id 
    ORDER BY TotalBuyer DESC LIMIT 10";

    $result = mysqli_query($connect,$query) or die("Error : $query".mysqli_error($query));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analysis Report 3</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>
<body>
    <div class="container" style="width:1000px;">
    <h3>Top 10 Buying Countries</h3><br />
    <div class="table-responsive ">
        <table class="table table-hover wallet_table">
            <thead>
                <tr>
                    <th scope="col">Country_id</th>
                    <th scope="col">Country</th>
                    <th scope="col">country_code</th>
                    <th scope="col">TotalBuyer</th>
                    <th scope="col">Sum Transaction Quantity</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo $row['country_id'] ?></td>
                    <td><?php echo $row['name_country']?></td>
                    <td><?php echo $row['currency_code'] ?></td>
                    <td><?php echo $row['TotalBuyer'] ?></td>
                    <td><?php echo $row['SUM(transaction_trade.quantity)'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>