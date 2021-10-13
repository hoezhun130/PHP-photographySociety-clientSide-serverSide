<?php
require_once("../includes/helper.php");

function detectError() {
    // Use the global variables.
    global $tutorname, $quantity, $fees, $subject, $description;

    // For holding error messages.
    $error = array();



    // Tutorname ///////////////////////////////////////////////////////////////////
    if ($tutorname == null) {
        $error["tutorname"] = 'Please enter <strong>Tutor Name</strong>.';
    } else if (strlen($tutorname) > 30) { // Prevent hacks.
        $error["tutorname"] = '<strong>Tutor Name</strong> must not more than 20 letters.';
    } else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $tutorname)) {
        $error["tutorname"] = 'There are invalid letters in <strong>Tutor Name</strong>.';
    }



    // quantity //////////////////////////////////////////////////////////////////
    if ($quantity == null) {
        $error["quantity"] = 'Please enter <strong>quantity </strong>of the student.';
    } else if (!preg_match('/\d+$/', $quantity)) {
        $error["quantity"] = '<strong>Quantity</strong> can be numbers only.';
    }


    //Fees/////////////////////////////////////////////////////////////////
    if ($fees == null) {
        $error["fees"] = 'Please enter <strong>Tutorial Fees</strong>.';
    } else if (!preg_match('/\d+$/', $fees)) {
        $error["fees"] = '<strong>Tutorial fees</strong> can be numbers only.';
    }


    // subject//////////////////////////////////////////////////////////////////
    if ($subject == null) {
        $error["subject"] = 'Please select a <strong>Subject </strong> you like.';
    }


    //Description////////////////////////////////////////////////////////
    if ($description == null) {
        $error['description'] = 'Please enter <strong>Description</strong>';
    }

    return $error;
}
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            *{
                margin:0;
                padding:0;
            }
            body{
                background-image: url(../image/background.jpg);
                background-position:fixed;
                background-size: cover;
                background-position: center;
                width: 100%;
                height:auto;
                font-family:sans-serif;
            }

            .regform{
                width:760px;
                background-color: #04AA6D;
                margin-top:5px;
                margin-left:15px;
                color:white;
                padding:10px 0px 10px 0px ;
                border-radius: 10px;
                text-align:center;
            }  
            .main{
                background-color: #f2f2f2;
                border:2px solid black;
                border-radius: 10px;
                width:800px;
                margin:auto;
            }

            input[type=text], select,textarea {
                width: 90%;
                padding: 12px;
                border-radius: 4px;
                margin-left:-5px;
                border:2px solid #009688;
            }
            input[type=number] {
                width: 30%;
                padding: 12px;
                border-radius: 4px;
                border:2px solid #009688;
            }

            input[type=file] {
                width: 50%;
                padding: 12px;
                border-radius: 4px;
                border:2px solid #009688;
            }

            label {
                padding: 12px 12px 12px 0;
                display: inline-block;
            }

            input[type=submit] {
                background-color: #04AA6D;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                float:left;
            }

            input[type=submit]:hover {
                background-color: #45a049;
            }


            .col-25 {
                float: left;
                width: 25%;
                margin-top: 6px;
            }

            .col-75 {
                float: left;
                width: 75%;
                margin-top: 6px;
            }

            /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }

           .sidebar {
                margin-top: 550px;
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
    <Body>

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
                
                <div class="sidebar">
                <a class="active" >Table List</a>
                <a href="searchpage.php">Search Engine</a>
                <a href="registrationStudent-list.php">Registration  List</a>
                <a href="adminEventList.php">Event List</a>
                <a href="backEnd-member.php">Member List</a>
                <a href="backEnd-appointment-list.php">Appointment List</a>
                <a href="backEnd-rentalEquipment_1.php">Rental Equipment</a>                
            </div>
            </div>



<?php
$tutorname = '';
$quantity = '';
$fees = '';
$subject = '';
$description = '';

if (isset($_POST['submitted'])) {
// Check for an uploaded file:
    if (isset($_FILES['upload'])) {
        if (move_uploaded_file($_FILES['upload']['tmp_name'],
                        "../uploads/{$_FILES['upload']['name']}")) {

            echo '<p class="info">The image has been uploaded!</p>';
        } else {
            echo '<p class="error">Image upload fails.Please reselect image.</p>';
        }
    } // End of isset($_FILES['upload']) IF.
// Delete the file if it still exists:
    if (file_exists($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name'])) {

        unlink($_FILES['upload']['tmp_name']);
    }
} // End of the submitted conditional.

if (!empty($_POST)) {
    $tutorname = (trim($_POST['tutorname']));
    $quantity = trim($_POST['quantity']);
    $fees = trim($_POST['fees']);


    if (isset($_POST['subject'])) {
        $subject = trim($_POST['subject']);
    } else {
        $subject = '';
    }
    $description = trim($_POST['description']);

    $error = detectError();

    if (empty($error)) {
          $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $sql = '
                        INSERT INTO tutorial (TutorName, Quantity, Fees, Subject ,Description)
                        VALUES (?, ?, ?, ?, ?)
                    ';
        $stm = $con->prepare($sql);
        $stm->bind_param('siiss', $tutorname, $quantity, $fees,$subject, $description);
        $stm->execute();
        if ($stm->affected_rows > 0) {
                      printf('
                        <div class="info">
                        <strong> %s</strong>class  have been create successful.                  
                        </div>',
                $subject);

                    
        }

        
    } else {
        echo '<ul class="error">';
        foreach ($error as $value) {
            echo "<li>$value</li>";
        }
        echo '</ul>';
    }
}
?>

            <div class="main">           
                <form action="backEnd-tutorial.php" method="post"  enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="524288">
                    <div class="regform">
                        <h1>Back-End Editing</h1>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="ename">Tutor Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="tutorname" name="tutorname" placeholder="Tutor Name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="file">Select a file:</label>
                        </div>
                        <div class="col-75">
                            <input type="file" name="upload" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="quantity">Quantity of Student:</label>
                        </div>
                        <div class="col-75">
                            <input type="number" id="quantity" name="quantity" min="1" max="10">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="quantity">Tutorial fees:</label>
                        </div>
                        <div class="col-75">
                            <input type="number" id="fees" name="fees" min="50" max="150">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="subject">Subject</label>
                        </div>
                        <div class="col-75">
                            <select id="subject" name="subject">
                                <option value="">Select a subject</option>
                                <option value="Photography">Photography</option>
                                <option value="video Editing">Video Editing</option>
                                <option value="Photoshop">Photoshop</option>
                                <option value="Advertising">Advertising</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="subject">Description</label>
                        </div>
                        <div class="col-75">
                            <textarea id="subject" name="description" placeholder="Write something.." style="height:200px"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25"></div>
                        <div class="col-75">
                            <input type="submit" name="submit" value="Done">
                            <input type="hidden" name="submitted" value="TRUE">
                        </div>
                    </div>
                </form>





            </div>
        </div>






    </Body>
</html>