<?php
require_once('../includes/helper_Han2.php');

$hideForm = false;
$success = 'haha';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $hideForm = false;

    $id = strtoupper(trim($_GET['STid']));

    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $id = $con->real_escape_string($id);
    $sql = "SELECT * FROM memberlist WHERE StudentID = '$id'";

    $result = $con->query($sql);
    if ($row = $result->fetch_object()) {
        $name = $row->Name;

        $gender = $GENDERS[$row->Gender];
        if ($gender == 'Male') {
            $gender = 'M';
        } else if ($gender == 'Female') {
            $gender = 'F';
        }

        $phone = $row->Phone;
        $address = $row->Address;
        $stuId = $row->StudentID;
        $email = $row->Email;
        $password = $row->Password;
    } else {
        $hideForm = true;
    }
} else {

    $name = strtoupper(trim($_POST['user_name']));
    $email = trim($_POST['user_email']);
    $gender = trim($_POST['user_gender']);
    $phone = trim($_POST['user_phone']);
    $stuId = strtoupper(trim($_POST['user_studentId']));
    $address = trim($_POST['user_adds']);
    $password = trim($_POST['user_psw']);
    $confirm = trim($_POST['conf_psw']);

    $error['name'] = Vname($name);
    $error['gender'] = Vgender($gender);
    $error['phone'] = Vphone($phone, $stuId);
    $error['address'] = Vaddress($address);
    $error['password'] = Vpassword($password);
    $error['confirm'] = Vconfirm($password, $confirm);
    $error = array_filter($error);

    if (empty($error)) {
        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = 'UPDATE memberlist SET
                    Name = ?, Gender = ?, Phone = ?, Address = ?, Password = ?
                    WHERE StudentID = ?';

        $stm = $con->prepare($sql);
        $stm->bind_param('ssssss', $name, $gender, $phone, $address, $password, $stuId);

        if ($stm->execute()) {
            $success = 'yes';
        } else {
            echo '
                     <div class="error">
                     Opps. Database issue. Record not inserted.
                     </div>
                     ';
        }
        $stm->close();
        $con->close();
    } else {
        $success = 'no';
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
        <link rel="stylesheet" href="../style.css">
        <title>Edit Page</title>

        <style>
            body {
                background-image:url(../image/background.jpg);  
                background-size:100% 100%; 
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
            
            strong{
                color:#990066;
                font-size:16px;
                
            }
            /*---------------------------------------*/

            .regform{
                width:800px;
                background-color: #04AA6D;
                margin:auto;
                color:white;
                padding:10px 0px 10px 0px ;
                border-radius: 10px;
                text-align:center;
            }  
            .form_box{
                background-color: #f2f2f2;
                border:2px solid black;
                border-radius: 10px;
                width:820px;
                margin:auto;
            }
            td{
                padding: 5px;                        
            }
            button[type=submit] {
                background-color: #04AA6D;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;

            }
            .save {
                text-decoration: none;
                display: inline-block;
                padding: 8px 16px;
                margin-left: 20px;
            }

            .save:hover {
                background-color: #585863;
                color: black;
            }

            .save {
                background-color: #303036;
                color: white;
            }

        </style>
    </head>
    <body>

        <div class="navbar">
            <img src="../image/societyLogo.png" class="logo" with="400px"height="100px"/>
              <ul>
                    <li><a href="backEnd-homepage.php">Home</a></li>
                    <li><a href="backEnd-member.php">Member List</a></li>
                    <li><a href="photographer-insert.php">Edit Photographer</a></li>
                    <li><a href="backEnd-tutorial.php">Tutorial</a></li>
                    <li><a href="createEvent.php">Create Event</a></li>
                </ul>
        </div>

        <?php
        if ($hideForm == true) {
            LogInAccident_Member();
        }
        ?>

        <?php if ($hideForm == false) : ?>
            <div class="form_box">
                <form action="" method="post">
                    <div class="regform"><h2>Edit Member Profile</h2></div>
                    <?php
                    if ($success == 'yes') {
                        echo "<div style='background-color:#e6ffe6;color:#084a08'>";
                        echo "<h1>Successful</h1>";
                        printf('<b>%s</b> is successful edit.', $name);
                        echo "</div>";
                    } else if ($success == 'no') {
                        echo "<div class='Unsuccess'  style='background-color:#ffbfbf;color:#7a1400;' >";
                        echo "<h1>Unsuccessful Edit</h1>";
                        printf('<ul style="color:#7a1400">%s</ul>', implode('<br>', $error));
                        echo "</div>";
                    }
                    ?>
                    <table cellpadding="5" cellspacing="0">
                        <th style="text-align:left;" colspan="2"><h4>1. This is Basic Information</h4></th><br>
                        <tr>
                            <td><label for="name">Student Name :</label></td>
                            <td>
                                <?php
                                printf('<input type="text" name="user_name" id="user_name" value="%s" maxlength="30" required />' . "\n", $name);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="gender">Gender :</label></td>
                            <td>
                                <?php
                                foreach ($GENDERS as $value => $text) {
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
                            <td><label for="phone">Phone :</label></td>
                            <td>
                                <?php
                                printf('<input type="text" name="user_phone" id="Uphone" value="%s" required />' . "\n", $phone);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="address">Address :</label></td>
                            <td>
                                <?php
                                printf('<textarea style="resize:none;width:180px;height:70px;" name="user_adds" id="Uaddress" maxlength="60" required />%s</textarea>' . "\n", $address);
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="address"></label></td>
                        </tr>

                        <th style="text-align:left;" colspan="2"><h4>2. This is School Information</h4><br></th>
                        <tr>
                            <td><label for="id">Student ID :</label></td>
                            <td>
                                <?php
                                echo $stuId;
                                printf('<input type="hidden" name="user_studentId" id="HstudentId" value="%s" />' . "\n", $stuId);
                                ?>

                            </td>
                        </tr>
                        <tr>
                            <td><label for="email">School Email :</label></td>
                            <td>
                                <?php
                                echo $email;
                                printf('<input type="hidden" name="user_email" id="HstudentId" value="%s" />' . "\n", $email);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="password">Password :</label></td>
                            <td>
                                <?php
                                printf('<input type="password" name="user_psw" id="Upassword" value="%s" minlength="6" maxlength="15" required />' . "\n", $password);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="password">Confirm Password :</label></td>
                            <td>
                                <?php
                                printf('<input type="password" name="conf_psw" id="Upassword" value="%s" minlength="6" maxlength="15" required />' . "\n", $password);
                                ?>
                            </td>
                        </tr>
                    </table>
                    <br />
                    <input type="submit" name="submit" value="Update" class="save" />
                    <input type="button" value="Cancel" onclick="location = 'backEnd-member.php'" class="save"/>
                </form>
            </div>
        <?php endif ?>
    </body>
</html>