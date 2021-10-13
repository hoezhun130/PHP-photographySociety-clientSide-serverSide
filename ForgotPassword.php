<?php
require_once('includes/helper_Han.php');

function emailNEW() {
    global $email;
    if (isset($_POST['submit'])) {
        $email = trim($_POST['email']);
        if (!preg_match('/^[a-zA-Z0-9.-]+@[a-z]{7}.[a-z]{4}.[a-z]{3}.[a-z]{2}$/', $email)) {
            $errorEmail = "<span>Email </span>format is [xxxxxx-wm20@student.tarc.edu.my] ";
            printf("<div class='wrong'>%s</div>", $errorEmail);
        } else {

            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $sql = "SELECT * FROM memberlist WHERE Email = '$email' ";

            if ($result = $con->query($sql)) {
                if ($result->num_rows > 0) {
                    $to = 'tanhz-wm20@student.tarc.edu.my'; //tanchinyung-wm20@student.tarc.edu.my
                    $subject = 'Forgot Password';
                    $message = $email.' forgot the password. Ask for help getting it back.';

                    $return = mail($to, $subject, $message);

                    if ($return) {
                        printf("<div class='true'>Successful to send email</div>");
                    } else {
                        echo "Email unable to send out.";
                    }
                }else{
                    printf("<div class='wrong'>Sorry. No got this email</div>");
                }
            }
        }
    } else {
        $to = '';
        $subject = '';
        $message = '';
    }
}
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
        <title>Forget Password</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
        <style>
            body {
                background-image: url(image/login.jpg);
                    background-size: cover;
            background-position: center;
            background-attachment: fixed; 
            }

            .forgot{
                background-color: #eeeeee;
                color: #505050;
                font-family: "Rubik", Helvetica, Arial, sans-serif;
                font-size: 14px;
                font-weight: normal;
                line-height: 1.5;
            }

            .icon {
                text-indent:2em;
            }

            .detail{
                padding-left:20px;
            }

            #det{
                padding-left:10px;

            }

            .container {
                display: flex;
                margin-bottom: 200px;
                width: 100%;
                justify-content: center;
                align-items: center;
            }

            .wrap {
                background: white;
                width: 40%;
                padding: 15px 20px;
            }

            .title {
                text-align: center;
                font-size: 19px;
            }

            .box {
                margin: 0px 0px 15px;
            }

            #emaiL{
                padding: 5px 8px;
                border-radius: 3px;
                border: 1px solid #353535;
                width: 100%;
            }

            .fsubmit {
                display: flex;
                justify-content: center;
            }

            .fsubmit #submiT {
                padding: 4px 10px;
                border: none;
                border-radius: 2px;
                background: #353535;
                color: white;
                font-weight: 800;
                font-size: 16px;
            }

            .wrong{
                background-color:#ffcccc;
                color:#ad1400 ;
                border:1px solid #ffa8a8;
                padding:5px;
                padding-left: 14px;
                border-top:none;
            }

            .true{
                background-color:#e6ffe6;
                color:#084a08 ;
                border:1px solid #338533;
                padding:5px;
                padding-left: 14px;
                border-top:none;
            }

        </style>
    </head>
    <body>

        <?php
        include('includes/header.php');
        ?> 


        <div class="container">
            <form action="" class="wrap" method="post">
                <div class="forgot">
                    <h3><i class="fa fa-lock fa-4x icon"></i></h3>
                    <h2 class="title">Forgot your password?</h2>
                    <p>Change your password in three easy steps. This will help you to secure your password!</p>
                    <ol class="detail">
                        <li id="det">Enter your email address below.</li>
                        <li id="det">Our system will send you a temporary link</li>
                        <li id="det">Use the link to reset your password</li>
                    </ol>
                </div>
                <div class="box">
                    <input type="email" id="emaiL" name="email" placeholder="Enter Email">
                    <?php emailNEW(); ?>
                </div>
                <div class="fsubmit">
                    <input type="submit" id="submiT" name="submit" value="Send">
                </div>
            </form>
        </div>

        <?php
        include('includes/footer.php');
        ?>