
<?php
require_once('includes/helper_Han2.php');

$done = 'haha';
$hideForm = false;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    $hideForm = false;
    $email = strtoupper(trim($_GET['Em']));

    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $email = $con->real_escape_string($email);
    $sql = "SELECT * FROM memberlist WHERE Email = '$email'";
    
    $result = $con->query($sql);
        if ($row = $result->fetch_object())
        {
            $name = $row->Name;
            $gender = $GENDERS[$row->Gender];
            if($gender == 'Male'){
                $gender = 'M';
            }else if($gender == 'Female'){
                $gender = 'F';
            }
            
            $phone = $row->Phone;
            $address = $row->Address;
            $stuId = $row->StudentID;
            $email = $row->Email;
            $password = $row->Password;
            $status = "Member of Photography Society";
        }else{
            $hideForm = true;
        }
}else{
    
    $name = strtoupper(trim($_POST['user_name']));
    $email = trim($_POST['user_email']);
    $gender = trim($_POST['user_gender']);
    $phone = trim($_POST['user_phone']);
    $stuId = strtoupper(trim($_POST['user_studentId']));
    $address = trim($_POST['user_adds']);
    $password = trim($_POST['user_psw']);
    $confirm = trim($_POST['conf_psw']);
    $status = "Member of Photography Society";
    
    $error['name'] = Vname($name);
    $error['gender'] = Vgender($gender);
    $error['phone'] = Vphone($phone, $stuId);
    $error['address'] = Vaddress($address);
    $error['password'] = Vpassword($password);
    $error['confirm'] = Vconfirm($password,$confirm);
    $error = array_filter($error);
    
    if (empty($error)){
        
        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = 'UPDATE memberlist SET
                    Name = ?, Gender = ?, Phone = ?, Address = ?, Password = ?
                    WHERE StudentID = ?';
        

        $stm = $con->prepare($sql);
        $stm->bind_param('ssssss', $name, $gender, $phone, $address, $password, $stuId);

        if ($stm->execute()) {
            $done = 'lala';
        } else {
            echo '
                     <div class="error">
                     Opps. Database issue. Record not inserted.
                     </div>
                     ';
        }
        $stm->close();
        $con->close();
        
    }else {
        $done = 'yaya';
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
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
        <title>Member Profile</title>
        <style>
            body{
                background-image:url(image/background.jpg);
                background-size: 100% 100%;
            }

            .divbox{            
                display: inline-block;
                width: auto; 
                height: auto;
                margin-left: 250px;
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
            
            .success{
                background-color:#e6ffe6;
                color:#084a08;
                padding-top:0px;
                margin-top:0px;
                border:1px solid;
                border-color:#99d6ad;
            }
            
            .Unsuccess{
                background-color:#ffcccc;
                color:#ad1400;
                padding-top:0px;
                margin-top:0px;
                border:1px solid;
                border-color:#ff5959;
            }
            /*---------------------------------------*/
            
        .Erforgot{
            color: #001a33;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.5;
        }

        .Ercontainer {
            display: flex;
            height: 310px;
            width: 100%;
            justify-content: center;
            align-items: center;
        }

        .Ercontainer .Erwrap {
            background-color: #cccce0;
            width: 40%;
            padding: 15px 20px;
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

        .button:active  {
            background: #0a520a;
        }

        svg {
            margin-left:41%;
            color: #70db70;
        }
        .error{
            color: #26267d;
        }

        </style>
    </head>
    <body>
        <?php
        require_once('includes/header.php');
        ?>
        
        <?php  if($hideForm == true){
                    LogInAccident();
               }
       ?>
        
        <?php if ($hideForm == false) : ?>
        
        <form action="" method="post">
        <div class="divbox">
            <div class="top">
                <h4 id="head" >Member Profile</h4>
                <input type="submit" name="submit" value="Save" class="button" />
            </div>

            <div class="box-body">
            <?php 
            if($done == 'lala'){
                echo "<div class='success'>";
                echo "<h1 style='text-align:center;margin-top:9px;'>Successful Edit</h1>";
                echo "</div>";
            }else if($done == 'yaya'){
                echo "<div class='Unsuccess'>";
                echo "<h1 style='text-align:center;margin-top:9px;'>Unsuccessful Edit</h1>";
                
                printf(' <ul style="color: red">%s</ul>',implode('<br>',$error));
                echo "</div>";
            }
            ?>

                <div class="picture">

                    <div  align="center"> <img alt="User Pic" src="" id="profile-image1" class="img-circle img-responsive"> 
                        <input id="profile-image-upload" class="hidden" type="file">
                        <div style="color:#999;" ><p>click here to change profile image</p></div>
                    </div><br>

                </div>

                <?php
                printf('<div class="myname"> <h4 id="name" >%s</h4> <p>%s</p> </div>', $name, $status);
                ?>
                <br clear="all"/>

                <div class="middle"></div>
                <br clear="all"/>

                <table cellpadding="5" cellspacing="0">
                    <tr>
                        <td><label for="name" class="title">Student Name :</label></td>
                        <td>
                            <?php
                            printf('<input style="width:400px;text-transform:capitalize;" type="text" name="user_name" id="user_name" value="%s" maxlength="30" required />' . "\n", $name);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="gender" class="title">Gender :</label></td>
                        <td>
                            <?php
                            foreach ($GENDERS as $value => $text)
                        {
                            printf('
                                <input type="radio" name="user_gender" id="%s" value="%s" %s />
                                <label for="%s">%s</label>' . "\n",
                                $value, $value,
                                $value == $gender ? 'checked="checked"' : '',
                                $value, $text);
                        }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="phone" class="title">Phone :</label></td>
                        <td>
                            <?php
                            printf('<input style="width:400px;" type="text" name="user_phone" id="Uphone" value="%s" required />' . "\n", $phone);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="address" class="title">Address :</label></td>
                        <td>
                            <?php
                            printf('<textarea style="resize:none;width:400px;height:40px;" name="user_adds" id="Uaddress" maxlength="60" required />%s</textarea>' . "\n",$address);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="studentId" class="title">Student ID :</label></td>
                        <td>
                            <?php
                            echo $stuId;
                            printf('<input type="hidden" name="user_studentId" id="HstudentId" value="%s" />' . "\n", $stuId);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="email" class="title">School Email :</label></td>
                        <td>
                            <?php
                            echo $email;
                            printf('<input type="hidden" name="user_email" id="HstudentId" value="%s" />' . "\n", $email);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="password" class="title">Password :</label></td>
                        <td>
                            <?php
                            printf('<input style="width:400px;" type="password" name="user_psw" id="Upassword" value="%s" minlength="6" maxlength="15" required />' . "\n", $password);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="Cpassword" class="title">Confirm Password :</label></td>
                        <td>
                            <?php
                            printf('<input style="width:400px;" type="password" name="conf_psw" id="Upassword" value="%s" minlength="6" maxlength="15" required />' . "\n", $password);
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
            </form>
        <?php endif ?>

        <?php require_once("includes/footer.php"); ?>