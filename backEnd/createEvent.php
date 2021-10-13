<?php
require_once("../includes/helper2.php");

function detectError() {
    global $title, $day, $month, $price, $des, $ava;

    $error = array();

    if ($day == null) {
        $error["day"] = 'Please select a <strong>Day</strong>.';
    } else if (!array_key_exists($day, getDays())) { // Prevent hacks.
        $error["day"] = 'Invalid <strong>Day</strong> code detected.';
    }

    if ($month == null) {
        $error["month"] = 'Please select a <strong>Expire month</strong>.';
    } else if (!array_key_exists($month, getMonths())) { // Prevent hacks.
        $error["month"] = 'Invalid <strong>Month</strong> code detected.';
    }

    if ($price == null) {
        $error["price"] = 'Please enter <strong>Ticket Price</strong>.';
    } else if (!preg_match('/\d+\.\d\d(?!\d)$/', $price)) {
        $error["price"] = '<strong>Ticket Price</strong> is invalid format. Format:12.34';
    }
    
    if(preg_match('/\d+\.\d\d/', $score)){
        return true;
    }else{
        return false;
    }

    if ($des == null) {
        $error["des"] = 'Please Enter some <strong>Description</strong>.';
    }

    if ($ava == null) {
        $error["ava"] = 'Please enter <strong>Seat Availability</strong>.';
    } else if (!preg_match('/\d+$/', $ava)) {
        $error["ava"] = '<strong>Seat availability</strong> can be numbers only.';
    }


    return $error;
}

