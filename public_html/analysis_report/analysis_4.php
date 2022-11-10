<?php

    $connect = mysqli_connect("localhost","b1n_cpe231","123456","b1n_bitnance");

    $query = "SELECT crypto.item_id,crypto.item_code,crypto.item_name, COUNT(transaction_wallet.is_deposite) as DepositeWithdrawCount
    FROM crypto LEFT JOIN transaction_wallet on (crypto.item_id = transaction_wallet.item_id)
    GROUP By crypto.item_id
    ORDER BY count(transaction_wallet.is_deposite) DESC LIMIT 10";

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
    <h3>Top 10 Coin that has the most transaction </h3><br />
    <div class="table-responsive ">
        <table class="table table-hover wallet_table">
            <thead>
                <tr>
                    <th scope="col">Coin Name</th>
                    <th scope="col">Coin code</th>
                    <th scope="col">Coin id</th>
                    <th scope="col">Transaction count</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo $row['item_name'] ?></td>
                    <td><?php echo $row['item_code']?></td>
                    <td><?php echo $row['item_id'] ?></td>

                    <td><?php echo $row['DepositeWithdrawCount'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>