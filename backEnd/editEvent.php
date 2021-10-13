<!DOCTYPE html>
<?php
$PAGE_TITLE = 'Edit Event';
require_once("../includes/helper2.php");

function validateDay($day) {
    if ($day == null) {
        $error["day"] = 'Please select a <strong>Day</strong>.';
    } else if (!array_key_exists($day, getDays())) { // Prevent hacks.
        $error["day"] = 'Invalid <strong>Day</strong> code detected.';
    }
}

function validateMonth($month) {
    if ($month == null) {
        $error["month"] = 'Please select a <strong>Expire month</strong>.';
    } else if (!array_key_exists($month, getMonths())) { // Prevent hacks.
        $error["month"] = 'Invalid <strong>Month</strong> code detected.';
    }
}

function validatePrice($price) {
    if ($price == null) {
        $error["price"] = 'Please enter <strong>Ticket Price</strong>.';
    } else if (!preg_match('/\d+\.\d\d(?!\d)$/', $price)) {
        $error["price"] = '<strong>Ticket Price</strong> is invalid format. Format:12.34';
    }
}

function validateDes($des) {
    if ($des == null) {
        $error["des"] = 'Please Enter some <strong>Description</strong>.';
    }
}

function validateAva($ava) {
    if ($ava == null) {
        $error["ava"] = 'Please enter <strong>Seat Availability</strong>.';
    } else if (!preg_match('/\d+$/', $ava)) {
        $error["ava"] = '<strong>Seat availability</strong> can be numbers only.';
    }
}

function showErrorIcon() {
    echo '<img style=

        "vertical-align: middle" src="../images/error.png" alt="Error". />';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
        $hideForm = false;

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $title = trim($_GET['title']);
            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $title = $con->real_escape_string($title); // escape those character that sensitive in sql query statement
            $sql = "SELECT * FROM Event WHERE Title = '$title'";

            $result = $con->query($sql);
            if ($row = $result->fetch_object()) {
                $title = $row->Title;
                $day = $row->Day;
                $month = $row->Month;
                $price = $row->Price;
                $des = $row->Description;
                $ava = $row->Seat;
            } else {
                echo '
                <div class="error">
                Opps. Record not found.
                [ <a href="adminEventList.php">Back to list</a> ]
                </div>
                ';

                $hideForm = true; // Flag, "true" to hide the form.
            }

            $result->free();
            $con->close();
        } else {
            $title = trim($_POST['title']);
            $day = trim($_POST['day']);
            $month = trim($_POST['month']);
            $price = trim($_POST['price']);
            $des = trim($_POST['des']);
            $ava = trim($_POST['ava']);

            // Validations:
            // ------------
            // Validation functions are defined at "helper.php".
            // I don't validate StudentID (PK) as it is not being updated.
            // Can check the existence of the StudentID if wanted to.
            $error['day'] = validateDay($day);
            $error['month'] = validateMonth($month);
            $error['price'] = validatePrice($price);
            $error['des'] = validateDes($des);
            $error['ava'] = validateAva($ava);
            $error = array_filter($error);

            if (empty($error)) {
                $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                $sql = '
                UPDATE Event SET
                Day = ?, Month = ?, Price = ?, Description = ?, Seat = ?
                WHERE Title = ?
            ';
                $stm = $con->prepare($sql);
                $stm->bind_param('isdsis', $day, $month, $price, $des, $ava, $title);

                if ($stm->execute()) {
                    printf('
                    <div class="info">
                    <strong>%s</strong> has been updated.
                    [ <a href="adminEventList.php">Back to list</a> ]
                    </div>',
                            $title);
                } else {
                    echo '
                    <div class="error">
                    Opps. Database issue. Record not updated.
                    </div>
                    ';
                }

                $stm->close();
                $con->close();
            } else {
                // Validation failed. Display error message.
                echo '<ul class="error">';
                foreach ($error as $value) {
                    echo "<li>$value</li>";
                }
                echo '</ul>';
            }
        }
        ?>
        <?php if ($hideForm == false) : // Hide or show the form.  ?>
            <div class="form_box">
                <form action="" method="post">
                    <div class="regform"><h2>Edit Event</h2></div>
                    <table>
                        <tr>
                            <td><label for="title">Event Title :</label></td>
                            <td>
                                <?php echo $title ?>
                                <?php htmlInputHidden('title', $title) // Hidden field.  ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="day">Day :</label></td>
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
                            <td><label for="month">Month :</label></td>
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
                            <td><label for="price">Price :</label></td>
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
                            <td><label for="des">Description :</label></td>
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
                            <td><label for="ava">Seat :</label></td>
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
                    </table>
                    <input type="submit" name="update" value="Update" class="save"/>
                    <input type="button" value="Cancel" onclick="location = 'adminEventList.php'" class="save"/>
                </form>
            </div>
        <?php endif ?>
    </body>
</html>
