<!-- connect file -->
<?php

include('includes/connect.php');
include('functions/common_function.php');
session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Ecommerce Website</title>
        
        <!-- bootstrap CSS link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
        <!-- CSS file -->
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <!-- navbar -->
        <div class="container-fluid p-0">
            <!-- first child --> 
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="./images/logo.png" alt="logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <!-- 
                    <li class="nav-item">
                        <a class="nav-link" href="#">Product</a>
                    </li>
                    -->
                    <?php

                        if(isset($_SESSION['username'])){
                            echo "<li class='nav-item'>
                                    <a class='nav-link' href='./user_area/profile.php'>My Account</a>
                                </li>";
                        }else{
                            echo "<li class='nav-item'>
                                    <a class='nav-link' href='./user_area/user_registration.php'>Register</a>
                                </li>";
                        }

                    ?>
                    <!--<li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"><sup>
                            <?php
                            cart_items();
                            ?>
                        </sup></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Total Price: RM<?php total_cart_price(); ?></a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="search_product.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                </form>
                </div>
            </div>
            </nav>

            <!-- calling cart function -->
            <?php

            cart();

            ?>

            <!-- second child -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
                <ul class="navbar-nav me-auto">
                    
                    <?php

                        if(!isset($_SESSION['username'])){
                            echo "<li class='nav-item'>
                                    <a class='nav-link' href='#'>Welcome Guest</a>
                                </li>";
                        }else{
                            echo "<li class='nav-item'>
                                    <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                                </li>";
                        }

                        if(!isset($_SESSION['username'])){
                            echo "<li class='nav-item'>
                                    <a class='nav-link' href='./user_area/user_login.php'>Login</a>
                                </li>";
                        }else{
                            echo "<li class='nav-item'>
                                    <a class='nav-link' href='./user_area/user_logout.php'>Logout</a>
                                </li>";
                        }

                    ?>
                </ul>
            </nav>

            <!-- third child -->
            <div class="bg-light">
                <h3 class="text-center">Happy Socks</h3>
                <p class="text-center">Happy Socks Happy Feet</p>
            </div>

            <!-- fourth child -->
            <div class="row p-2">
                <div class="col-md-10 mb-2">
                    <!-- products -->
                    <div class="row">
                        <!-- fecthing product -->
                        <?php

                        //calling function
                        search_product();
                        get_unique_category();

                        ?>
                        
                    </div>
                </div>
                <div class="col-md-2 bg-secondary p-0 text-center">
                    <!-- side nav -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item bg-info">
                            <a href="#" class="nav-link text-light"><h4>Category</h4></a>
                        </li>

                        <?php

                        //calling function
                        getcategories();

                        ?>

                    </ul>
                </div>
            </div>





            <!-- last child -->
            <div class="bg-info p-3 text-center">
                <p>SWC3433 Project-Ecommerce Website</p>
            </div>
        </div>




        <!-- bootstrap js link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>