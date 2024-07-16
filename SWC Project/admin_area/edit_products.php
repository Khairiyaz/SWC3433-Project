<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Edit Products</title>

    <style>
        .product_image{
                width: 30%;
                height: 30%;
                object-fit: contain;
            }
    </style>
</head>
<body>
    <?php

        if(isset($_GET['edit_products']));{
            $edit_id=$_GET['edit_products'];
            $get_data="Select * from `products` where product_id=$edit_id";
            $result=mysqli_query($conn,$get_data);
            $row=mysqli_fetch_assoc($result);
            $product_name=$row['product_name'];
            $product_description=$row['product_description'];
            $product_keyword=$row['product_keyword'];
            $category_id=$row['category_id'];
            $product_image=$row['product_image'];
            $product_price=$row['product_price'];

            //fecthing category
            $select_category="Select * from `categories` where category_id=$category_id";
            $result_category=mysqli_query($conn,$select_category);
            $row_category=mysqli_fetch_assoc($result_category);
            $category_title=$row_category['category_title'];

            
        }

    ?>

    <div class="container mt-3">
        <h1 class="text-center mb-5">Edit Product</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" id="product_name" value="<?php echo $product_name ?>" class="form-control" name="product_name" required="required"> 
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_description" class="form-label">Product Description</label>
                <input type="text" id="product_description" value="<?php echo $product_description ?>" class="form-control" name="product_description" required="required"> 
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" id="product_keyword" value="<?php echo $product_keyword ?>" class="form-control" name="product_keyword" required="required"> 
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_category" class="form-label">Product Category</label>
                <select name="product_category" id="product_category" class="form-select">
                    <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
                    <?php

                        $select_category_all="Select * from `categories`";
                        $result_category_all=mysqli_query($conn,$select_category_all);
                        while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                            $category_title=$row_category_all['category_title'];
                            $category_id=$row_category_all['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                        

                    ?>
                    
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image" class="form-label">Product Image</label>
                <div class="d-flex">
                    <input type="file" id="product_image" class="form-control" name="product_image" required="required"> 
                    <img src="./product_images/<?php echo $product_image?>" alt="Bamboo Socks" class="product_image">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" id="product_price" value="<?php echo $product_price ?>" class="form-control" name="product_price" required="required"> 
            </div>
            <div class="text-center">
                <input type="submit" name="edit_product" value="Update Product" class="btn btn-info px-3 mb-3">
            </div>
        </form>
    </div>
</body>
</html>

<?php

    //editing product
    if(isset($_POST['edit_product'])){
        $product_name=$_POST['product_name'];
        $product_description=$_POST['product_description'];
        $product_keyword=$_POST['product_keyword'];
        $product_category=$_POST['product_category'];        
        $product_price=$_POST['product_price'];

        $product_image=$_FILES['product_image']['name'];
        $product_image_tmp=$_FILES['product_image']['tmp_name'];
        move_uploaded_file($product_image_tmp,"./product_images/$product_image");

        //query to update products
        $update_product="Update `products` set product_name='$product_name', product_description='$product_description', 
        product_keyword='$product_keyword', category_id=$category_id, product_image='$product_image', product_price=$product_price, date=NOW()
        where product_id=$edit_id";
        $result_update=mysqli_query($conn,$update_product);
        if($result_update){
            echo "<script>alert('Product has been updated successfully')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
        }

    }

?>