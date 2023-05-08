<?php
include('config.php');
$data=json_decode(file_get_contents('php://input'));
if((!empty($data->email) || !empty($_POST['email'])) && (!empty($data->password) || !empty($_POST['password'])))
{
    $email=$_POST['email']?$_POST['email']:$data->email;
    $password=$_POST['password']?$_POST['password']:$data->password;
    $password=md5($password);
    $name=$_POST['name']?$_POST['name']:$data->name;

    $query=mysqli_query($con,"SELECT * FROM dbt_user WHERE email='".$email."'");
    if(mysqli_num_rows($query)>0)
    {
        echo json_encode(array('status'=>0,'message'=>'User Already Exits'));
    }
    else
    {
        mysqli_query($con,"INSERT INTO dbt_user (email,password,name) VALUES ('".$email."','".$password."'  ,'".$name."')");        
        echo json_encode(array('status'=>1,'message'=>'Registered Successfully'));
    }
}

