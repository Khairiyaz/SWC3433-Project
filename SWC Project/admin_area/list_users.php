



<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead>

        <?php

            $get_user="Select * from `user_table`";
            $result=mysqli_query($conn,$get_user);
            $row=mysqli_num_rows($result);

            

            if($row==0){
                echo "<h2 class='text-center text-danger mt-5'>No Users Yet</h2>";
            }else{
                echo "<tr>
                    <th class='bg-info'>Sl No</th>
                    <th class='bg-info'>Username</th>
                    <th class='bg-info'>User Email</th>
                    <th class='bg-info'>User Image</th>
                    <th class='bg-info'>User Address</th>
                    <th class='bg-info'>User Mobile</th>
                    
                </tr>
                </thead>
                <tbody>";
                $number=0;
                while($row_data=mysqli_fetch_assoc($result)){
                    $user_id=$row_data['user_id'];
                    $username=$row_data['username'];
                    $user_email=$row_data['user_email'];
                    $user_image=$row_data['user_image'];
                    $user_address=$row_data['user_address'];
                    $user_mobile=$row_data['user_mobile'];
                    $number++;

                    echo "<tr>
                            <td class='bg-secondary text-light'>$number</td>
                            <td class='bg-secondary text-light'>$username</td>
                            <td class='bg-secondary text-light'>$user_email</td>
                            <td class='bg-secondary text-light'><img src='../user_area/user_images/$user_image'alt='$user_image' class='user_image'></td>
                            <td class='bg-secondary text-light'>$user_address</td>
                            <td class='bg-secondary text-light'>$user_mobile</td>
                            
                        </tr>";
                }
            }

        ?>
        
    
        
    </tbody>
</table>