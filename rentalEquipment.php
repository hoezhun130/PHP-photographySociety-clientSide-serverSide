<?php
require_once("includes/equipment-result.php");

function inputError() {
    //Use global variables
    global $rentalname, $rentalgender, $rentalemail, $rentalphone, $rentalservices, $rentaldate, $rentalselectgender, $rentalselectdate, $rentalselect, $rentalequipment, $rentalquantity, $rentalselectquantity;

    //holding error message
    $errors = array();

    //name
    if ($rentalname == null) {
        $errors['rentalname'] = 'Please enter your <strong>Name</strong>.';
    }
    // EXTRA: To prevent hacks.
    else if (strlen($rentalname) > 30) {
        $errorMessage['rentalname'] = 'Your <strong>name</strong> is too long. It must be less than 30 characters.';
    } else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $rentalname)) {
        $errors['rentalname'] = 'There are invalid characters in your <strong>name</strong>.';
    }

    //gender
    if ($rentalgender == null) {
        $errors['rentalgender'] = 'Please select your <strong>Gender</strong>.';
    }
    // EXTRA: To prevent hacks.
    else if (!preg_match('/^[MF]$/', $rentalgender)) {
        $errorMessage['appointgender'] = '<strong>Gender</strong> can only be either M or F.';
    }

    //email
    if ($rentalemail == null) {
        $errors["rentalemail"] = 'Please enter <strong>Email Address</strong>.';
    } else if (!preg_match('/^[a-zA-Z0-9.-]+@[a-z]{7}.[a-z]{4}.[a-z]{3}.[a-z]{2}$/', $rentalemail)) { //prevent hacks
        $errors["rentalemail"] = '<strong>Email Address</strong> is invalid format. Format: xxxxxx-wm20@student.tarc.edu.my';
    }

    //phone
    if ($rentalphone == null) {
        $errors["rentalphone"] = 'Please enter your <strong>Phone Number</strong>.';
    } else if (!preg_match('/^01\d-\d{7}$/', $rentalphone)) {
        $errors["rentalphone"] = 'Your <strong>Phone</strong> number is invalid. Format: 999-9999999 and starts with 01.';
    }

    //date
    if ($rentaldate == null) {
        $errors["rentaldate"] = 'Please select the <strong>Date</strong> you want.';
    }

    if ($rentalequipment == null) {
        $errors["rentalequipment"] = 'You have to select at least one <strong>Equipment</strong>.';
    }
    return $errors;
}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
        <title>Rent Photography Equipment</title>
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




            .rental-form h1{
                text-align: center;
                width:600px;
                background-color: #04AA6D;;
                color: rgb(0, 0, 0);
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
                color: rgb(0 ,0, 0);
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
                left:100px;
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
                margin-top:10px;
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
                margin-top:10px;
                border-radius: 10px;
            }

            .form .input #date{
                position: relative;
                margin-top:10px;
                line-height:15px;
                border:2px solid rgb(0, 0, 0);
                padding:10px 30px;
                border-radius: 10px;
                left:150px;
            }

            .form .input #time{
                position: relative;
                margin-top:10px;
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
                margin-top:10px;
                border:1px solid rgb(0, 0, 0);
                background-color: rgb(255, 255, 255);
                color:rgb(0,0,0);
                left:230px;
                padding: 4px 4px;
                border-radius: 3px;
            }

            .form #reset{
                position: relative;
                margin-top:10px;
                border:1px solid rgb(0, 0, 0);
                background-color: rgb(255, 255, 255);
                color:rgb(0,0,0);
                right:200px;
                float:right;
                padding: 4px 4px;
                border-radius: 3px;
                cursor: pointer; 
            }
            .checkbox #quantity{
                width:120px;
            }

            .errorMsg{
                color:red;
                margin:0px 10px 10px 10px;
                padding-left: 10px;
            }
        </style>
    </head>
    <body>

        <div class="banner">
            <?php
            include('includes/header.php');
            ?> 

            <div class="content">
                <div class="rental-form"><h1>Rental Form</h1></div>
                <div class="form">

                    <?php
                    $rentalname = '';
                    $rentalgender = '';
                    $rentalselectgender = '';
                    $rentalemail = '';
                    $rentalphone = '';
                    $rentaldate = '';
                    $rentalselectdate = '';
                    $rentalequipment = '';
                    $quantity = '';
                    $rentalselectquantity = '';

                    if (!empty($_POST)) {
                        $rentalname = trim($_POST['rentalname']);

                        if (isset($_POST['rentalgender'])) {
                            $rentalgender = trim($_POST['rentalgender']);
                        } else {
                            $rentalselectgender = '';
                        }

                        $rentalemail = trim($_POST['rentalemail']);

                        $rentalphone = trim($_POST['rentalphone']);

                        if (isset($_POST['rentaldate'])) {
                            $rentaldate = trim($_POST['rentaldate']);
                        } else {
                            $rentalselectdate = '';
                        }
                        
                        if (isset($_POST['quantity'])) {
                            $rentalquantity = trim($_POST['quantity']);
                        } else {
                            $rentalselectquantity = '';
                        }

                        //equipment
                        if (isset($_POST['rentalequipment'])) {
                            $rentalequipment = trim($_POST['rentalequipment']);
                        } else {
                            $rentalequipment = '';
                        }

                        $errors = inputError();
                        
                         if (empty($errors)) { // If no error.
                            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                            $sql = '
                        INSERT INTO equipment (Name, Gender, Email, Phone, Date, Equipment, Quantity)
                        VALUES (?, ?, ?, ?,?,?,?)
                    ';
                            $stm = $con->prepare($sql);
                            $stm->bind_param('sssssss', $rentalname, $rentalgender, $rentalemail, $rentalphone, $rentaldate, $rentalequipment, $quantity);
                            $stm->execute();
                            if ($stm->affected_rows > 0) {
                                printf('<h1 style="color: rgb(0, 0, 0); text-align: center;">Thanks for visit us!</h1>
                        <p style="color: "black";text-align: center;">
                            <strong style="font-size: larger; color: "black";">%s. %s</strong><br />
                            You have successfully rent equipment!
                            </p>',
                                        ($rentalgender == 'M' ? 'Mr' : 'Ms'), $rentalname);
                            }
                            // reset fields after successfully submitted form
                            $rentalname = $rentalgender = $rentalemail = $rentalphone = $rentaldate = $rentalequipment = null;
                        } else {
                            echo '<ul class="errorMsg">';
                            foreach ($errors as $value) {
                                echo "<li>$value</li>";
                            }
                            echo '</ul>';
                        }
                    }
                    ?>

                    <form action="" method="post">

                        <div class="input">
                            <label for="name">Full Name</label>
                            <input id="name" type="text" name="rentalname"><br>
                        </div>

                        <div class="input">
                            <label for="genderM">Gender</label>
                            <input type="radio" name="rentalgender" id="M" value="M" />
                            <label for="M">Male</label>
                            <input type="radio" name="rentalgender" id="F" value="F" />
                            <label for="F">Female</label>
                        </div>

                        <div class="input">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="rentalemail"><br>
                        </div>

                        <div class="input">
                            <label for="phone">Phone</label>
                            <input id="phone" type="tel" name="rentalphone"><br>
                        </div>

                        <div class="input">
                            <label for="date">Date</label>
                            <input  id="date" type="date" name="rentaldate"><br>
                        </div>

                        <div valign="top">Equipment to rent :</div>
                        <small>(Multiple selections)</small>

                        <div class="checkbox">
                            <input type="checkbox" name="rentalequipment" id="lighting" value="lighting" />
                            <label for="lighting">Lighting</label>
                            <input type="number" name="quantity" id="quantity" value="quantity" min="1" max="5" placeholder="Select quantity"/><br>

                            <input type="checkbox" name="rentalequipment" id="whitescreen" value="whitescreen" />
                            <label for="whitescreen">White Screen</label>
                            <input type="number" name="quantity" id="quantity" value="quantity" min="1" max="5" placeholder="Select quantity"/><br>

                            <input type="checkbox" name="rentalequipment" id="greenscreen" value="greenscreen" />
                            <label for="greenscreen">Green Screen</label>
                            <input type="number" name="quantity" id="quantity" value="quantity" min="1" max="5" placeholder="Select quantity"/><br>

                            <input type="submit" name="submit" id="submit" value="Submit" />
                            <input type="reset" id="reset" value="Reset" />
                    </form>
                </div>   


            </div>
        </div>

        <?php
         require_once ('includes/footer.php');
        ?>
    </body>
</html>

