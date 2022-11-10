<?php  
 $connect = mysqli_connect("localhost","b1n_cpe231","123456","b1n_bitnance");
 
 $sql = "SELECT crypto.item_id,crypto.item_code,crypto.item_name,count(transaction_trade.transaction_id) as TransactionCount
    FROM crypto LEFT JOIN transaction_trade on ((crypto.item_id = transaction_trade.item_id) OR (crypto.item_id = transaction_trade.pay_by_item))
    GROUP By crypto.item_id
    ORDER BY count(transaction_trade.transaction_id) DESC LIMIT 10;";

$sql2 = "SELECT crypto.item_id,crypto.item_code,crypto.item_name,count(offer.offer_id) as OfferCount
    FROM crypto LEFT JOIN offer on ((crypto.item_id = offer.item_id) OR (crypto.item_id = offer.pay_by_item))
    GROUP By crypto.item_id
    ORDER BY count(offer.offer_id) DESC LIMIT 10;";

$results = mysqli_query($connect, $sql);
$results2 = mysqli_query($connect, $sql2); 
?>

  <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Analysis Report 5</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:1000px;">  
                <h3 align="">Top 10 CryptoCurrencies Traded</h3><br />                 
                <div class="table-responsive">  
                     <table class="table table-hover wallet_table">
                    <thead>
                        <tr>
                            <th scope="col">Item_id</th>
                            <th scope="col">Coin Name</th>
                            <th scope="col">Item_code</th>
                            <th scope="col">OfferCount</th>
                            <th scope="col">TransactionCount</th>

                        </tr>
                    </thead>
                    <tbody><?php

                               while ($result = mysqli_fetch_array($results)){ 
                                    $result2 = mysqli_fetch_array($results2);
                               ?>
                                     
                                <tr>
                        
                                    <td style = "width:20%">
                                        <?php  
                                            echo $result['item_id'];
                                        ?>
                                    </td>
                                    <td style = "width:20%">
                                    <?php
                                        echo $result['item_name'];    
                                     ?>
                                    </td>
                                    <td style = "width:20%">
                                     <?php
                                        echo $result['item_code'];
                                     ?>
                                    </td>
                                    <td style = "width:20%">
                                    <?php
                                        echo $result2['OfferCount'];
                                     ?>
                                    </td>
                                    <td style = "width:20%">
                                    <?php
                                        echo $result['TransactionCount'];
                                     ?>
                                    </td>

                                </tr>
                        <?php
                                }

                        ?>

<?php mysqli_close($connect);?>
                    </tbody>
                </table>  
                </div>  
           </div>  
           <br />  
      </body>  
 </html>  