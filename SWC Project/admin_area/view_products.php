<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-View Products</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />        

        <!-- CSS file -->
        <link rel="stylesheet" href="../style.css">

        <style>
            .product_img{
                width: 100px;
                height: 100px;
                object-fit: contain;
            }
        </style>
</head>
<body>
    <h3 class="text-center text-success">All Products</h3>
    <table class="table table-bordered mt-5">
        <thead>
            <tr class="text-center">
                <th class="bg-info">Product ID</th>
                <th class="bg-info">Product Name</th>
                <th class="bg-info">Product Image</th>
                <th class="bg-info">Product Price</th>
                <th class="bg-info">Total Sold</th>
                <th class="bg-info">Status</th>
                <th class="bg-info">Edit</th>
                <th class="bg-info">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $get_products="Select * from `products`";
                $result=mysqli_query($conn,$get_products);
                while($row=mysqli_fetch_assoc($result)){
                    $product_id=$row['product_id'];
                    $product_name=$row['product_name'];
                    $product_image=$row['product_image'];
                    $product_price=$row['product_price'];
                    $status=$row['status'];

                    //get total sold
                    $get_count="Select * from `orders_pending` where product_id=$product_id";
                    $result_count=mysqli_query($conn,$get_count);
                    $row_count=mysqli_num_rows($result_count);


                    echo "<tr class='text-center'>
                            <td class='bg-secondary text-light'>$product_id</td>
                            <td class='bg-secondary text-light'>$product_name</td>
                            <td class='bg-secondary text-light'><img src='./product_images/$product_image' class='product_img'></td>
                            <td class='bg-secondary text-light'>$product_price</td>
                            <td class='bg-secondary text-light'>$row_count</td>
                            <td class='bg-secondary text-light'>$status</td>
                            <td class='bg-secondary'><a href='index.php?edit_products=$product_id' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                            <td class='bg-secondary'><a href='index.php?delete_products=$product_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>";
                }

            ?>
            
        </tbody>
    </table>

    
</body>
</html>