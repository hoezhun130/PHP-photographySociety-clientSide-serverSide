<?php
session_start();
?>

<?php
require_once('includes/helper_Han.php');

if (isset($_SESSION['UserEmail'])) {

    $GetUserEmail = $_SESSION['UserEmail'];

    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $emailCheck = $con->real_escape_string($GetUserEmail);
    $sql = "SELECT * FROM memberlist WHERE Email = '$emailCheck'";

    if ($result = $con->query($sql)) {
        while ($row = $result->fetch_object()) {
            $Mname = $row->Name;
            $Mstatus = "Member of Photography Society";
            $Mgender = $GENDERS[$row->Gender];
            $Mphone = $row->Phone;
            $Maddress = $row->Address;
            $MstuId = $row->StudentID;
            $Memail = $row->Email;
            $Mpassword = "-";
        }
    }
} else {
    $Mname = "-";
    $Mstatus = "-";
    $Mgender = "-";
    $Mphone = "-";
    $Maddress = "-";
    $MstuId = "-";
    $Memail = "-";
    $Mpassword = "-";
    $GetUserEmail = 'haha';
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
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <title>Member Profile</title>
        <style>
            body{
                background-image:url(image/background.jpg);
                background-size: 100% 100%;
            }
                        
            .navbar{
                width:95%;
                margin:auto;
                padding:35px;
                display:flex;
                align-items:center;
                justify-content: space-between;
            }
            .logo{
                width:100px;
                cursor:pointer;
            }

            .navbar ul li{
                list-style:none;
                display:inline-block;
                
                margin:0 20px;
                position: relative;
            }

            .navbar ul li a{
                text-decoration: none;
                font-weight: bold;
                font-size: 18px;
                color:white;
                text-transform: uppercase;
            }

            .navbar ul li a:hover{
                color:#009688;
            }

            .navbar ul li::after{
                content:"";
                height: 5px;
                width:0;
                background:#009688;
                position: absolute;
                left:0;
                bottom:-10px;
                transition: 0.5s;
            }

            .navbar ul li:hover::after{
                width:100%;
            }

            .divbox{            
                display: inline-block;
                width: auto; 
                height: auto;
               margin-left:400px;
               
                border:1px solid #d6d6d6;
                background-color: white;
                font-size: 14px;
                font-weight: normal;
                line-height: 1.5;

            }

            .top{
                border-bottom: solid #e8e8e8;
                background-color:#f2f2f2;
            }

            #head{
                padding-top: 15px;
                margin-bottom: 20px;
                margin-left: 15px;
                width:200px;
                display: inline-block;
            }

            .button{
                float:right;
                text-align: right;
            }

            .middle{
                border-bottom: solid #f5f5f5;
            }



            .picture{
                float:left;
                margin-top: 20px;
                margin-left:65px;
                margin-right:80px;
            }

            .myname{
                float:left;
                margin-top: 25px;
                margin-right:180px;
                font-size:15px;
            }

            #name{
                white-space:nowrap;
                color:#00b1b1;
                text-transform:uppercase;
                font-size:20px;
            }

            #profile-image1 {
                cursor: pointer;
                width: 100px;
                height: 100px;
                border:2px solid #03b1ce;
            }

            .title{ 
                font-size:16px; 
                font-weight:500;
                margin-left: 30px;
                margin-top: 5px;
                margin-bottom: 8px;
                float:left;
                width:270px;
            }

            .user{
                margin-top: 5px;
                margin-bottom: 5px;
                float:left;
            }

            .button  {
                padding: 10px 18px;
                color: #fff;
                font-size: 14px;
                font-weight: bold;
                border-radius: 4px;
                background: #00b1b1;
                margin-right: 25px;
                margin-top: 10px;
            }

            .button:active  {
                background: #24bddb;
            }
            
            .form-control{
    color:black;
    margin-left: 20px;
    line-height:15px;
    padding:10px 86px;
    border:5px solid #009688;
}


.submit {
    background-color:#009688;
    color: white;
    margin-top: 5px;
    padding: 5px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-left:20px;
    display: block;
  }
  

        </style>
    </head>
    <body>
        <?php
        require_once('includes/header.php');
        ?>


        <div class="divbox">
            <div class="top">
                <h4 id="head" >Member Profile</h4>
                <?php
                if ($GetUserEmail == 'haha') {
                    printf('<a href="">
                            <button class="button">Edit</button>
                            </a>');
                } else {
                    printf('<a href="UserEdit.php?Em=%s">
                            <button class="button">Edit</button>
                            </a>', $GetUserEmail);
                }
                ?>
            </div>

            <div class="box-body">

                <div class="picture">

                    <div  align="center"> <img alt="User Pic" src="" id="profile-image1" class="img-circle img-responsive"> 
                        <input id="profile-image-upload" class="hidden" type="file">
                        <div style="color:#999;" ><p>click here to change profile image</p></div>
                    </div><br>

                </div>

                <?php
                printf('<div class="myname"> <h4 id="name" >%s</h4> <p>%s</p> </div>', $Mname, $Mstatus);
                ?>
                <br clear="all"/>

                <div class="middle"></div>
                <br clear="all"/>
                
                <table cellpadding="5" cellspacing="0">
                <tr>
                    <td><label for="name" class="title">Student Name :</label></td>
                    <td>
                        <?php
                        printf('<div style="text-transform:capitalize;" class="user">%s</div>', $Mname);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="gender" class="title">Gender :</label></td>
                    <td>
                        <?php
                        printf('<div class="user" >%s</div>', $Mgender);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="phone" class="title">Phone :</label></td>
                    <td>
                        <?php
                        printf('<div class="user" >%s</div>', $Mphone);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="address" class="title">Address :</label></td>
                    <td>
                        <?php
                        printf('<div class="user" >%s</div>', $Maddress);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="studentId" class="title">Student ID :</label></td>
                    <td>
                        <?php
                        printf('<div class="user" >%s</div>', $MstuId);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="email" class="title">School Email :</label></td>
                    <td>
                        <?php
                        printf('<div class="user" >%s</div>', $Memail);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="password" class="title">Password :</label></td>
                    <td>
                        <?php
                        printf('<div class="user" >%s</div>', $Mpassword);
                        ?>
                    </td>
                </tr>
            </table>
                <br><br><br>
            </div>
            <script>
                $(function () {
                    $('#profile-image1').on('click', function () {
                        $('#profile-image-upload').click();
                    });
                });
            </script> 
        </div>

        <?php require_once("includes/footer.php"); ?>