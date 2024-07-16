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
        
        <title>Ecommerce Website-Cart Details</title>
        
        <!-- bootstrap CSS link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
        <!-- CSS file -->
        <link rel="stylesheet" href="style.css">

        <style>
            .cart_img{
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

            <!-- fourth child-table -->
            <div class="container">
                <div class="row">
                    <form action="" method="post">
                    <table class="table table-bordered text-center">
                        
                        <tbody>
                            <!-- php for displaying dynamic data -->
                            <?php

                                global $conn;
                                $ip = getIPAddress();
                                $total_price=0;
                                $cart_query="Select * from `cart_details` where ip_address='$ip'";
                                $result_query=mysqli_query($conn,$cart_query);
                                $result_count=mysqli_num_rows($result_query);
                                if($result_count>0){
                                    echo "<thead>
                                            <tr>
                                                <th>Product Tile</th>
                                                <th>Product Image</th>
                                                <th>Quantity</th>
                                                <th>Total Price</th>
                                                <th>Remove</th>
                                                <th colspan='2'>Operations</th>
                                            </tr>
                                        </thead>";

                                while($row=mysqli_fetch_array($result_query)){
                                    $product_id=$row['product_id'];
                                    $select_product="Select * from `products` where product_id=$product_id";
                                    $result_product=mysqli_query($conn,$select_product);
                                    while($row_product_price=mysqli_fetch_array($result_product)){
                                        $product_price=array($row_product_price['product_price']);
                                        $table_price=$row_product_price['product_price'];
                                        $price_table=$row_product_price['product_price'];
                                        $product_name=$row_product_price['product_name'];
                                        $product_image=$row_product_price['product_image'];
                                        $product_value=array_sum($product_price);
                                        $total_price+=$product_value;
                                    }
                                    echo "<tr>
                                            <td>$product_name</td>
                                            <td><img src='./images/$product_image'  alt='$product_name' class='cart_img'></td>
                                            <td><input type='text' name='qty' class='form-input w-50'></td>
                                            <td>RM $table_price</td>
                                            <td><input type='checkbox' name='removeItem[]' value='$product_id'></td>
                                            <td>
                                                <input type='submit' value='Update' class='bg-info px-3 py-2 border-0 mx-3' name='update_cart'>
                                                <input type='submit' value='Remove' class='bg-info px-3 py-2 border-0 mx-3' name='remove_cart'>
                                            </td>
                                        </tr>";

                                        $ip = getIPAddress();
                                                if(isset($_POST['update_cart'])){
                                                    $quantities=$_POST['qty'];
                                                    $update_cart="update `cart_details` set quantity=$quantities where ip_address='$ip'";
                                                    $result_product_quantities=mysqli_query($conn,$update_cart);
                                                    $total_price=$total_price*$quantities;
                                                }
                                }
                                }else{
                                    echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
                                }

                            ?>
                            
                        </tbody>
                    </table>

                    <!-- subtotal -->
                    <div class="d-flex mb-3">
                        <?php

                            global $conn;
                            $ip = getIPAddress();
                            $cart_query="Select * from `cart_details` where ip_address='$ip'";
                            $result_query=mysqli_query($conn,$cart_query);
                            $result_count=mysqli_num_rows($result_query);
                            if($result_count>0){
                                echo "<h4 class='px-3'>Subtotal:<strong class='text-info'>RM$total_price</strong></h4>
                                        <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
                                        <input type='submit' value='Checkout' class='bg-secondary text-light px-3 py-2 border-0 mx-3' name='checkout_page'>";
                            }else{
                                echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
                            }

                            if(isset($_POST['continue_shopping'])){
                                echo "<script>window.open('index.php','_self')</script>";
                            }

                            if(isset($_POST['checkout_page'])){
                                echo "<script>window.open('./user_area/checkout.php','_self')</script>";
                            }

                        ?>
                        
                    </div>
                </div>
                </form>
            </div>

            <!-- function to remove items -->
            <?php

                function remove_cart_item(){
                    global $conn;
                    if(isset($_POST['remove_cart'])){
                        foreach($_POST['removeItem'] as $remove_id){
                            echo $remove_id;
                            $delete_query="Delete from `cart_details` where product_id=$remove_id";
                            $run_delete=mysqli_query($conn,$delete_query);
                            if($run_delete){
                                echo "<script>window.open('cart.php','_self')</script>";
                            }
                        }
                    }
                }

                echo $remove_item=remove_cart_item();

            ?>




            <!-- last child -->
            <div class="bg-info p-3 text-center">
                <p>SWC3433 Project-Ecommerce Website</p>
            </div>
        </div>




        <!-- bootstrap js link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>