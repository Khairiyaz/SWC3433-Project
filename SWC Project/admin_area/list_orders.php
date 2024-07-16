



<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5">
    <thead>

        <?php

            $get_orders="Select * from `user_orders`";
            $result=mysqli_query($conn,$get_orders);
            $row=mysqli_num_rows($result);

            

            if($row==0){
                echo "<h2 class='text-center text-danger mt-5'>No Orders Yet</h2>";
            }else{
                echo "<tr>
                    <th class='bg-info'>Sl No</th>
                    <th class='bg-info'>Due Amount</th>
                    <th class='bg-info'>Invoice Number</th>
                    <th class='bg-info'>Total Products</th>
                    <th class='bg-info'>Order Date</th>
                    <th class='bg-info'>Status</th>
                    
                </tr>
                </thead>
                <tbody>";
                $number=0;
                while($row_data=mysqli_fetch_assoc($result)){
                    $order_id=$row_data['order_id'];
                    $user_id=$row_data['user_id'];
                    $amount_due=$row_data['amount_due'];
                    $invoice_number=$row_data['invoice_number'];
                    $total_products=$row_data['total_products'];
                    $order_date=$row_data['order_date'];
                    $order_status=$row_data['order_status'];
                    $number++;

                    echo "<tr>
                            <td class='bg-secondary text-light'>$number</td>
                            <td class='bg-secondary text-light'>$amount_due</td>
                            <td class='bg-secondary text-light'>$invoice_number</td>
                            <td class='bg-secondary text-light'>$total_products</td>
                            <td class='bg-secondary text-light'>$order_date</td>
                            <td class='bg-secondary text-light'>$order_status</td>
                            
                        </tr>";
                }
            }

        ?>
        
    
        
    </tbody>
</table>