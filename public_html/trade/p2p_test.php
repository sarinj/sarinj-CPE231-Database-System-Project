<!DOCTYPE html>
<html lang="en">
<?php

session_start();

if (empty($_SESSION['trader_id']) && empty($_SESSION['first_name']) && empty($_SESSION['last_name'])) {
    header("location : ./login.php");
}
include('../includes/nav_loggedin.php');
$trader_id = $_SESSION['trader_id'];
//echo $trader_id;

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="p2p.css">
    <?php
    //$con = mysqli_connect("localhost", "b1_cpe231", "123456", "b1_bitnance");
    $con = mysqli_connect("localhost", "b1n_cpe231", "123456", "b1n_bitnance");
    $query2 = "SELECT * FROM crypto";
    $result1 = mysqli_query($con, $query2);
    $result2 = mysqli_query($con, $query2);

    //get wallet_id
    $wallet_detail = mysqli_fetch_array(mysqli_query($con, "SELECT wallet_id,trader_rank FROM wallet WHERE trader_id = $trader_id"));
    $wallet_id = $wallet_detail['wallet_id'];
    //echo $wallet_id;


    $sql = "SELECT item_name,item_code,image_link FROM crypto";
    $coinsdata = mysqli_query($con, $sql);
    $coinsdata2 = mysqli_query($con, $sql);
    $offersdata = mysqli_query($con, "SELECT offer_id,trader_id,item_id,quantity,is_buy,pay_by_item,item_per_asset,is_active FROM offer WHERE is_active = 1");
    ?>
</head>


