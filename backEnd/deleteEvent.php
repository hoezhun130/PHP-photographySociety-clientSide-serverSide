<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete Event</title>
        <style>
            body{
                width: 100%;
                height:100%;
                background-image:url(../image/background.jpg);
                background-attachment:fixed;
                background-size:100% 100%;
                background-repeat: no-repeat;

            } 
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
            table{
                 border-collapse: collapse;
                     border: 1px solid #f2f2f2;
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
            .error, .info
            {
                padding: 5px;
                margin: 5px;
                font-size: 0.9em;
                list-style-position: inside;
            }

            .error
            {
                border: 2px solid #FBC2C4;
                background-color: #FBE3E4;
                color: #8A1F11;
            }

            .info
            {
                border: 2px solid #92CAE4;
                background-color: #D5EDF8;
                color: #205791;
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
            
                    body{
                width: 100%;
                height:auto;
                background-image:url(../image/background.jpg);
                background-attachment:fixed;
                background-size:100% 100%;
                background-repeat:repeat;

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
                font-size: 20px;
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
        $PAGE_TITLE = 'Delete Event';
        require_once("../includes/helper2.php");
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $title = trim($_GET['title']);

            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $title = $con->real_escape_string($title);
            $sql = "SELECT * FROM event WHERE Title = '$title'";

            $result = $con->query($sql);
            if ($row = $result->fetch_object()) {
                // Record found. Read field values.
                $title = $row->Title;
                $day = $row->Day;
                $month = $row->Month;
                $price = $row->Price;
                $des = $row->Description;
                $ava = $row->Seat;

                printf('
                    <div class="form_box">
                    <div class="regform"><h2> Are you sure you want to delete the following event?</h2></div>
                <table border="1" cellpadding="5" cellspacing="0">
                    <tr>
                        <td>Event Title:</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Day:</td>
                        <td>%d</td>
                    </tr>
                    <tr>
                        <td>Month:</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td>%.2f</td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td>%s</td>
                    </tr>
                    <tr>
                        <td>Seat:</td>
                        <td>%d</td>
                    </tr>
                </table>
                <form action="" method="post">
                    <input type="hidden" name="title" value="%s" />
                    <input type="submit" name="yes" value="Yes" class="save"/>
                    <input type="button" value="Cancel" onclick="location=\'adminEventList.php\'" class="save"/>
                </form>
                 </div>',
                        $title, $day, $month, $price,
                        $des, $ava, $title);
            } else {
                echo '
                <div class="error">
                Opps. Record not found.
                [ <a href="adminEventList.php">Back to list</a> ]
                </div>
                ';
            }

            $result->free();
            $con->close();
            ///////////////////////////////////////////////////////////////////////
        }
        // POST METHOD ////////////////////////////////////////////////////////////
        // --> Update the record.   
        else {
            $title = strtoupper(trim($_POST['title']));

            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // SELECT * FROM
            // INSERT INTO
            // UPDATE TABLE
            // DELETE FROM

            $sql = '
            DELETE FROM event
            WHERE Title = ?
        ';
            $stm = $con->prepare($sql);
            $stm->bind_param('s', $title);
            $stm->execute();

            if ($stm->affected_rows > 0) {
                printf('
                <div class="info">
                <strong>%s</strong> has been deleted.
                [ <a href="adminEventList.php">Back to list</a> ]
                </div>',
                        $title);
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
    </body>
</html>
