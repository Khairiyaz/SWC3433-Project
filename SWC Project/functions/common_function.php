<?php

    //include connect file 
    //include('./includes/connect.php');
    


    //getting product
    function getproducts(){
        global $conn;
        //condition if isset
        if(!isset($_GET['category'])){
        $select_query="Select * from `products` order by rand()";
                        $result_query=mysqli_query($conn,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $product_id=$row['product_id'];
                            $product_name=$row['product_name'];
                            $product_description=$row['product_description'];
                            $product_image=$row['product_image'];
                            $product_price=$row['product_price'];
                            $category_id=$row['category_id'];
                            echo "<div class='col-md-4 mb-3'>
                                    <div class='card'>
                                        <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_name'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>$product_name</h5>
                                            <p class='card-text'>$product_description</p>
                                            <p class='card-text'>RM$product_price</p>
                                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                        </div>
                                    </div>
                                </div>";
                        }
    }
    }

    //display categories
    function getcategories(){
        global $conn;
        $select_category="Select * from `categories`";
                        $result_category=mysqli_query($conn,$select_category);
                        while($row_data=mysqli_fetch_assoc($result_category)){
                            $category_title=$row_data['category_title'];
                            $category_id=$row_data['category_id'];
                            echo "<li class='nav-item'><a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a></li>";
                        }
    }


    function get_unique_category(){
        global $conn;
        //condition if isset
        if(isset($_GET['category'])){
            $category_id=$_GET['category'];
            $select_query="Select * from `products` where category_id=$category_id";
                            $result_query=mysqli_query($conn,$select_query);
                            $num_of_rows=mysqli_num_rows($result_query);
                            if($num_of_rows==0){
                                echo "<h2 class='text-center text-danger'>No Stock For This Categories</h2>";
                            }
                            while($row=mysqli_fetch_assoc($result_query)){
                                $product_id=$row['product_id'];
                                $product_name=$row['product_name'];
                                $product_description=$row['product_description'];
                                $product_image=$row['product_image'];
                                $product_price=$row['product_price'];
                                $category_id=$row['category_id'];
                                echo "<div class='col-md-4 mb-3'>
                                        <div class='card'>
                                            <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_name'>
                                            <div class='card-body'>
                                                <h5 class='card-title'>$product_name</h5>
                                                <p class='card-text'>$product_description</p>
                                                <p class='card-text'>RM$product_price</p>
                                                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>";
                            }
        }
    }


    //searh product function
    function search_product(){
        global $conn;
        if(isset($_GET['search_data_product'])){
            $search_data_value=$_GET['search_data'];
            $search_query="Select * from `products` where product_keyword like '%$search_data_value%'";
                            $result_query=mysqli_query($conn,$search_query);
                            $num_of_rows=mysqli_num_rows($result_query);
                            if($num_of_rows==0){
                                echo "<h2 class='text-center text-danger'>No Result Match. No Product Found!!!</h2>";
                            }
                            while($row=mysqli_fetch_assoc($result_query)){
                                $product_id=$row['product_id'];
                                $product_name=$row['product_name'];
                                $product_description=$row['product_description'];
                                $product_image=$row['product_image'];
                                $product_price=$row['product_price'];
                                $category_id=$row['category_id'];
                                echo "<div class='col-md-4 mb-3'>
                                        <div class='card'>
                                            <img src='./admin_area/product_images/$product_image' class='card-img-top' alt='$product_name'>
                                            <div class='card-body'>
                                                <h5 class='card-title'>$product_name</h5>
                                                <p class='card-text'>$product_description</p>
                                                <p class='card-text'>RM$product_price</p>
                                                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>";
                            }
        }
    }


    //get ip address function
    function getIPAddress() {  
        //whether ip is from the share internet  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }  
    //whether ip is from the remote address  
        else{  
            $ip = $_SERVER['REMOTE_ADDR'];  
        }  
        return $ip;  
    }  
    //$ip = getIPAddress();  
    //echo 'User Real IP Address - '.$ip;  


    //cart function
    function cart(){
        if(isset($_GET['add_to_cart'])){
            global $conn;
            $ip = getIPAddress();
            $get_product_id=$_GET['add_to_cart'];
            $select_query="Select * from `cart_details` where ip_address='$ip' and product_id=$get_product_id";
            $result_query=mysqli_query($conn,$select_query);
            $num_of_rows=mysqli_num_rows($result_query);
                            if($num_of_rows>0){
                                echo "<script>alert('This item already present inside the cart')</script>";
                                echo "<script>window.open('index.php', '_self')</script>";
                            }else{
                                $insert_query="Insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id, '$ip', 0)";
                                $result_query=mysqli_query($conn,$insert_query);
                                echo "<script>alert('The item is added to the cart')</script>";
                                echo "<script>window.open('index.php', '_self')</script>";
                            }
        }
    }

    //function to get items cart numbers
    function cart_items(){
        if(isset($_GET['add_to_cart'])){
            global $conn;
            $ip = getIPAddress();
            $select_query="Select * from `cart_details` where ip_address='$ip'";
            $result_query=mysqli_query($conn,$select_query);
            $count_cart_items=mysqli_num_rows($result_query);
                            }else{
                                global $conn;
                                $ip = getIPAddress();
                                $select_query="Select * from `cart_details` where ip_address='$ip'";
                                $result_query=mysqli_query($conn,$select_query);
                                $count_cart_items=mysqli_num_rows($result_query);
                            }
                            echo $count_cart_items;
    }

    //total price function
    function total_cart_price(){
        global $conn;
        $ip = getIPAddress();
        $total_price=0;
        $cart_query="Select * from `cart_details` where ip_address='$ip'";
        $result_query=mysqli_query($conn,$cart_query);
        while($row=mysqli_fetch_array($result_query)){
            $product_id=$row['product_id'];
            $select_product="Select * from `products` where product_id=$product_id";
            $result_product=mysqli_query($conn,$select_product);
            while($row_product_price=mysqli_fetch_array($result_product)){
                $product_price=array($row_product_price['product_price']);
                $product_value=array_sum($product_price);
                $total_price+=$product_value;
            }
        }
        echo $total_price;
    }

    //user registration
    function register_user(){
        if(isset($_POST['user_register'])){
            global $conn;
            $user_username=$_POST['user_username'];
            $user_email=$_POST['user_email'];
            $user_image=$_FILES['user_image']['name'];
            $user_image_tmp=$_FILES['user_image']['tmp_name'];
            $user_password=$_POST['user_password'];
            $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
            $conf_user_password=$_POST['conf_user_password'];
            $user_address=$_POST['user_address'];
            $user_contact=$_POST['user_contact'];
            $user_ip=getIPAddress();

            //select query
            $select_query="Select * from `user_table` where username='$user_username'";
            $result=mysqli_query($conn,$select_query);
            $rows_count=mysqli_num_rows($result);
            if($rows_count>0){
                echo "<script>alert('This username is already exist')</script>";
            }elseif($user_password!=$conf_user_password){
                echo "<script>alert('Password do not match')</script>";
            }else{
                //insert query
                move_uploaded_file($user_image_tmp,"../user_area/user_images/$user_image");
                $insert_query="Insert into `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_mobile)
                values ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
                $sql_execute=mysqli_query($conn,$insert_query);
                if($sql_execute){
                    echo "<script>alert('User has been registered succesfully')</script>";
                    echo "<script>window.open('../index.php','_self')</script>";
                }else{
                    die(mysqli__error($conn));
                }
            }

            
        }

        //selecting cart items
        $select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
        $result_cart=mysqli_query($conn,$select_cart_items);
        $rows_count=mysqli_num_rows($result_cart);
        if($rows_count>0){
            $_SESSION['username']=$user_username;
            echo "<script>alert('You have items in your cart')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }else{
            echo "<script>window.open('./index.php','_self')</script>";
        }
    }

    //user login
    function login_user(){
        if(isset($_POST['user_login'])){
            global $conn;
            $user_username=$_POST['user_username'];
            $user_password=$_POST['user_password'];
            $user_ip=getIPAddress();
            
            //select query
            $select_query="Select * from `user_table` where username='$user_username'";
            $result_query=mysqli_query($conn,$select_query);
            $rows_count=mysqli_num_rows($result_query);
            $rows_data=mysqli_fetch_assoc($result_query);

            //cart items
            $select_query_cart="Select * from `cart_details` where ip_address='$user_ip'";
            $select_cart=mysqli_query($conn,$select_query_cart);
            $rows_count_cart=mysqli_num_rows($select_cart);

            if($rows_count>0){
                $_SESSION['username']=$user_username;
                if(password_verify($user_password,$rows_data['user_password'])){
                    //echo "<script>alert('Login succesfully')</script>";
                    if($rows_count==1 and $rows_count_cart==0){
                        $_SESSION['username']=$user_username;
                        echo "<script>alert('Login succesfully')</script>";
                        echo "<script>window.open('../user_area/profile.php','_self')</script>";
                    }else{
                        $_SESSION['username']=$user_username;
                        echo "<script>alert('Login succesfully')</script>";
                        echo "<script>window.open('../user_area/checkout.php','_self')</script>";
                    }
                }else{
                    echo "<script>alert('Invalid Credentials')</script>";
                }
            }else{
                echo "<script>alert('Invalid Credentials')</script>";
            }

        }
    }


    //get user order details
    function get_user_order_details(){
        global $conn;
        $username=$_SESSION['username'];
        $get_details="Select * from `user_table` where username='$username'";
        $result_query=mysqli_query($conn,$get_details);
        while($row_query=mysqli_fetch_array($result_query)){
            $user_id=$row_query['user_id'];
            if(!isset($_GET['edit_account'])){
                if(!isset($_GET['my_orders'])){
                    if(!isset($_GET['delete_account'])){
                        $get_order="Select * from `user_orders` where user_id=$user_id and order_status='pending'";
                        $result_orders_query=mysqli_query($conn,$get_order);
                        $row_count=mysqli_num_rows($result_orders_query);
                        if($row_count>0){
                            echo "<h3 class='text-center text-success my-5'>You have <span class='text-danger'>$row_count</span> pending orders</h3>";
                            echo "<p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                        }else{
                            echo "<h3 class='text-center text-success my-5'>You have zero pending orders</h3>";
                            echo "<p class='text-center'><a href='../index.php' class='text-dark'>Explore More Products</a></p>";
                        }
                    }
                }
            }
        }
    }

?>