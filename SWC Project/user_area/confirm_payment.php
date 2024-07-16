<!-- connect file -->
<?php

    include('../includes/connect.php');
    include('../functions/common_function.php');
    session_start();

    if(isset($_GET['order_id'])){
        $order_id=$_GET['order_id'];
        $select_data="Select * from `user_orders` where order_id=$order_id";
        $result=mysqli_query($conn,$select_data);
        $row_fetch=mysqli_fetch_assoc($result);
        $invoice_number=$row_fetch['invoice_number'];
        $amount_due=$row_fetch['amount_due'];

    }

    if(isset($_POST['confirm_payment'])){
        $invoice_number=$_POST['invoice_number'];
        $amount=$_POST['amount'];
        $payment_type=$_POST['payment_type'];
        $insert_query="Insert into `user_payments` (order_id, invoice_number, amount, payment_type, date) 
        values ($order_id, $invoice_number, $amount, '$payment_type', NOW())";
        $result_query=mysqli_query($conn,$insert_query);
        if($result_query){
            echo "<script>alert('Payment has been made successfully')</script>";
            echo "<script>window.open('profile.php?my_orders','_self')</script>";
        }

        $update_orders="Update `user_orders` set order_status='Complete' where order_id=$order_id";
        $result_orders=mysqli_query($conn,$update_orders);

        $update_pending_orders="Update `orders_pending` set order_status='Complete' where order_id=$order_id";
        $result_orders=mysqli_query($conn,$update_pending_orders);
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>

    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    

</head>
<body class="bg-secondary">
    <div class="container my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="invoice_number" class="text-light">Invoice Number</label>
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo  $invoice_number ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="amount" class="text-light">Amount</label>
                <input type="text" id="amount" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due  ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="payment_type" class="text-light">Payment Method</label>
                <select name="payment_type" class="form-select w-50 m-auto">
                    <option>Select Payment Method</option>
                    <option>Touch n Go</option>
                    <option>PayPal</option>
                    <option>Credit/Debit Card</option>
                    <option>FPX</option>
                    <option>Cash on Delivery</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" value="Confirm" class="bg-info py-2 px-3 border-0" name="confirm_payment">
            </div>
        </form>
    </div>
    
</body>
</html>