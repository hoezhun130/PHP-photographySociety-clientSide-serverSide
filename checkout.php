 <?php
require_once("includes/hoeZhun.php");

function detectError() {
    global $id, $name, $email, $cardHolderName, $month, $year, $cardNum, $cvv;


    $error = array();

    if ($name == null) {
        $error["name"] = 'Please enter <strong>Student Name</strong>.';
    } else if (strlen($name) > 30) { // Prevent hacks.
        $error["name"] = '<strong>Student Name</strong> must not more than 30 letters.';
    } else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $name)) {
        $error["name"] = 'There are invalid letters in <strong>Student Name</strong>.';
    }

    if ($email == null) {
        $error["email"] = 'Please enter <strong>Email Address</strong>.';
    } else if (strlen($email) > 40) { // Prevent hacks.
        $error["email"] = '<strong>Email Address</strong> must not more than 30 characters.';
    } else if (!preg_match('/^[a-zA-Z0-9.-]+@[a-z]{7}.[a-z]{4}.[a-z]{3}.[a-z]{2}$/', $email)) {
        $error["email"] = '<strong>Email Address</strong> is invalid format.Format:xxxxxx-wm20@student.tarc.edu.my';
    }

    if ($id == null) {
        $error["id"] = 'Please enter <strong>Student ID</strong>.';
    } else if (!preg_match('/^\d{2}[A-Z]{3}\d{5}$/', $id)) {
        $error["id"] = '<strong>Student ID</strong> is invalid format. Format: 99XXX99999.';
    }

    if ($cardNum == null) {
        $error["cardNum"] = 'Please enter <strong>Card Number</strong>.';
    } else if (!preg_match('/^\d{4}-\d{4}-\d{4}-\d{4}$/', $cardNum)) {
        $error["cardNum"] = '<strong>Card Number</strong> is invalid format. Format:1111-2222-3333-4444.';
    }

    if ($cardHolderName == null) {
        $error["cardHolderName"] = 'Please enter <strong>Card Holder Name</strong>.';
    } else if (strlen($cardHolderName) > 30) { // Prevent hacks.
        $error["cardHolderName"] = '<strong>Student Name</strong> must not more than 30 letters.';
    } else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $cardHolderName)) {
        $error["cardHolderName"] = 'There are invalid letters in <strong>Card Holder Name</strong>.';
    }

    if ($month == null) {
        $error["month"] = 'Please select a <strong>Expire month</strong>.';
    } else if (!array_key_exists($month, getMonths())) { // Prevent hacks.
        $error["month"] = 'Invalid <strong>Expire Month</strong> code detected.';
    }

    if ($year == null) {
        $error["year"] = 'Please select a <strong>Expire year</strong>.';
    } else if (!array_key_exists($year, getyears())) { // Prevent hacks.
        $error["year"] = 'Invalid <strong>Expire year</strong> code detected.';
    }


    if ($cvv == null) {
        $error["cvv"] = 'Please enter <strong>CVV</strong>.';
    } else if (!preg_match('/^\d{3}$/', $cvv)) {
        $error["cvv"] = '<strong>CVV</strong> is invalid format. Format:999.';
    }

    return $error;
}

