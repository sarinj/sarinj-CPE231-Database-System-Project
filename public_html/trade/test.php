<!DOCTYPE html>
<html lang="en">
<?php

session_start();

if (empty($_SESSION['trader_id']) && empty($_SESSION['first_name']) && empty($_SESSION['last_name'])) {
    header("location : http://b1.cpe231.cpe.kmutt.ac.th/login.php");
}
include('../includes/nav_loggedin.php');
$trader_id = $_SESSION['trader_id'];
echo "trader_id : " . $trader_id;

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="p2p.css">
    <?php
    $con = mysqli_connect("localhost", "b1_cpe231", "123456", "b1_bitnance");
    $query2 = "SELECT * FROM crypto";
    $result1 = mysqli_query($con, $query2);
    $result2 = mysqli_query($con, $query2);

    //get wallet_id
    $wallet_detail = mysqli_fetch_array(mysqli_query($con, "SELECT wallet_id,trader_rank FROM wallet WHERE trader_id = $trader_id"));
    $wallet_id = $wallet_detail['wallet_id'];
    echo "wallet_id : ". $wallet_id;


    $sql = "SELECT item_name,item_code,image_link FROM crypto";
    $coinsdata = mysqli_query($con, $sql);
    $coinsdata2 = mysqli_query($con, $sql);
    ?>
</head>

<body>
    <form method="POST">
        <div class="modal-body">

            <div class="buy_sell">
                <input type="radio" class="btn-check buy-sell-btn" name="buy-sell" value="buy" id="btnradio1" autocomplete="off" checked>
                <label class="btn btn-outline-primary" for="btnradio1">Buy</label>

                <input type="radio" class="btn-check buy-sell-btn" name="buy-sell" value="sell" id="btnradio2" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio2">Sell</label>
            </div>
            <div class="select_crypto">
                <div class="search_select_box">
                    <h6>Asset</h6>
                    <select data-live-search="true" class="select_cur" name="asset">
                        <option value=NULL>Select</option>
                        <?php
                        while ($coindata = mysqli_fetch_array($coinsdata)) { ?>

                            <option value="<?php echo $coindata['item_code']; ?>">
                                <?php echo $coindata['item_name'] . "  (" . $coindata['item_code'] . ")" ?>
                            </option>
                        <?php
                        }

                        ?>

                    </select>
                </div>
                <div class="search_select_box">
                    <h6>Pay with</h6>
                    <select data-live-search="true" class="select_cur" name="pay_with">
                         <option value=NULL>Select</option>
                        <?php
                        while ($coindata2 = mysqli_fetch_array($coinsdata2)) { ?>

                            <option value="<?php echo $coindata2['item_code']; ?>">
                                <?php echo $coindata2['item_name'] . "  (" . $coindata2['item_code'] . ")" ?>
                            </option>
                        <?php
                        }

                        ?>

                    </select>
                </div>

            </div>
            <div class="buy_sell_detail">
                <div class="input-group mb-3 amount_input">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Total asset to Buy/Sell</span>
                    </div>
                    <input name="total_asset_to_buy-sell" type="number" step="0.000001" min="0" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3 amount_input">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Price Per Asset</span>
                    </div>
                    <input name="amount" type="number" step="0.000001" min="0" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="offer">Create offer</button>
        </div>
    </form>


    <!----------------------------------------------------- create new offer ------------------------------------------>
    
    <?php
    //print_r($_POST);
    if (isset($_POST['offer'])) {

        if ((!empty($_POST['buy-sell']) && (!empty($_POST['asset'])) && (!empty($_POST['pay_with'])) && 
                (!empty($_POST['total_asset_to_buy-sell']))&& (!empty($_POST['amount'])))
        ) {
            
            // check deposite cash or crypto
            if ($_POST['buy-sell'] == 'buy') {
                $is_buy = 1;
            } else $is_buy = 0;

            $asset = $_POST['asset'];
            $pay_with = $_POST['pay_with'];
            $price_per_asset = $_POST['amount'];
            $amount = $_POST['total_asset_to_buy-sell'];


            $asset_info = mysqli_fetch_array(mysqli_query($con, "SELECT item_id FROM crypto WHERE item_code = '$asset'"));
            $asset_id = $asset_info['item_id'];
            $pay_with_info = mysqli_fetch_array(mysqli_query($con, "SELECT item_id FROM crypto WHERE item_code = '$pay_with'"));
            $pay_with_id = $pay_with_info['item_id'];

            echo $is_buy ."asset: " .$asset_id ."pay with: ". $pay_with_id ."price :". $price_per_asset ."amount :".$amount;
            if ($is_buy == 1) { //BUY

                $buy_available = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(CASE when is_deposite = 1 THEN quantity ELSE -quantity END) AS balance
                                                FROM transaction_wallet WHERE wallet_id = $wallet_id AND item_id = $pay_with_id"));

                if (($buy_available['balance'] - $amount) >= 0) {

                    //insert offer into database
                    mysqli_query($con, "INSERT INTO offer(trader_id,item_id,quantity,is_buy,pay_by_item,item_per_asset,is_active) 
                                                        VALUES ($trader_id,$asset_id,$amount,$is_buy,$pay_with_id,$price_per_asset,1) ");

                    //deduct in wallet
                    mysqli_query($con, "INSERT INTO transaction_wallet(wallet_id,item_id,quantity,is_deposite,is_cash) VALUES ($wallet_id,$asset_id,$amount,0,1) ");
                } else {

                    print_r("NOT ENOUGH");
                }
            } else { //SELL

                $sell_available = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(CASE when is_deposite = 1 THEN quantity ELSE -quantity END) AS balance
                                                FROM transaction_wallet WHERE wallet_id = $wallet_id AND item_id = $asset_id"));

                if (($sell_available['balance'] - $amount) >= 0) {
                    //insert offer into database
                    mysqli_query($con, "INSERT INTO offer(trader_id,item_id,quantity,is_buy,pay_by_item,item_per_asset,is_active) 
                                                        VALUES ($trader_id,$asset_id,$amount,$is_buy,$pay_with_id,$price_per_asset,1) ");

                    //deduct in wallet
                    mysqli_query($con, "INSERT INTO transaction_wallet(wallet_id,item_id,quantity,is_deposite,is_cash) VALUES ($wallet_id,$pay_with_id,$amount,0,1) ");
                } else {

                    print_r("NOT ENOUGH");
                }
            }
        } else {
            print_r('Please select the value.');
        }
    }

    ?>


    <!----------------------------------------------------- create new offer ------------------------------------------>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script src="p2p.js"></script>

</body>

</html>