function showErrorIcon() {
    echo '<img style=

        "vertical-align: middle" src="../images/error.png" alt="Error". />';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create Event</title>
        <link rel="stylesheet" href="createEvent.css">
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
                text-align: center;
            }

            .error
            {
                border: 2px solid #FBC2C4;
                background-color: #FBE3E4;
                color: #8A1F11;
                text-align: center;
            }

            .info
            {
                border: 2px solid #92CAE4;
                background-color: #D5EDF8;
                color: #205791;
                text-align: center;
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
            
            .sidebar {
                margin: 0;
                padding: 0;
                margin-left:40px;
                width: 200px;
                background-color: #f1f1f1;
                border-radius:8px;
                position: fixed;
                height: 50%;
                overflow: auto;
            }

            .sidebar a {
                display: block;
                color: black;
                padding: 16px;
                text-decoration: none;
            }

            .sidebar a.active {
                background-color: #04AA6D;
                color: white;
            }

            .sidebar a:hover:not(.active) {
                background-color: #555;
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
        
        <div class="sidebar">
                <a class="active" >Table List</a>
                <a href="searchpage.php">Search Engine</a>
                <a href="registrationStudent-list.php">Registration  List</a>
                <a href="adminEventList.php">Event List</a>
                <a href="backEnd-member.php">Member List</a>
                <a href="backEnd-appointment-list.php">Appointment List</a>
                <a href="backEnd-rentalEquipment_1.php">Rental Equipment</a>                 
            </div>
        <?php
        $title = '';
        $day = '';
        $month = '';
        $price = '';
        $des = '';
        $ava = '';

        if (!empty($_POST)) {
            $title = trim($_POST['title']);
            $day = trim($_POST['day']);
            $month = trim($_POST['month']);
            $price = trim($_POST['price']);
            $des = trim($_POST['des']);
            $ava = trim($_POST['ava']);

            $error = detectError();

            if (empty($error)) {
                $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                $sql = '
                        INSERT INTO Event (Title, Day, Month, Price, Description, Seat) 
                        VALUES (?, ?, ?, ?, ?, ?);
                    ';

                $stm = $con->prepare($sql);
                $stm->bind_param('sisdsi', $title, $day, $month, $price, $des, $ava);
                $stm->execute();
                if ($stm->affected_rows > 0) {
                    printf('
                            <div class="info">
                            <strong>%s</strong> has been inserted.
                            [ <a href="adminEventList.php">Back to list</a> ]
                            </div>',
                            $title);
                    $title = $day = $month = $price = $des = $ava = null;
                } else {
                    // Something goes wrong.
                    echo '
                            <div class="error">
                            Opps. Database issue. Record not inserted.
                            </div>
                            ';
                }
                $stm->close();
                $con->close();
            } else {
                echo '<ul class="error">';
                foreach ($error as $value) {
                    echo "<li>$value</li>";
                }
                echo '</ul>';
            }
        }
        ?>

        <?php
        if (isset($_FILES['file'])) {
            //echo "<pre>";
            //print_r($_POST);
            //echo "<br>-----------------<br>";
            //print_r($_FILES);
            //echo "</pre>";
            //die();


            $file = $_FILES['file'];
            $err = '';

            // If there is upload error.
            if ($file['error'] > 0) {
                // Check the error code.
                switch ($file['error']) {
                    case UPLOAD_ERR_NO_FILE: // Code = 4.
                        $err = 'No file was selected.';
                        break;
                    case UPLOAD_ERR_FORM_SIZE: // Code = 2.
                        $err = 'File uploaded is too large. Maximum 1MB allowed.';
                        break;
                    default: // Other codes.
                        $err = 'There was an error while uploading the file.';
                        break;
                }
            } else if ($file['size'] > 1048576) {
                // Check the file size. Prevent hacks.
                // 1MB = 1024KB = 1048576B.
                $err = 'File uploaded is too large. Maximum 1MB allowed.';
            } else {
                // hello.jpg
                // Extract the file extension.
                // Convert to lowercase for easy checking.
                // luigi.png
                // macbook = luigi.PNG ----- windows = luigi.png

                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

                // Check the file extension.
                if ($ext != 'jpg' &&
                        $ext != 'jpeg' &&
                        $ext != 'gif' &&
                        $ext != 'png') {
                    $err = 'Only JPG, GIF and PNG format are allowed.';
                } else {
                    // Everything OK, save the file.
                    // luigi.png
                    // Create an unique ID and use it as file name.
                    $save_as = uniqid() . '.' . $ext;  /// 611b0676e8ad2.png
                    //die();
                    // Save the file.
                    move_uploaded_file($file['tmp_name'], '../uploads/' . $save_as);

                    printf('
                        <div class="info">
                        Image uploaded successfully.
                        It is saved as [ <a href="../image.php?image=%s">%s</a> ].
                        </div>',
                            $save_as, $save_as);
                }
            }

            // Display error message.
            if ($err) {
                echo '<div class="error">' . $err . '</div>';
            }
        }
        ?>
        <div class="form_box">

            <form action="createEvent.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="524288">
                <table>

                    <tr>
                        <td colspan="7">
                            <div class="regform">   <h1>Create Event</h1></div>
                        </td>
                    </tr>

                    <tr>
                        <td><b>Event Title:</b></td>
                        <td>
                            <?php htmlInputTitle('title', $title, 100) ?>
                        </td>
                    </tr>

                    <tr>
                        <td><b>Event Time(Day):</b></td>
                        <td>
                            <?php htmlSelectMonths('day', getDays(), $day) ?>
                        </td>
                        <td>
                            <?php
                            if (isset($error['day']))
                                showErrorIcon()
                                ?>
                        </td>

                    </tr>

                    <tr>
                        <td><b>Event Time(Month):</b></td>
                        <td>
                            <?php htmlSelectMonths('month', getMonths(), $month) ?>
                        </td>
                        <td>
                            <?php
                            if (isset($error['month']))
                                showErrorIcon()
                                ?>
                        </td>

                    </tr>

                    <tr>
                        <td valign="top"><b>Event Image: </b></td>
                        <td><input type="file" name="file" id="file" accept=".gif, .jpg, .jpeg, .png" /></td>
                    </tr>

                    <tr>
                        <td><b>Ticket Price: </b></td>
                        <td>
                            <?php htmlInputPrice('price', $price, 10) ?>
                        </td>
                        <td>
                            <?php
                            if (isset($error['price']))
                                showErrorIcon()
                                ?>
                        </td>
                    </tr>

                    <tr>
                        <td><b>Event Description:</b></td>
                        <td>
                            <?php htmlInputDes('des', $des, 9999) ?>
                        </td>
                        <td>
                            <?php
                            if (isset($error['des']))
                                showErrorIcon()
                                ?>
                        </td>
                    </tr>

                    <tr>
                        <td><b>Event Seat Availability: </b></td>
                        <td>
                            <?php htmlInputAva('ava', $ava, 4) ?>
                        </td>
                        <td>
                            <?php
                            if (isset($error['ava']))
                                showErrorIcon()
                                ?>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td colspan="4"><input type="submit" name="submit" value="Create" class="save"/></td>
                    </tr>
                </table>

            </form>

        </div>
    </body>
</html>
