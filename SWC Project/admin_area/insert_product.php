<!-- connect file -->
<?php

include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_name=$_POST['product_name'];
    $product_description=$_POST['product_description'];
    $product_keyword=$_POST['product_keyword'];
    $product_categories=$_POST['product_categories'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    //accessing image
    $product_image=$_FILES['product_image']['name'];

    //accessing image tmp name
    $tmp_image=$_FILES['product_image']['tmp_name'];

    //checking empty condition
    if($product_name=='' or $product_description=='' or $product_categories=='' or $product_image=='' or $product_keyword=='' or $product_price==''){
        echo "<script>alert('Please fill all the fields')</script>";
        exit();
    }else{
        move_uploaded_file($tmp_image, "./product_images/$product_image");

        //insert query
        $insert_product="insert into `products` (product_name, product_description, product_keyword, category_id, product_image, product_price, date, status)
        values ('$product_name', '$product_description', '$product_keyword', '$product_categories', '$product_image', '$product_price', NOW(), '$product_status')";

        $result_query=mysqli_query($conn,$insert_product);
        if($result_query){
            echo "<script>alert('Product has been inserted successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />        

    <!-- CSS file -->
    <link rel="stylesheet" href="../style.css">    
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>

        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- product name -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Product Name" autocomplete="off" required="required">
            </div>

            <!-- product description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
            </div>

            <!-- product keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter Product Keyword" autocomplete="off" required="required">
            </div>

            <!-- product categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_categories" id="" class="form-select">
                    <option value="">Select Categories</option>
                    <?php

                        $select_query="Select * from `categories`";
                        $result_query=mysqli_query($conn,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }

                    ?>
                </select>
            </div>

            <!-- product image -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image" class="form-label">Product Image</label>
                <input type="file" name="product_image" id="product_image" class="form-control" required="required">
            </div>

            <!-- product Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
            </div>

            <!-- Insert Product -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
            </div>
        </form>
    </div>
    
</body>
</html>