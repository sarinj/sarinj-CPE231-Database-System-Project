<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php

// print_r($_SESSION);
// require_once '../connect.php';
if(empty($_SESSION['trader_id']) && empty($_SESSION['first_name']) && empty($_SESSION['last_name'])){
    header("location : http://b1.cpe231.cpe.kmutt.ac.th/login.php");
}
include('../includes/nav_loggedin.php');



$trader_id = $_SESSION['trader_id'];
?>

<style>
    <?php
    include("./funding.css");
    ?>
</style>

<?php

$servername = "localhost";
$username = "b1_cpe231";
$password = "123456";

$con = mysqli_connect($servername,$username,$password,'b1_bitnance');


$sql = "SELECT item_name,item_code,image_link FROM crypto";
$coinsdata= mysqli_query($con,$sql);
$coinsdata2= mysqli_query($con,$sql);


//check this trader_id have wallet_id --> 1 exist , 0 not exist
$check_wallet = mysqli_fetch_array(mysqli_query($con, "SELECT CASE WHEN EXISTS (
    SELECT *
    FROM wallet
    WHERE trader_id = $trader_id
    )
    THEN TRUE
    ELSE FALSE END AS  'wallet_exist'"));
    //echo $check_wallet['wallet_exist'];


//check exist wallet if not insert new wallet

    if($check_wallet['wallet_exist'] == 0){
        mysqli_query($con,"INSERT INTO wallet(trader_id,trader_rank) VALUES ($trader_id,'Silver')");
    }


//query wallet_id from trader_id
$wallet_detail = mysqli_fetch_array(mysqli_query($con,"SELECT wallet_id,trader_rank FROM wallet WHERE trader_id = $trader_id"));
$wallet_id = $wallet_detail['wallet_id'];

    

?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <title>Wallet | Bitnance</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


</head>

<body>
    <div class="container">
        <div class="funding_title">
            <h2>Deposite-Withdraw</h2>
        </div>
       <div class="dep-wit_box">
            <div class="title_selectcurrency">
                <h6>Select Currency</h6>
            </div>
            <form method="POST">
                <div class="selectcurrency_amount">
                    <div class="search_select_box">
                        <select data-live-search="true" class="select_cur" name="currency">
                            <!--<option>Cash</option>-->
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
                    <div class="input-group mb-3 amount_input">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Amount</span>
                        </div>
                        <input name="amount"type="number" step="0.000001" min="0" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="dep-wit_button">
                        <button type="submit" class="btn btn-outline-success" name="deposite">Deposite</button>
                        <button type="submit" class="btn btn-outline-danger" name="withdraw">Withdraw</button>
                    </div>

                </div>
            </form>
            
            <!--*****************************DEPOSITE*****************************-->
            
            
            <?php
            if (isset($_POST['deposite'])) {
                if ((!empty($_POST['currency'])) && (!empty($_POST['amount']))) {
                    // check deposite cash or crypto
                    if ($_POST['currency'] != 'cash') {

                        $selected_currency = $_POST['currency'];
                        $amount = $_POST['amount'];

                        $item_info = mysqli_fetch_array(mysqli_query($con, "SELECT item_id FROM crypto WHERE item_code = '$selected_currency'"));
                        $item_id = $item_info['item_id'];
                        $wallet_id = $wallet_detail['wallet_id'];
                        //print_r("DEP   Wallet_id :" . $wallet_id . "  Item_id : " . $item_id . " Amount : " . $amount);



                        mysqli_query($con,"INSERT INTO transaction_wallet(wallet_id,item_id,quantity,is_deposite,is_offer) VALUES ($wallet_id,$item_id,$amount,1,0) ");


                    }//cash Deposite
                    
                    
                } else {
                    print_r('Please select the value.');
                }
            }

            
            
            ?>


            <!--*****************************DEPOSITE*****************************-->
            
            
            
            
            <!--*****************************WITHDRAW*****************************-->
            <?php
                if (isset($_POST['withdraw'])) {
                    if ((!empty($_POST['currency'])) && (!empty($_POST['amount']))) {
                        if ($_POST['currency'] != 'cash') {
                            $selected_currency = $_POST['currency'];
                            $amount = $_POST['amount'];
                            $item_info = mysqli_fetch_array(mysqli_query($con, "SELECT item_id FROM crypto WHERE item_code = '$selected_currency'"));
                            $item_id = $item_info['item_id'];
                            $wallet_id = $wallet_detail['wallet_id'];
                            
                            //check current availble amont
                            $available = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(CASE when is_offer = 0 AND is_deposite = 1 THEN quantity ELSE -quantity END) AS balance
                                                FROM transaction_wallet WHERE wallet_id = $wallet_id AND item_id = $item_id"));
                            if(($available['balance'] - $amount) >= 0){
                                
                                mysqli_query($con,"INSERT INTO transaction_wallet(wallet_id,item_id,quantity,is_deposite,is_offer) VALUES ($wallet_id,$item_id,$amount,0,0) ");
                                
                
                            }else{
                                
                                echo "not enough item";
                            
                                
                            }
                        
                        
                        }//cash Withdraw
                        
                        
                    } else {
                    print_r('Please select the value.');
                    }
                }
            ?>
            <!--*****************************WITHDRAW*****************************-->
            


        </div>
        <div class="mywallet_title">
            <h2>My Wallet</h2>
        </div>
        <div class="wallet_all_item">
            <div class="wallet_header">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        hide not own coins
                    </label>
                </div>
                <h5 class ="wallet_detail"><?php echo "Wallet ID : " . $wallet_detail['wallet_id']?></h5>
                <h5 class ="wallet_detail"><?php echo "Tier : ". $wallet_detail['trader_rank'] ?></h5>
                <!--<div class="cash_balance">-->
                <!--    <img style="margin-right :10px; margin-bottom:5px;  width:65px; -->
                <!--    " src="https://cdn.discordapp.com/attachments/899302334289563668/969615076967448586/Cash_icon.jpg">-->
                <!--    <h5>Cash Balance : 10000$</h5>-->
                </div>
            </div>
            <div class="itemlist_table">
                <table class="table table-hover wallet_table">
                    <thead>
                        <tr>
                            <th scope="col">Coin Name</th>
                            <th scope="col">Total Balance</th>
                            <th scope="col">Available Balance</th>
                            <th scope="col">In Offer</th>

                        </tr>
                    </thead>
                    <tbody><?php

                               while ($coindata = mysqli_fetch_array($coinsdata2)){ 
                               
                                $item_code = $coindata['item_code'];
                                $item_info = mysqli_fetch_array(mysqli_query($con, "SELECT item_id FROM crypto WHERE item_code = '$item_code'"));
                                $item_id = $item_info['item_id'];
                                $available = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(CASE when is_deposite = 1 THEN quantity ELSE -quantity END) AS balance
                                                FROM transaction_wallet WHERE wallet_id = $wallet_id AND item_id = $item_id"));
                               
                                $in_offer = mysqli_fetch_array(mysqli_query($con,"SELECT SUM(CASE when is_offer = 1 AND is_deposite = 0 THEN quantity  END) AS balance
                                                FROM transaction_wallet WHERE wallet_id = $wallet_id AND item_id = $item_id"));
                               
                                $total_balance = $available['balance'] + $in_offer['balance'];
                               
                               ?>
                                     
                                <tr>
                        
                                    <td class="coindetail"><img src="<?php echo $coindata['image_link'] ?>" alt="" class="coinimage">
                                        <?php echo $coindata['item_name'] . "<font color='#707A8A'>(" . strtoupper($coindata['item_code']) . ")</font>" ?>
                                    </td>
                                    <td style="width:20%">
                                    <?php

                                        if(($total_balance != 0)){
                                            echo number_format($total_balance,6);
                                        }else{echo "-";}
                                        
                                     ?>
                                    </td>
                                    <td style="width:25%">
                                     <?php

                                        if(($available['balance'] != 0)){
                                            echo number_format($available['balance'],6);
                                        }else{echo "-";}
                                        
                                     ?>
                                    </td>
                                    <td style="width:25%">
                                        <?php

                                        if(($in_offer['balance'] != 0)){
                                            echo number_format($in_offer['balance'],6);
                                        }else{echo "-";}
                                        
                                     ?>
                                    </td>

                                </tr>
                        <?php
                                }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php mysqli_close($con);?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="funding.js"></script>

</body>
</html>