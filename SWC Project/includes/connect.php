<?php

$conn=mysqli_connect('localhost','root','','mystore');
if($conn){
    echo "";
}
else{
    die(mysqli__error($conn));
}


?>