<?php
include('config.php');
if(!empty($_POST['user_id']))
{

    $id=$_POST['user_id'];

    
    date_default_timezone_set('Asia/Kolkata');
    $date=date('Y-m-d H:i:s');
    mysqli_query($con,"INSERT INTO apicall (user_id,timestamp) VALUES ('".$id."','".$date."')");        
    
}

