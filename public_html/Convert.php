<!DOCTYPE html>
<html>
<title>Bitnance Convert</title>
<head>
    <!-- Bootstrap core CSS -->
    <link href="C:/Users/user/Downloads/Bootstrap/bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">

    <link href="StyleConvert.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="cp.js"></script>

    <div class="p-3 bg-black text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-white">Home</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Markets</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                </ul>
                <div class="text-end">
                    <button type="button" class="btn btn-outline-light me-2">Login</button>
                    <button type="button" class="btn btn-warning">Sign-up</button>
                </div>
            </div>
        </div>
    </div>
</head>

<body class="imgweb">
    <div class="headconvert"> 
      <h3>Convert & OTC Portal</h3>
      Zero fee
      No slippage
      More cross pairs
    </div>
    <div class="bgbody">
        <div class="flex-containe">
        <div class="marketlibuttom">
            <button type="button" class="btn btn-warning text-dark">Market</button>
            <button type="button" class="btn btn-light">Limit</button>
        </div>
        <div class="orderbuttom">
            <button type="button" class="btn btn-outline-dark p-end">Orders</button>
        </div>
        </div>
        <form class="cenbuttom">
            <div class="fromc">
                <label for="fname">Form</label>
            </div>
            <input type="text" id="fname" name="firstname" placeholder="Your name..">
            <div class="fromc">
                <label for="lname">To</label>
            </div>
            <input type="text" id="lname" name="lastname" placeholder="Your last name..">

            <input type="submit" value="Submit">
        </form>
    </div>
    <div class="search_select_box">
                        <select data-live-search="true" class="select_cur" name="currency">
                            <option>
                                1234
                            </option>
                        </select>
                    </div>
    <footer class="mt-auto text-black-50">
      
    </footer>
  </div>   
</body>

</html>