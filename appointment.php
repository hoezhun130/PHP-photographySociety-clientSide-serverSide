<?php
require_once("includes/appointment-helper.php");

function detectInputError() {
    //Use global variables
    global $appointname, $appointgender, $appointemail, $appointphone, $appointservices, $appointdate, $appointtime, $appointselectgender, $appointselectdate, $appointselecttime, $appointselect;

    //holding error message
    $errorMessage = array();

    //name
    if ($appointname == null) {
        $errorMessage['appointname'] = 'Please enter your <strong>Name</strong>.';
    }
    // EXTRA: To prevent hacks.
    else if (strlen($appointname) > 30) {
        $errorMessage['appointname'] = 'Your <strong>name</strong> is too long. It must be less than 30 characters.';
    } else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $appointname)) {
        $errorMessage['appointname'] = 'There are invalid characters in your <strong>name</strong>.';
    }

    //gender
    if ($appointgender == null) {
        $errorMessage['appointgender'] = 'Please select your <strong>Gender</strong>.';
    }
    // EXTRA: To prevent hacks.
    else if (!preg_match('/^[MF]$/', $appointgender)) {
        $errorMessage['appointgender'] = '<strong>Gender</strong> can only be either M or F.';
    }

    //email
    if ($appointemail == null) {
        $errorMessage["appointemail"] = 'Please enter <strong>Email Address</strong>.';
    } else if (!preg_match('/^[a-zA-Z0-9.-]+@[a-z]{7}.[a-z]{4}.[a-z]{3}.[a-z]{2}$/', $appointemail)) { //prevent hacks
        $errorMessage["appointemail"] = '<strong>Email Address</strong> is invalid format. Format: xxxxxx-wm20@student.tarc.edu.my';
    }

    //phone
    if ($appointphone == null) {
        $errorMessage["appointphone"] = 'Please enter your <strong>Phone Number</strong>.';
    } else if (!preg_match('/^01\d-\d{7}$/', $appointphone)) {
        $errorMessage["appointphone"] = 'Your <strong>Phone</strong> number is invalid. Format: 999-9999999 and starts with 01.';
    }

    //date
    if ($appointdate == null) {
        $errorMessage["appointdate"] = 'Please select the <strong>Date</strong> you want.';
    }

    //time
    if ($appointtime == null) {
        $errorMessage["appointtime"] = 'Please select the <strong>Time</strong> you want.';
    }


    //services
    if ($appointservices == null) {
        $errorMessage["appointservices"] = 'Please select the <strong>Service</strong> you want.';
    }

    return $errorMessage;
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
        <title>Online Booking Appointment</title>
        <style>
            *{
                margin:0;
                padding:0;
                font-family:sans-serif;

            }

            body{
                background-image: url(../image/background.jpg);
                background-size: cover;
                background-position: center;
                width: 100%;
                height:auto;
                font-family:sans-serif;
            }

            .banner{
                width: 100%;
                height:100vh;
                background-image:url(image/background.jpg);
                background-attachment:fixed;
                background-size:cover;
                background-repeat: no-repeat;

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
                font-size: 17px;
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


            .footer{
                background:#303036;
                color:white;
                height:350px;
            }
            .footer .footer-content{
                border: 5px solid white;
                height:350px;
                display: flex;
            }
            .footer .footer-content .footer-section{
                flex:1;
                padding:15px;
            }
            .footer .footer-content .About h1{
                color:white;
            }

            .footer .footer-content .About .contact span{
                display:block;
                font-size:1.1em;
                margin-top:10px;
                font-size:15px;
            }

            .social_menu ul{
                margin-top:55px;
                text-align: center;
                top:0;
            }
            .social_menu ul li{
                display: inline-flex;
                width: 40px;
                height:40px;
                margin:0px 10px;
                margin-left: 20px;
                border-radius: 20%;
                border:1px solid white;
            }
            .social_menu ul li a{
                color:white;
                font-size:30px ;
                line-height:40px;
                margin-left: 10px;
            }

            .social_menu ul li a:hover{
                color:#009688;
            }
            .footer .footer-content .Links ul{
                margin-left: 40px;
            }
            .footer .footer-content .Links ul a{
                display:block;
                margin-bottom:10px;
                font-size:15px;
                font-family:Georgia, 'Times New Roman', Times, serif ;
                color:white;
                text-decoration: none;
                transition:all .3s;
            }
            .footer .footer-content .Links ul a:hover{
                color:#009688;
                margin-left:15px;
                transition:all .3s;
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

            .bookingForm h1{
                text-align: center;
                width:600px;
                background-color: #04AA6D;
                color: rgb(255, 255, 255);
                margin: auto;
                padding:10px 0px 10px 0px;
                border-radius: 10px 10px 0px 0px;
            }
            .content{
                margin-bottom: 300px;
            }
            .form{
                width:600px;
                background-color: #f2f2f2;
                color: rgb(0, 0, 0);
                margin: auto;
            }

            form{
                padding:10px;
            }

            .input label{
                width:100%;
                font-size: 20px;
                font-weight: bold;
            }

            .form .input #name{
                position: relative;
                left:140px;
                border:2px solid rgb(0, 0, 0);
                margin-top:20px;
                border-radius: 10px;
                padding:10px 80px;
            }

            .form .input #M{
                margin-top: 20px;
                margin-left: 120px;
            }

            .form .input #F{
                margin-top: 20px;
                margin-left: 20px;
            }

            .form .input #email{
                position: relative;
                left:142px;
                border:2px solid rgb(0, 0, 0);
                margin-top:20px;
                line-height:19px;
                padding:10px 80px;
                border-radius: 10px;
            }

            .form .input #phone{
                position: relative;
                left:134px;
                border:2px solid rgb(0, 0, 0);
                line-height:19px;
                padding:10px 80px;
                margin-top:20px;
                border-radius: 10px;
            }

            .form .input #date{
                position: relative;
                margin-top:20px;
                line-height:15px;
                border:2px solid rgb(0, 0, 0);
                padding:10px 30px;
                border-radius: 10px;
                left:150px;
            }

            .form .input #time{
                position: relative;
                margin-top:20px;
                line-height:15px;
                border:2px solid rgb(0, 0, 0);
                padding:10px 30px;
                border-radius: 10px;
                left:145px;
            }

            .form .input #services{
                position: relative;
                margin-top:20px;
                line-height:15px;
                border:2px solid rgb(0, 0, 0);
                padding:10px 30px;
                border-radius: 10px;
                left:110px;
            }

            .form #submit{
                position: relative;
                margin-top:30px;
                border:1px solid rgb(0, 0, 0);
                background-color: rgb(255, 255, 255);
                color:rgb(0,0,0);
                left:230px;
                padding: 4px 4px;
                border-radius: 3px;
                cursor: pointer; 
            }

            .form #reset{
                position: relative;
                margin-top:30px;
                border:1px solid rgb(0, 0, 0);
                background-color: rgb(255, 255, 255);
                color:rgb(0,0,0);
                right:200px;
                float:right;
                padding: 4px 4px;
                border-radius: 3px;
                cursor: pointer; 
            }

        </style>
    </head>
    <body>

        <div class="banner">
            <?php
            include('includes/header.php');
            ?> 
            <div class="content">
                <div class="bookingForm"><h1>Appointment Form</h1></div>
                <div class="form">

                    <?php
                    $appointname = '';
                    $appointgender = '';
                    $appointselectgender = '';
                    $appointemail = '';
                    $appointphone = '';
                    $appointdate = '';
                    $appointselectdate = '';
                    $appointtime = '';
                    $appointselecttime = '';
                    $appointservices = '';
                    $appointselect = '';

                    if (!empty($_POST)) {
                        $appointname = trim($_POST['appointname']);

                        if (isset($_POST['appointgender'])) {
                            $appointgender = trim($_POST['appointgender']);
                        } else {
                            $appointselectgender = '';
                        }

                        $appointemail = trim($_POST['appointemail']);

                        $appointphone = trim($_POST['appointphone']);

                        if (isset($_POST['appointdate'])) {
                            $appointdate = trim($_POST['appointdate']);
                        } else {
                            $$appointselectdate = '';
                        }

                        if (isset($_POST['appointtime'])) {
                            $appointtime = trim($_POST['appointtime']);
                        } else {
                            $$appointselecttime = '';
                        }

                        if (isset($_POST['appointservices'])) {
                            $appointservices = trim($_POST['appointservices']);
                        } else {
                            $appointselect = '';
                        }

                        $errorMessage = detectInputError();

                        if (empty($errorMessage)) { // If no error.
                            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                            $sql = '
                        INSERT INTO appointment (Name, Gender, Email, Phone, Date, Time, Service)
                        VALUES (?, ?, ?, ?,?,?,?)
                    ';
                            $stm = $con->prepare($sql);
                            $stm->bind_param('sssssss', $appointname, $appointgender, $appointemail, $appointphone, $appointdate, $appointtime, $appointservices);
                            $stm->execute();
                            if ($stm->affected_rows > 0) {
                                printf('<h1 style="color: rgb(0, 0, 0); text-align: center;">Thanks for visit us!</h1>
                        <p style="color: color:"black"; text-align: center;">
                            <strong style="font-size: larger; color:"black";>%s. %s</strong><br />
                            You have successfully booked a service!
                            </p>',
                                        ($appointgender == 'M' ? 'Mr' : 'Ms'), $appointname);
                            }
                            // reset fields after successfully submitted form
                            $appointname = $appointgender = $appointemail = $appointphone = $appointservices = $appointdate = $appointtime = null;
                        } else {
                            echo '<ul class="errorMsg">';
                            foreach ($errorMessage as $value) {
                                echo "<li>$value</li>";
                            }
                            echo '</ul>';
                        }
                    }
                    
                    ?>
                    <form action="" method="post">

                        <div class="input">
                            <label for="name">Name</label>
                            <input id="name" type="text" name="appointname"><br>
                        </div>

                        <div class="input">
                            <label for="genderM">Gender</label>
                            <input type="radio" name="appointgender" id="M" value="M" />
                            <label for="M">Male</label>
                            <input type="radio" name="appointgender" id="F" value="F" />
                            <label for="F">Female</label>
                        </div>

                        <div class="input">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="appointemail"><br>
                        </div>

                        <div class="input">
                            <label for="phone">Phone</label>
                            <input id="phone" type="tel" name="appointphone"><br>
                        </div>

                        <div class="input">
                            <label for="date">Date</label>
                            <input  id="date" type="date" name="appointdate"><br>
                        </div>

                        <div class="input">
                            <label for="time">Time</label>
                            <input  id="time" type="time" name="appointtime"><br>
                        </div>

                        <div class="input">
                            <label for="services">Services</label>
                            <select  id="services" name="appointservices">
                                <option disabled="disabled" selected="selected">--Select Services--</option>
                                <option>Advertisement Photography</option>
                                <option>Wedding Profile Photography</option>
                                <option>Food and Beverage Photography</option>
                                <option>Individual Photography</option>
                            </select>
                        </div>

                        <input type="submit" name="appointsubmit" id="submit" value="Submit" />
                        <input type="reset" name="appointreset" id="reset" value="Reset" />

                    </form>
                </div>

            </div>
        </div>    
<?php
include('includes/footer.php');
?>
        <!-- JavaScript to place focus (optional) -->
        <script type="text/javascript">
        </script>
    </body>
</html>