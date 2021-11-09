<?php

    session_start();
    $con = mysqli_connect('localhost','root','root');
    mysqli_select_db($con, 'Internat_ehtp');

    $name =$_POST['username'];
    $pass =$_POST['password'];

    $sql = " select * from admin_users where username = '$name' && password='$pass' ";

    $result = mysqli_query($con, $sql);

    $num = mysqli_num_rows($result);

    if($num == 1)
    {
        header("location:http://localhost/Internat_EHTP/Administration/Admin.php");
    }
    else
    {
        header("location:index.php?Invalid=Please Enter correct Username and Password");
    }

?>