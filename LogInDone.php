<?php 

session_start();  

?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Log In Successful</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style>
                     
 body {
            background-image: url(image/login.jpg);
                    background-size: cover;
            background-position: center;
            background-attachment: fixed; 
        }

        .forgot{
            color: #505050;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.5;
        }
        .Unforgot{
            color: #505050;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.5;
        }
        .Erforgot{
            color: #001a33;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.5;
        }

        .detail{
            padding-left:20px;
        }

        #det{
            padding-left:10px;

        }

        .container {
            display: flex;           
            height: 310px;
            width: 100%;
            justify-content: center;
            align-items: center;
            margin-bottom:280px;
        }
        .Uncontainer {
            display: flex;
            height: 310px;
            width: 100%;
            justify-content: center;
            align-items: center;
            margin-bottom:280px;
        }
        .Ercontainer {
            display: flex;
            height: 310px;
            width: 100%;
            justify-content: center;
            align-items: center;
               margin-bottom:280px;
        }

        .container .wrap {
            background-color: #e6ffe6;
            width: 40%;
            padding: 15px 20px;
        }
        .Uncontainer .Unwrap {
            background-color: #f2bfbf;
            width: 40%;
            padding: 15px 20px;
        }
        .Ercontainer .Erwrap {
            background-color: #cccce0;
            width: 40%;
            padding: 15px 20px;
        }

        .title {
            text-align: center;
            font-size: 25px;
            margin-top: 5px;
            color:  #084a08;
        }
        .Untitle {
            text-align: center;
            font-size: 25px;
            margin-top: 5px;
            color:  #661f00;
        }
        .Ertitle {
            text-align: center;
            font-size: 25px;
            margin-top: 5px;
            color:  #001a33;
        }

        .fsubmit {
            display: flex;
            justify-content: center;
        }

        .button  {
            padding: 10px 18px;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            border-radius: 4px;
            background: green;
            text-decoration: none;
            margin-top: 20px;
        }
        .Unbutton  {
            padding: 10px 18px;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            border-radius: 4px;
            background: #801a00;
            text-decoration: none;
            margin-top: 20px;
        }
        .Erbutton  {
            padding: 10px 18px;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            border-radius: 4px;
            background: #001a33;
            text-decoration: none;
            margin-top: 20px;
        }

        .button:hover .button:focus {
            background: red;
        }

        .button:active  {
            background: #0a520a;
        }

        svg {
            margin-left:41%;
            color: #70db70;
        }
        .wrong{
            margin-left:41%;
            color: red;
        }
        .error{
            color: #26267d;
        }

    </style>
    <body>

        <?php
        require_once("includes/header.php");
        require_once('includes/helper_Han.php');


        if (isset($_POST['submit'])) {
            $email = $_POST["logInEmail"];
            $password = $_POST["p"];

            $true = 0;  //not exist
            $wrong = 0;

            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $emailCheck = $con->real_escape_string($email);
            $pswCheck = $con->real_escape_string($password);
            $sql = "SELECT * FROM memberlist WHERE Email = '$emailCheck' AND Password = '$pswCheck'";


            $adminEmail = array("chiayh-wm20@student.tarc.edu.my", "tanchinyung-wm20@student.tarc.edu.my", "leepy-wm20@student.tarc.edu.my", "tanhz-wm20@student.tarc.edu.my");
            $arrlength = count($adminEmail);
            if ($result = $con->query($sql)) {
                if ($result->num_rows > 0) {
                    for ($x = 0; $x < $arrlength; $x++) {
                        if ($adminEmail[$x] == $email) {
                            $true = 1;
                        } else {
                            
                        }
                    }
                } else {
                    $wrong = 1;
                }
            }

            $result->free();
            $con->close();

            if ($true == 1) {
                adminSuccess();
            } else if ($wrong == 1) {
                LogInFase();
            } else {
                $getEmail = trim($_POST["logInEmail"]);
                $getEmail = htmlspecialchars($getEmail);
                
                $_SESSION['UserEmail'] = $getEmail;
                
                userSuccess();
                
            }
        } else {
            echo LogInAccident();
        }

        require_once("includes/footer.php");
        ?>
