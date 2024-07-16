



<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead>

        <?php

            $get_payment="Select * from `user_payments`";
            $result=mysqli_query($conn,$get_payment);
            $row=mysqli_num_rows($result);

            

            if($row==0){
                echo "<h2 class='text-center text-danger mt-5'>No Payments Yet</h2>";
            }else{
                echo "<tr>
                    <th class='bg-info'>Sl No</th>
                    <th class='bg-info'>Invoice Number</th>
                    <th class='bg-info'>Amount</th>
                    <th class='bg-info'>Payment Type</th>
                    <th class='bg-info'>Order Date</th>
                    
                </tr>
                </thead>
                <tbody>";
                $number=0;
                while($row_data=mysqli_fetch_assoc($result)){
                    $payment_id=$row_data['payment_id'];
                    $order_id=$row_data['order_id'];
                    $invoice_number=$row_data['invoice_number'];
                    $invoice_number=$row_data['invoice_number'];
                    $amount=$row_data['amount'];
                    $payment_type=$row_data['payment_type'];
                    $date=$row_data['date'];
                    $number++;

                    echo "<tr>
                            <td class='bg-secondary text-light'>$number</td>
                            <td class='bg-secondary text-light'>$invoice_number</td>
                            <td class='bg-secondary text-light'>$amount</td>
                            <td class='bg-secondary text-light'>$payment_type</td>
                            <td class='bg-secondary text-light'>$date</td>
                            
                        </tr>";
                }
            }

        ?>
        
    
        
    </tbody>
</table>