<!-- connect file -->
<?php

include('../includes/connect.php');
include('../functions/common_function.php');
//session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Admin Dashboard</title>
        
        <!-- bootstrap CSS link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />        

        <!-- CSS file -->
        <link rel="stylesheet" href="../style.css">

        <style>
            .user_image{
                width: 100px;
                height: 100px;
                object-fit: contain;
            }
        </style>
    </head>
    <body>
        <!-- navbar -->
        <div class="container-fluid p-0">
            <!-- first child -->
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                <div class="container-fluid">
                    <img src="../images/logo.png" alt="Logo" class="logo">
                    <nav class="navbar navbar-expand-lg">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <!--<a href="" class="nav-link">Welcome Guest</a>-->
                            </li>
                        </ul>
                    </nav>
                </div>
            </nav>

            <!-- second child -->
            <div class="bg-light">
                <h3 class="text-center p-2">Manage Details</h3>
            </div>

            <!-- third child -->
            <div class="row p-2">
                <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                    <div class="p-3">
                        <a href="index.php"><img src="../images/adminImage.jpg" alt="Admin Image" class="admin_image"></a>
                        <p class="text-light text-center">Admin</p>
                    </div>
                    <div class="button text-center m-auto">
                        <button class="px-2 bg-info"><a href="index.php?insert_product" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                        <button class="px-2 bg-info"><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                        <button class="px-2 bg-info"><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
                        <button class="px-2 bg-info"><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payments</a></button>
                        <button class="px-2 bg-info"><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List Users</a></button>
                        <!--<button class="px-2 bg-info"><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>-->
                    </div>
                </div>
            </div>

            <!-- fourth child -->
            <div class="container my-3">
                <?php

                    if(isset($_GET['insert_product'])){
                        include('insert_product.php');
                    }
                    if(isset($_GET['view_products'])){
                        include('view_products.php');
                    }
                    if(isset($_GET['edit_products'])){
                        include('edit_products.php');
                    }
                    if(isset($_GET['delete_products'])){
                        include('delete_products.php');
                    }
                    if(isset($_GET['list_orders'])){
                        include('list_orders.php');
                    }
                    if(isset($_GET['list_payments'])){
                        include('list_payments.php');
                    }
                    if(isset($_GET['list_users'])){
                        include('list_users.php');
                    }

                ?>
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