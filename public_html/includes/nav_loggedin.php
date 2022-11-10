
<style>
    .dropdown:hover .dropdown-content {
        display: block;
    }
    
    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }
    </style>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">

            <!-- Navbar Logo-->
            <a class="navbar-brand text-white" href="https://b1n.cpe231.cpe.kmutt.ac.th/main.php">Bitnance</a>

            <!-- Navbar -->
            <div class="collapse navbar-collapse" id="navbarNav">
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white mx-1" aria-current="page" href="https://b1n.cpe231.cpe.kmutt.ac.th/main.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="https://b1n.cpe231.cpe.kmutt.ac.th/usermarket.php">Market</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../trade/p2p.php">Trade</a>
                    </li>
                </ul>
            
            <!--profile dropdown-->
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="navbarNavDarkDropdown">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown ">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../dist/img/profile.png" class="img-circle" alt="User Image" width="30" height="30">
                  </a>
                  <ul class="dropdown-content dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="../dashboard.php">Dashboard</a></li>
                    <li><a class="dropdown-item" href="../wallet/funding.php">Wallet</a></li>
                    <li><a class="dropdown-item" href="../edit_profile.php">Edit profile</a></li>
                    <li><a class="dropdown-item" href="../transactiontest.php">Trading history</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            
             
            <!--log out button-->  
            </div>
            <button class="btn btn-outline-danger btn-sm" type="button" onclick="document.location='../logout.php'">Log Out</button>
            </div>
            
    </nav>
    
    
    
    