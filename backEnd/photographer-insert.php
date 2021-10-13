<?php
require_once("../includes/backEnd-appointment-equipment-helper.php");

function detectInputError() {
    //Use global variables
    global $insertname, $insertemail, $insertphone;

    //holding error message
    $errorMsg = array();

    //name
    if ($insertname == null) {
        $errorMsg['insertname'] = 'Please enter <strong>Name</strong>.';
    }
    // EXTRA: To prevent hacks.
    else if (strlen($insertname) > 30) {
        $errorMsg['insertname'] = '<strong>Name</strong> is too long. It must be less than 30 characters.';
    } else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $insertname)) {
        $errorMsg['insertname'] = 'There are invalid characters in <strong>name</strong>.';
    }

    //email
    if ($insertemail == null) {
        $errorMsg["insertemail"] = 'Please enter <strong>Email Address</strong>.';
    } else if (!preg_match('/^[a-zA-Z0-9.-]+@[a-z]{7}.[a-z]{4}.[a-z]{3}.[a-z]{2}$/', $insertemail)) { //prevent hacks
        $errorMsg["insertemail"] = '<strong>Email Address</strong> is invalid format. Format: xxxxxx-wm20@student.tarc.edu.my';
    }

    //phone
    if ($insertphone == null) {
        $errorMsg["insertphone"] = 'Please enter <strong>Phone Number</strong>.';
    } else if (!preg_match('/^01\d-\d{7}$/', $insertphone)) {
        $errorMsg["insertphone"] = '<strong>Phone</strong> number is invalid. Format: 999-9999999 and starts with 01.';
    }

    return $errorMsg;
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin | Manage Photographer</title>
        <link rel="stylesheet" href="../style.css">
        <link href="https://maxcdn.bootstrapcdn.com/">

        <style>
            .insertform{
                width:760px;
                background-color: #04AA6D;
                margin-top:5px;
                margin-left:15px;
                color:white;
                padding:10px 0px 10px 0px ;
                border-radius: 10px;
                text-align:center;
            }        

            form{
                width:800px;
                color: rgb(0, 0, 0);
                margin: auto;
                padding:10px;
                margin-bottom: 30px;
                background-color: #f2f2f2;
                border:2px solid black;
                border-radius: 10px;

            }

            .input label{
                width:100%;
                font-size: 20px;
            }

            form .input #fullname{
                position: relative;
                left:100px;
                border:1px solid rgb(0, 0, 0);
                margin-top:20px;
                padding:10px 80px;
            }

            form .input #photo{
                margin-top: 20px;
                margin-left: 20px;
                position: relative;
                margin-top:20px;
                line-height:15px;
            }

            form .input #email{
                position: relative;
                left:142px;
                border:1px solid rgb(0, 0, 0);
                margin-top:20px;
                line-height:19px;
                padding:10px 80px;
            }

            form .input #phone{
                position: relative;
                left:134px;
                border:1px solid rgb(0, 0, 0);
                line-height:19px;
                padding:10px 80px;
                margin-top:20px;
            }

            form .input #add{
                position: relative;
                margin-top:30px;
                color:rgb(0,0,0);
                right:200px;
                float:right;
                cursor: pointer; 
            }

            .errorMsg{
                color:red;
                margin:auto;
                padding-left: 10px;
            }

            table{
                margin: 20px auto auto auto;
                background-color: #f2f2f2;
            }
            table{
                margin-top: 20px;
                
            }
            th{
                background-color: #04AA6D;
                padding: 10px;
            }
            td{
                text-align: center;
                padding:10px;
            }

        </style>
    </head>

    <body>
        <div class="banner">
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
            $insertname = '';
            $insertemail = '';
            $insertphone = '';

            if (!empty($_POST)) {
                $insertname = trim($_POST['insertname']);

                $insertemail = trim($_POST['insertemail']);

                $insertphone = trim($_POST['insertphone']);

                $errorMsg = detectInputError();

                if (empty($errorMsg)) { // If no error.
                    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                    $sql = '
                        INSERT INTO photographer (Name, Email, Phone)
                        VALUES (?, ?, ?)
                    ';
                    $stm = $con->prepare($sql);
                    $stm->bind_param('sss', $insertname, $insertemail, $insertphone);
                    $stm->execute();
                    if ($stm->affected_rows > 0) {
                        printf('<h1 style="color: rgb(0, 0, 0); text-align: center;">Insert successfully!</h1>');
                    }
                } else {
                    echo '<ul class="errorMsg">';
                    foreach ($errorMsg as $value) {
                        echo "<li>$value</li>";
                    }
                    echo '</ul>';
                }
            }
            
            
            ?>
            <form action=""  method="post">

                <div class="insertform"><h1>Insert Photographer</h1></div>
                
                        <div class="input">
                            <label for="name">Full Name :</label>
                            <input id="fullname" type="text" name="insertname"><br>
                        </div>

                        <div class="input">
                            <label for="email">Email :</label>
                            <input id="email" type="email" name="insertemail"><br>
                        </div>

                        <div class="input">
                            <input type="submit" name="add" id="add" value="ADD">
                        </div>

                        <div class="input">
                            <label for="phone">Phone :</label>
                            <input id="phone" type="tel" name="insertphone"><br>
                        </div>

                        </form>


            <form action=""  method="post">
                        <table border="1" cellspacing="0">
                            <div class="insertform"><h2><p>Photographer List</p></h2></div>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>

                            <?php
                            require_once('../includes/backEnd-appointment-equipment-helper.php');
                            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                            if ($con->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM photographer"; // query
                            $result = $con->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_object()) {
                                    printf('
                        <tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        </tr>
                       ',
                                            $row->Name,
                                            $row->Email,
                                            $row->Phone,
                                    );
                                }
                            }
                            $result->free();
                            $con->close();
                            ?>

                        </table>
            </form>
                    </div>

                    </body>
                    </html>