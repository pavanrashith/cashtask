<?php
include('config.php');
$data=json_decode(file_get_contents('php://input'));

if((!empty($data->email) || !empty($_POST['email'])) && (!empty($data->password) || !empty($_POST['password'])))
{
    $email=str_replace(' ', '', $_POST['email']);
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"SELECT * FROM dbt_user WHERE email='".$email."' AND password='".$password."'");
    if(mysqli_num_rows($query)>0)
    {
        $row=mysqli_fetch_assoc($query);
        $name=$row['name'];
        $id=$row['id'];
        echo json_encode(array('status'=>1,'message'=>'Login Successfull'));
        session_start();
        $_SESSION['email']=$email;
        $_SESSION['name'] = $name;
        $_SESSION['id'] = $id;
    }
    else
    {
        echo json_encode(array('status'=>0,'message'=>'Invalid Credentials'));
    }
}
else
{
    echo json_encode(array('status'=>0,'message'=>'All feilds required'));
}