<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <div class="table-container">
        <div class="box">
            <div class="header">
                <h1>P2P</h1>
                <form>
            </div>
            <div class="row row-cols-auto">
                <div class="col-sm-2">
                    <label>Type</label>
                    <select class="form-select" aria-label=".form-select" name="Type">
                        <option selected>All</option>
                        <option value="Buy">Buy</option>
                        <option value="Sell">Sell</option>
                    </select>
                </div>
                <div class="col-sm-2"><label>Asset1</label><select class="form-select" aria-label="Default select example" name="asset1">
                        <option selected>All</option>
                        <?php while ($row1 = mysqli_fetch_array($result1)) :;
                        ?>
                            <option value="<?php echo $row1['item_code'];
                                            ?>"><?php echo $row1['item_name'];
                                                ?></option>
                        <?php endwhile;
                        ?>
                    </select></div>
                <div class="col-sm-2"><label>Asset2</label><select class="form-select" aria-label="Default select example" name="asset2">
                        <option selected>All</option>
                        <?php while ($row1 = mysqli_fetch_array($result2)) :;
                        ?>
                            <option value="<?php echo $row1['item_code'];
                                            ?>"><?php echo $row1['item_name'];
                                                ?></option>
                        <?php endwhile;
                        ?>
                    </select></div>
                <div class="col-sm-2"><label>Amount</label>
                    <div class="active-cyan-4 mb-4">
                        <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                    </div>
                </div>
                <div class="col-sm">
                    <label>Click to Filter</label> <br>
                    <button type="submit" class="btn btn-primary">Refresh</button>
                </div>
            </div>
            </form>




            <!----------------------------------------------------- create new offer ------------------------------------------>


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Create new offer
            </button>


            <!-- Modal -->
            <div class="modal fade create_offer" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create new offer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
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
                                <button type="submit" class="btn btn-primary" name="create_offer">Create offer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




            <!----------------------------------------------------- create new offer ------------------------------------------>



            <!----------------------------------------------------- create new offer ------------------------------------------>

            <?php
            //print_r($_POST);
            if (isset($_POST['create_offer'])) {

                if ((!empty($_POST['buy-sell']) && (!empty($_POST['asset'])) && (!empty($_POST['pay_with'])) &&
                    (!empty($_POST['total_asset_to_buy-sell'])) && (!empty($_POST['amount'])))) {

                    // check buy or sell
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

                    //echo $is_buy . "asset: " . $asset_id . "pay with: " . $pay_with_id . "price :" . $price_per_asset . "amount :" . $amount;
                    
                    if ($is_buy == 1) { //CREATE BUY OFFER

                        $buy_available = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(CASE when is_deposite = 1 THEN quantity ELSE -quantity END) AS balance
                                                FROM transaction_wallet WHERE wallet_id = $wallet_id AND item_id = $pay_with_id"));

                        if (($buy_available['balance'] - $price_per_asset) >= 0) {

                            //insert offer into database
                            mysqli_query($con, "INSERT INTO offer(trader_id,item_id,quantity,is_buy,pay_by_item,item_per_asset,is_active) 
                                                        VALUES ($trader_id,$asset_id,$amount,$is_buy,$pay_with_id,$price_per_asset,1) ");

                            //deduct in wallet
                            
                            //depsite in is_offer = 1
                            mysqli_query($con, "INSERT INTO transaction_wallet(wallet_id,item_id,quantity,is_deposite,is_offer) VALUES ($wallet_id,$pay_with_id,$price_per_asset*$amount,1,1) ");
                            //withdraw from availble
                            mysqli_query($con, "INSERT INTO transaction_wallet(wallet_id,item_id,quantity,is_deposite,is_offer) VALUES ($wallet_id,$pay_with_id,$price_per_asset*$amount,0,0) ");
                          	header("Refresh:0; url=p2p.php");
                        } else {
                          		//มีงินใน wallet ไมพอ
						
                            print_r("NOT ENOUGH");
                        }
                    } else { //CREATE SELL OFFER

                        $sell_available = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(CASE when is_deposite = 1 THEN quantity ELSE -quantity END) AS balance
                                                FROM transaction_wallet WHERE wallet_id = $wallet_id AND item_id = $asset_id"));

                        if (($sell_available['balance'] - $amount) >= 0) {
                            //insert offer into database
                            mysqli_query($con, "INSERT INTO offer(trader_id,item_id,quantity,is_buy,pay_by_item,item_per_asset,is_active) 
                                                        VALUES ($trader_id,$asset_id,$amount,$is_buy,$pay_with_id,$price_per_asset,1) ");

                            //deduct in wallet
                            //depsite in is_offer = 1
                            mysqli_query($con, "INSERT INTO transaction_wallet(wallet_id,item_id,quantity,is_deposite,is_offer) VALUES ($wallet_id,$asset_id,$amount,1,1) ");
                            //withdraw from availble 
                            mysqli_query($con, "INSERT INTO transaction_wallet(wallet_id,item_id,quantity,is_deposite,is_offer) VALUES ($wallet_id,$asset_id,$amount,0,0) ");
                          	header("Refresh:0; url=p2p.php");
                        } else {
								//มีขอใน wallet ไม่พอ
                          
                            print_r("NOT ENOUGH");
                        }
                    }
                } else {
                    print_r('Please select the value.');
                }
            }

            ?>


            <!----------------------------------------------------- create new offer ------------------------------------------>


            <div>
                <?php //$type = $_GET['Type']
                ?>
                <table class="table table-hover offer_table">
                    <thead>
                        <tr>
                            <th scope="col">Advertisers</th>
                            <th scope="col">Offer</th>
                            <th scope="col">Pay with</th>
                            <th scope="col">Price/Unit</th>
                            <th scope="col">Limit/available</th>
                            <th scope="col">Trade</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        while ($offerdata = mysqli_fetch_array($offersdata)) {

                            $offer_id = $offerdata['offer_id'];
                            $offer_trader_id = $offerdata['trader_id'];
                            $offer_item = $offerdata['item_id'];
                            $pay_by_item_id = $offerdata['pay_by_item'];
                            $price = $offerdata['item_per_asset'];
                            $available = $offerdata['quantity'];

                            // print_r("offer by id : " . $offer_trader_id ."item : ". $offer_item ."pay by : ". $pay_by_item_id 
                            //         ."price : ". $price ."amount : ". $available);

                            $trader_info = mysqli_fetch_array(mysqli_query($con, "SELECT first_name,last_name from trader_member where trader_id = $offer_trader_id"));
                            $item_offer_detail = mysqli_fetch_array(mysqli_query($con, "SELECT item_name,item_code,image_link FROM crypto WHERE item_id = $offer_item"));

                            $item_pay_detail = mysqli_fetch_array(mysqli_query($con, "SELECT item_name,item_code,image_link FROM crypto WHERE item_id = $pay_by_item_id"));


                            $wallet_sell_available = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(CASE when is_deposite = 1 THEN quantity ELSE -quantity END) AS balance
                                                FROM transaction_wallet WHERE wallet_id = $wallet_id AND item_id = $offer_item AND is_offer = 0"));
                            $wallet_buy_available = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(CASE when is_deposite = 1 THEN quantity ELSE -quantity END) AS balance
                                                FROM transaction_wallet WHERE wallet_id = $wallet_id AND item_id = $pay_by_item_id AND is_offer = 0 "));

                        ?>
                            <tr>
                                <td>
                                    <?php
                                    echo $trader_info['first_name'] . "   " . $trader_info['last_name'];
                                    ?>
                                </td>
                                <td><img src="<?php echo $item_offer_detail['image_link'] ?>" alt="" class="coinimage">
                                    <?php
                                    echo $item_offer_detail['item_name'];
                                    ?>
                                </td>
                                <td><img src="<?php echo $item_pay_detail['image_link'] ?>" alt="" class="coinimage">
                                    <?php
                                    echo $item_pay_detail['item_name'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo number_format($price,6) . "  " . strtoupper($item_pay_detail['item_code']);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo number_format($available,6) . "  " . strtoupper($item_offer_detail['item_code']);
                                    ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCenter<?php echo $offer_id; ?>">
                                        <?php
                                        if ($offerdata['is_buy'] == 1) {
                                            echo "Sell";
                                        } else echo "Buy";
                                        ?>
                                    </button>

                                    <!----------------------------------------------------- buy/sell form------------------------------------------>



                                    <div class="modal fade" id="ModalCenter<?php echo $offer_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                                        <?php
                                                        if ($offerdata['is_buy'] == 1) {
                                                            echo "Sell ";
                                                        } else echo "Buy ";
                                                        echo $item_offer_detail['item_name'];
                                                        ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST">
                                                    <div class="modal-body">
                                                        <div class="select_crypto">
                                                            <div class="search_select_box">
                                                                <h6>Asset</h6>
                                                                <select data-live-search="true" class="select_cur" name="asset" disabled>
                                                                    <option>
                                                                        <?php
                                                                        echo $item_offer_detail['item_name'];
                                                                        ?>
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="search_select_box">
                                                                <h6>Pay with</h6>
                                                                <select data-live-search="true" class="select_cur" name="asset" disabled>
                                                                    <option>
                                                                        <?php
                                                                        echo $item_pay_detail['item_name'];
                                                                        ?>
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="select_amount">
                                                            <h6 style="margin-top : 15px;"><?php if ($offerdata['is_buy'] == 1) {
                                                                    echo "Sell ";
                                                                } else echo "Buy "; ?>available :
                                                                <?php
                                                                echo number_format($available,6) . " " . strtoupper($item_offer_detail['item_code']);
                                                                ?></h6>
                                                            <h6>
                                                                In wallet available :
                                                                <?php
                                                                if ($offerdata['is_buy'] == 1) {
                                                                    echo number_format($wallet_sell_available['balance'], 6) . " " . strtoupper($item_offer_detail['item_code']);
                                                                } else {
                                                                    echo number_format($wallet_buy_available['balance'], 6) . " " . strtoupper($item_pay_detail['item_code']);
                                                                }
                                                                ?>
                                                            </h6>
                                                            <div class="input-group mb-3 amount_input">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="inputGroup-sizing-default">
                                                                        <?php
                                                                        if ($offerdata['is_buy'] == 1) {
                                                                            echo "Sell ";
                                                                        } else echo "Buy ";
                                                                        ?>Amount
                                                                        <?php
                                                                        echo "  (" . strtoupper($item_offer_detail['item_code']) . ")";
                                                                        ?></span>
                                                                </div>
                                                                <input name="asset_to_buy-sell<?php echo $offer_id; ?>" type="number" step="0.000001" min="0" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                                            </div>
                                                            <h6>Price/Unit :
                                                                <?php
                                                                echo number_format($price,6) . " " . strtoupper($item_pay_detail['item_code']) . "/ 1 " . strtoupper($item_offer_detail['item_code']);
                                                                ?>
                                                            </h6>
                                                            <!-- <div class="input-group mb-3 amount_input">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="inputGroup-sizing-default">Total Price</span>
                                                                </div>
                                                                <input id="total_amount" name="trans_amount" type="number" step="0.000001" min="0" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                                            </div> -->

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button name="make_transaction<?php echo $offer_id; ?>" type="submit" class="btn btn-primary">
                                                                <?php if ($offerdata['is_buy'] == 1) {
                                                                    echo "Sell";
                                                                } else echo "Buy"; ?></button>
                                                        </div>


                                                    </div>
                                                </form>
                                            </div>
                                        </div>




                                    </div>

                                    <!----------------------------------------------------- buy/sell form------------------------------------------>

                                    <?php

                                    
                                    if (isset($_POST['make_transaction'.$offer_id])) {
                                        
                                        if (!empty($_POST['asset_to_buy-sell'.$offer_id])) {

                                            $trans_amount = $_POST['asset_to_buy-sell'.$offer_id];
                                            $trans_total_price = $trans_amount * $price;



                                            if ($offerdata['is_buy'] == 1) { //Sell

                                                //check in wallet enough to sell?
                                                if (($wallet_sell_available['balance'] - $trans_amount) >= 0) {

                                                    //
                                                    if (($available - $trans_amount) >= 0) {  //check not more than available in offer

                                                        if (($available - $trans_amount) == 0) { //if buy all in offer then set is_active to 0
                                                            mysqli_query($con, "UPDATE offer SET quantity = $available - $trans_amount, is_active = 0 WHERE offer_id = $offer_id");
                                                        }

                                                        //update offer
                                                        mysqli_query($con, "UPDATE offer SET quantity = $available - $trans_amount  WHERE offer_id = $offer_id");

                                                        //deduct item that sold from seller wallet      $wallet_id = seller who click sell          $offer_item = asset
                                                        mysqli_query($con, "INSERT INTO transaction_wallet(wallet_id,item_id,quantity,is_deposite,is_offer) VALUES ($wallet_id,$offer_item,$trans_amount,0,0) ");

                                                        //add  price to seller wallet                   $pay_by_item = pay by
                                                        mysqli_query($con, "INSERT INTO transaction_wallet(wallet_id,item_id,quantity,is_deposite,is_offer) VALUES ($wallet_id,$pay_by_item_id,$trans_total_price,1,0) ");



                                                        //find buyer wallet id who make offer
                                                        $buyer_wallet_detail = mysqli_fetch_array(mysqli_query($con, "SELECT wallet_id,trader_rank FROM wallet WHERE trader_id = $offer_trader_id"));
                                                        $buyer_wallet_id = $buyer_wallet_detail['wallet_id'];
                                                        //add item to buyer wallet   $buyer_wallet_id = wallet_id who make offer/buyer
                                                        mysqli_query($con, "INSERT INTO transaction_wallet(wallet_id,item_id,quantity,is_deposite,is_offer) VALUES ($buyer_wallet_id,$offer_item,$trans_amount,1,0) ");
                                                        //depostie in_offer = 1 in transaction_wallet for buyer
                                                        mysqli_query($con, "INSERT INTO transaction_wallet(wallet_id,item_id,quantity,is_deposite,is_offer) VALUES ($buyer_wallet_id,$pay_by_item_id,$trans_total_price,0,1) ");

                                                        //insert to trade_transaction
                                                        mysqli_query($con, "INSERT INTO transaction_trade(item_id,pay_by_item,buyer_id,seller_id,quantity,price,offer_id) 
                                                                VALUES ($offer_item,$pay_by_item_id,$offer_trader_id,$trader_id,$trans_amount,$trans_total_price,$offer_id)");



                                                    } else { //ใส่จำนนเกนจำนวนใน offer
                                                        print_r("too much");
                                                    }
                                                } else {//ีของใน wallet ไ่พอขาย
                                                    print_r('not enough');
                                                }
                                            } else { //Buy

                                             
                                                if (($wallet_buy_available['balance'] - $trans_total_price) >= 0) {  //check in wallet enough to buy?

                                                    if (($available - $trans_amount) >= 0) {    //check buy amount not more than available in offer

                                                        if (($available - $trans_amount) == 0) { //if buy all in offer then set is_active to 0
                                                            mysqli_query($con, "UPDATE offer SET quantity = $available - $trans_amount, is_active = 0 WHERE offer_id = $offer_id");
                                                        }

                                                        //update offer
                                                        mysqli_query($con, "UPDATE offer SET quantity = $available - $trans_amount  WHERE offer_id = $offer_id");
                                                    
                                                        //deduct price from buyer wallet = $wallet_id
                                                        mysqli_query($con, "INSERT INTO transaction_wallet(wallet_id,item_id,quantity,is_deposite,is_offer) VALUES ($wallet_id,$pay_by_item_id,$trans_total_price,0,0) ");
                                                        
                                                        //add  item to buyer wallet                  
                                                        mysqli_query($con, "INSERT INTO transaction_wallet(wallet_id,item_id,quantity,is_deposite,is_offer) VALUES ($wallet_id,$offer_item,$trans_amount,1,0) ");


                                                        //find seller wallet id who make offer
                                                        $seller_wallet_detail = mysqli_fetch_array(mysqli_query($con, "SELECT wallet_id,trader_rank FROM wallet WHERE trader_id = $offer_trader_id"));
                                                        $seller_wallet_id = $seller_wallet_detail['wallet_id'];

                                                        //add price to seller wallet   $seller_wallet_id = wallet_id who make offer
                                                        mysqli_query($con, "INSERT INTO transaction_wallet(wallet_id,item_id,quantity,is_deposite,is_offer) VALUES ($seller_wallet_id,$pay_by_item_id,$trans_total_price,1,0) ");

                                                        //depostie in_offer = 1 in transaction_wallet for seller who make offer
                                                        mysqli_query($con, "INSERT INTO transaction_wallet(wallet_id,item_id,quantity,is_deposite,is_offer) VALUES ($seller_wallet_id,$offer_item,$trans_amount,0,1) ");

                                                        //insert to trade_transaction
                                                        mysqli_query($con, "INSERT INTO transaction_trade(item_id,pay_by_item,buyer_id,seller_id,quantity,price,offer_id) 
                                                                VALUES ($offer_item,$pay_by_item_id,$trader_id,$offer_trader_id,$trans_amount,$trans_total_price,$offer_id)");
                                                    
                                                    }else {  //ส่จำวนเกินจำนวนใน offer
                                                    print_r("too much");
                                                    }   
                                                }else {//มีเงินใน wallet ไม่พอซื้อ
                                                    print_r('not enough');
                                                }
                                                


                                            }
                                        }
                                    }

                                    ?>

                                </td>
                            </tr>
                        <?php
                        }
                        ?>







                    </tbody>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <script src="p2p.js"></script>



</body>

</html>