function showErrorIcon() {
    echo '<img style="vertical-align: middle" src="images/error.png" alt="Error". />';
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
        <link rel="stylesheet" href="css/checkout.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Checkout</title>
        <style>
                         body {
            background-image: url(image/background.jpg);
                    background-size: cover;
            background-position: center;
            background-attachment: fixed; 
        }
            span.price {
                float: right;
                color: black;
            }

            input[type=password] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
                border: none;
                background-color: #18606e;
                color: white;
            }
            
            .btn{
                text-align: center;
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
        </style>
    </head>
    <body>
        <?php
        require_once("includes/header.php");
        $id = '';
        $name = '';
        $email = '';
        $cardNum = '';
        $cardHolderName = '';
        $month = '';
        $year = '';
        $cvv = '';

        if (!empty($_POST)) {
            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            
            $id = strtoupper(trim($_POST['id']));
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $cardNum = trim($_POST['cardNum']);
            $cardHolderName = trim($_POST['cardHolderName']);
            $month = trim($_POST['month']);
            $year = trim($_POST['year']);
            $cvv = trim($_POST['cvv']);

            $error = detectError();

            if (empty($error)) {
                $sql = '
                        INSERT INTO payment (studId, name, email) 
                        VALUES (?, ?, ?);
                    ';

                $stm = $con->prepare($sql);
                $stm->bind_param('sss', $id, $name, $email);
                $stm->execute();
                if ($stm->affected_rows > 0) {
                    printf('
                            <div class="info">
                        Hi, <strong>%s</strong>, your payment successful.[ <a href="EventList.php">Back to list</a> ]
                        </div>',
                            $name);
                    $id = $name = $email = $cardNum = $cardHolderName = $month = $year = $cvv = null;
                } else {
                    // Something goes wrong.
                    echo '
                            <div class="error">
                            Opps. Database issue. Record not inserted.[ <a href="EventList.php">Back to list</a> ]
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
        
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $title = trim($_GET['title']);
            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $title = $con->real_escape_string($title); // escape those character that sensitive in sql query statement
            $sql = "SELECT * FROM Event WHERE Title = '$title'";

            $result = $con->query($sql);
            if ($row = $result->fetch_object()) {
                $title = $row->Title;
                $price = $row->Price;
            } else {
                echo '
                <div class="error">
                Opps. Record not found.
                [ <a href="EventList.php">Back to list</a> ]
                </div>
                ';
            }

            $result->free();
            $con->close();
        }
        ?>
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <form action="" method="post">
                        <table>
                            <div class="row">
                                <div class="col-50">
                                    <h3>Student Information</h3>
                                    <tr>
                                        <td><label for="name"><i class="fa fa-user"></i>Student Name</label></td>
                                        <td>
                                            <?php htmlInputName('name', $name, 30) ?>
                                        </td>
                                        <td>
                                            <?php if (isset($error['name'])) showErrorIcon() ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><label for="email"><i class="fa fa-envelope"></i> Email Address</label></td>
                                        <td>
                                            <?php htmlInputEmail('email', $email, 30) ?>
                                        </td>
                                        <td>
                                            <?php if (isset($error['email'])) showErrorIcon() ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><label for="adr"><i class="fa fa-address-card-o"></i>Student ID</label></td>
                                        <td>
                                            <?php htmlInputId('id', $id, 10) ?>
                                        </td>
                                        <td>
                                            <?php if (isset($error['id'])) showErrorIcon() ?>
                                        </td>
                                        <td>
                                    </tr>
                                </div>
                                <div class="col-50">
                                    <td><h3>Payment</h3></td>
                                    <tr>
                                        <td><label for="cnnum">Card Number</label></td>
                                        <td>
                                            <?php htmlInputCardNum('cardNum', $cardNum, 19) ?>
                                        </td>
                                        <td>
                                            <?php if (isset($error['cardNum'])) showErrorIcon() ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><label for="cname">Card Holder Name</label></td>
                                        <td>
                                            <?php htmlInputCardHolderName('cardHolderName', $cardHolderName, 30) ?>
                                        </td>
                                        <td>
                                            <?php if (isset($error['cardHolderName'])) showErrorIcon() ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><label for="expmonth">Expire Month</label></td>
                                        <td>
                                            <?php htmlSelectMonths('month', getMonths(), $month) ?>
                                        </td>
                                        <td>
                                            <?php if (isset($error['month'])) showErrorIcon() ?>
                                        </td>
                                    </tr>

                                    <div class="row">
                                        <div class="col-50">
                                            <tr>
                                                <td><label for="expyear">Expire Year</label></td>                                                
                                                <td>
                                                    <?php htmlSelectYears('year', getyears(), $year) ?>
                                                </td>
                                                <td>
                                                    <?php if (isset($error['year'])) showErrorIcon() ?>
                                                </td>
                                        </div>
                                        </tr>
                                        <div class="col-50">
                                            <tr>
                                                <td><label for="cvv">CVV</label></td>
                                                <td>
                                                    <?php htmlInputCvv('cvv', $cvv, 3) ?>
                                                </td>
                                                <td>
                                                    <?php if (isset($error['cvv'])) showErrorIcon() ?>
                                                </td>
                                            </tr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </table>
                        <input type="submit" name="submit" value="Proceed" class="btn"/>
                        <a href="eventList.php"><input value="Cancel" class="btn"/></a>
                    </form>
                </div>
            </div>

            <div class="col-25">
                <div class="container">
                    <h4>Cart
                        <span class="price" style="color:black">
                            <i class="fa fa-shopping-cart"></i>
                            <b>RM</b>
                        </span>
                    </h4>
                    <?php
                    echo'<p>';
                    echo'<a href="eventList.php">';
                    echo $title;
                    echo'</a>';
                    ?>
                    <hr>
                    <?php
                    echo'<p>';
                    echo'Total';
                    echo'<span class="price">';
                    echo'<b>';
                    echo $price;
                    echo'</b>';
                    echo'</span>';
                    echo'</p>';
                    ?>
                </div>
            </div>
        </div>
<?php
require_once("includes/footer.php");
?>

        $(document).ready(function(){
    $('#btn2').click(function(){
            $(ordered).css("background-color", "cyan");
    });    
    
   $("input").focus (function () {
            $(this).css("outline-color", ""#CCCCCC");
        });