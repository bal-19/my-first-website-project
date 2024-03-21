
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mondo Store</title>
    <link rel="icon" type="image/x-icon" href="image/Icon.jpg">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <!-- <div class="container-fluid">
        <div class="row top">
            <center>
                <div class="col-md-4" style="padding: 3px;">
                    <span>
                        <i class="glyphicon glyphicon-earphone"></i> +6287856754195
                    </span>
                </div>
                <div class="col-md-4" style="padding: 3px;">
                    <span>
                        <i class="glyphicon glyphicon-envelope"></i> mondostore@gmail.com
                    </span>
                </div>
                <div class="col-md-4" style="padding: 3px;">
                    <span>
                        Mondo Store Indonesia
                    </span>
                </div>
            </center>
        </div>
    </div> -->
    <nav class="navbar navbar-default" style="padding: 5px;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="color: #2341d6"><b>MONDO STORE</b></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li>
                        <a href="keranjang.php"><i class='glyphicon glyphicon-shopping-cart'></i> Cart</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="glyphicon glyphicon-user"></i>
                            <?php
                                if (isset($_SESSION['username'])) {
                                    $username = $_SESSION['username'];
                                    echo $username;
                                } else {
                                    echo "Account";
                                }
                            ?>
                            
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">

                            <?php
                                if (isset($_SESSION['username'])) {
                                    echo "<li><a href='user_logout.php'>Logout</a></li>";
                                } else {
                                    echo 
                                    "<li><a href='user_login.php'>Login</a></li>
                                    <li><a href='register.php'>Register</a></li>";
                                }
                            ?>

                            <!-- <li><a href="user_login.php">Login</a></li>
                            <li><a href="register.php">Register     </a></li> -->
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>