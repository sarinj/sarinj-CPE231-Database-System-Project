<?php 

    session_start();
    require_once 'connect.php';
    include('./includes/nav_loggedin.php');

?>

<?php require_once('includes/footer.php')?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style><?php include './market.css'; ?></style>

    <?php
    $ch = curl_init();
    $url = "https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=250&page=1&sparkline=false";

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resp = curl_exec($ch);
    if ($e = curl_error($ch)) {
        echo $e;
    } else {
        $coinsdata = json_decode($resp, true);
    }

    curl_close($ch);


    function shortNumber($num)
    {
        $units = ['', 'K', 'M', 'B', 'T'];
        for ($i = 0; $num >= 1000; $i++) {
            $num /= 1000;
        }
        return round($num, 1) . $units[$i];
    }
    



    ?>

    <title>Market | Bitnance</title>
</head>

<body>

    <body>
    
    <!--<nav class="navbar navbar-expand-lg navbar-light bg-dark">-->
    <!--    <div class="container-fluid">-->

            <!-- Navbar Logo-->
    <!--        <a class="navbar-brand text-white" href="https://b1.cpe231.cpe.kmutt.ac.th/main.php">Bitnance</a>-->

            <!-- Navbar -->
    <!--        <div class="collapse navbar-collapse" id="navbarNav">-->
    <!--            <ul class="navbar-nav">-->
    <!--                <li class="nav-item">-->
    <!--                    <a class="nav-link active text-white mx-1" aria-current="page" href="https://b1.cpe231.cpe.kmutt.ac.th/main.php">Home</a>-->
    <!--                </li>-->
    <!--                <li class="nav-item">-->
    <!--                    <a class="nav-link text-white" href="https://b1.cpe231.cpe.kmutt.ac.th/market.php">Market</a>-->
    <!--                </li>-->
    <!--            </ul>-->
    <!--        </div>-->
    <!--        <button class="btn btn-outline-danger btn-sm" type="button" onclick="document.location='logout.php'">Log Out</button>-->
    <!--    </div>-->
    <!--</nav>-->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
    <div class="market_trend">
        <div class="table_container">
            <div class="market_trend_header">
                <h2>Market</h2>
            </div>
            <div class = "marketscrolltable">
                <table class="table table-hover market_table">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Last Price</th>
                            <th scope="col">24h Change</th>
                            <th scope="col">24h High</th>
                            <th scope="col">Market Cap</th>
                        </tr>
                    </thead>
                    <tbody><?php
                            if (count($coinsdata) != 0) {
                                foreach ($coinsdata as $coindata) { ?>

                                <tr>
                                    <td><img src="<?php echo $coindata['image'] ?>" alt="" class="coinimage"></td>
                                    <td><?php echo "<font color='#707A8A'>". $coindata['symbol'] . "</font>"; ?></td>
                                    <td><?php echo $coindata['name'] ?></td>
                                    <td><?php echo "$" . number_format($coindata['current_price'],5) ?></td>
                                    <td class = "price_change_percent"><?php 
                                        if($coindata['price_change_percentage_24h'] < 0){
                                            echo "<font color='#ff4747'> ". number_format($coindata['price_change_percentage_24h'],2) . "%" . "</font>";
                                        }else
                                            echo "<font color='#03A66D'> "."+". number_format($coindata['price_change_percentage_24h'],2) . "%" . "</font>"; ?></td>
                                    <td><?php echo "$" . number_format($coindata['high_24h'],5) ?></td>
                                    <td><?php echo "$" . shortNumber($coindata['market_cap']) ?></td>
                                </tr>
                        <?php
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