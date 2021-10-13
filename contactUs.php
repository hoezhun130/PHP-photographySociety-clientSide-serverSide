<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .footer .footer-content .footer-section .input[type=email],textarea{
    color:black;
    margin-left: 20px;
    line-height:15px;
    padding:10px 86px;
    border:5px solid #009688;
}

.footer input[type=text]{
    color:black;
    margin-left: 20px;
    line-height:10px;
    padding:10px 80px;
    border:5px solid #009688;
}

.footer input[type=email]{
    color:black;
    margin-left: 20px;
    line-height:15px;
    padding:10px 80px;
    border:5px solid #009688;
}
.footer input[type=submit] {
    background-color:#009688;
    color: white;
    padding: 5px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-left:20px;
    display: block;
  }

        </style>
    </head>
    <Body>

<?php

if (isset($_POST['submit']))
{ 
    $UserName=trim($_POST['UName']);
    $Email=trim($_POST['Email']);
    $Subject=trim($_POST['Subject']);
    $Message=$_POST['msg'];

    if(empty($USerName) || empty($Email) || empty($Subject) || empty($Message))
    {
      header('location:index.php?error');
    }
    else{
         $to="tanchinyung@gmail.com";
         
         
         if(mail($to,$subject,$Message,$email)){
             hearder("Location:index.php?success");
          
         }

    }
}
?>


