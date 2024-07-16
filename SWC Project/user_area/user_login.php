<!-- connect file -->
<?php

include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS file -->
    <link rel="stylesheet" href="style.css">

    <style>
        .logo{
            width: 5%;
            height: 5%;
        }
    </style>

</head>
<body>
    <!-- navbar 
    <div class="container-fluid p-0">-->
            <!-- first child 
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>--> 
                        <!-- 
                        <li class="nav-item">
                            <a class="nav-link" href="#">Product</a>
                        </li>
                        -->
                        <!--
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        
                    </ul> -->
                    <!--
                    <form class="d-flex" role="search" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                    
                </div>
            </div>
            </nav>-->

            <!-- second child 
            <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Welcome Guest</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_login.php">Login</a>
                    </li>
                </ul>
            </nav>-->


            <!-- third child 
            <div class="bg-light">
                <h3 class="text-center">Happy Socks</h3>
                <p class="text-center">Happy Socks Happy Feet</p>
            </div>-->


            <div class="container-fluid my-3">
                <h2 class="text-center">User Login</h2>
                <div class="row d-flex aligns-item-center justify-content-center mt-5">
                    <div class="col-lg-12 col-xl-6">
                        <form action="" method="post" enctype="multipart/form-data">
                            <!-- username filed -->
                            <div class="form-outline mb-4">
                                <label for="user_username" class="form-label">Username</label>
                                <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
                            </div>
                            <!-- password filed -->
                            <div class="form-outline mb-4">
                                <label for="user_password" class="form-label">Password</label>
                                <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
                            </div>
                            <div class="text-center mt-4 pt-2">
                                <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                                <p class="mt-2 pt-2 fw-bold small">Don't have an account?<a href="user_registration.php"> Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- last child 
            <div class="bg-info p-3 text-center">
                <p>SWC3433 Project-Ecommerce Website</p>
            </div>

    </div>-->
</body>
</html>

<?php

    if(isset($_POST['user_login'])){
        echo login_user();
    }

?>