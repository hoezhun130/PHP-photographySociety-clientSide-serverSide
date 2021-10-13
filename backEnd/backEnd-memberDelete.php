<?php
require_once('../includes/helper_Han2.php');

$output = 'lala';
$successful = 'no';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id = strtoupper(trim($_GET['STid']));

    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $id = $con->real_escape_string($id);
    $sql = "SELECT * FROM memberlist WHERE StudentID = '$id'";

    $result = $con->query($sql);
    if ($row = $result->fetch_object()) {
        $name = $row->Name;
        $gender = $GENDERS[$row->Gender];
        $phone = $row->Phone;
        $address = $row->Address;
        $stuId = $row->StudentID;
        $email = $row->Email;

        $output = 'haha';
    }

    $result->free();
    $con->close();
} else {
    $name = strtoupper(trim($_POST['user_name']));
    $stuId = strtoupper(trim($_POST['user_studentId']));

    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $sql = 'DELETE FROM memberlist
            WHERE StudentID = ? ';
    $stm = $con->prepare($sql);
    $stm->bind_param('s', $stuId);
    $stm->execute();

    if ($stm->affected_rows > 0) {
        $successful = 'yes';
    } else {
        echo '
                <div class="error">
                Opps. Database issue. Record not deleted.
                </div>
                ';
    }

    $stm->close();
    $con->close();
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
        <title>Delete Page</title>
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
            if ($output == 'haha') {
                echo '<div class="form_box">';
                echo '<div class="regform"><h2>Delete Member</h2></div>';
                printf('
                <h4 style="color:#bf0040;">
                    Are you sure you want to delete the following student?
                </h4>
                <table cellpadding="5" cellspacing="0">
                    <tr>
                        <td>Student Name :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Gender :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Phone :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Address :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Studetn ID :</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>School Email :</td>
                        <td>%s</td>
                    </tr>
                </table>
                <form action="" method="post">
                    <input type="hidden" name="user_studentId" value="%s" />
                    <input type="hidden" name="user_name" value="%s" />
                    <input type="submit" name="yes" value="Yes" class="save" />
                    <input type="button" value="Cancel" class="save"
                           onclick="location=\'backEnd-member.php\'" />
                </form>',
                        $name, $gender, $phone, $address, $stuId, $email,
                        $stuId, $name);
            } else if ($successful == 'yes') {
                echo '<div class="form_box">';
                echo "<h1>Successful Delete</h1>";
                printf('
                <div class="info">
                Student <strong>%s</strong> has been deleted.
                [ <a href="backEnd-member.php">Back to list</a> ]
                </div>', $name);
                
                echo "</div>";
            } else {
                LogInAccident_Member();
            }
            ?>
        </div>



    </body>
</html>
