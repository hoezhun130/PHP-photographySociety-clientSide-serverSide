<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'assignment');


function getGenders() {
    return array(
        'M' => 'Male',
        'F' => 'Female'
    );
}

$GENDERS = getGenders();

function Vname($name) {

    if ($name == null) {
        return "Please enter <strong>Student Name</strong>";
    } else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $name)) {
        return "<strong>Student Name</strong> is only can [characters] [space] [@] [,] ['] [-] [/]";
    }
}

function Vgender($gender) {

    if (isset($_POST['user_gender'])) {
        $gender = trim($_POST['user_gender']);
    } else {
        $gender = '';
    }

    if ($gender == null) {
        return '<strong>Gender </strong>cannot empty';
    } else if (!preg_match('/^[MF]$/', $gender)) {
        return '<strong>Gender </strong>can only be [M] [F]';
    }
}

function Vphone($phone, $stuIdI) {

    if ($phone == null) {
        return "Please enter <strong>Phone Number</strong>";
    } else if (!preg_match('/^01\d-\d{7}$/', $phone)) {
        return "<strong>Phone Number </strong>format is: [999-9999999] and starts with [01]";
    } else if (VisPhoneExist($stuIdI, $phone)) {
        return "<strong>Phone Number </strong>already got. Please try another one";
    }
}

function VisPhoneExist($id, $phone) {
    $exist = false;
    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $phone = $con->real_escape_string($phone);
    $id = $con->real_escape_string($id);
    $sql = "SELECT * FROM memberlist WHERE StudentID = '$id'";
    $sql2 = "SELECT * FROM memberlist WHERE Phone = '$phone'";
    $result = $con->query($sql);
    if ($row = $result->fetch_object()) {
        $phoneNumber = $row->Phone;
        
    }

    if ($result = $con->query($sql2)) {
        if ($result->num_rows > 0) {
            $exist = true;
            if ($phone == $phoneNumber) {
                $exist = false;
            }
        }
    }

    $result->free();
    $con->close();

    return $exist;
}

function Vaddress($address) {
    if ($address == null) {
        return "Please enter <strong>Address</strong>";
    }
}

function Vpassword($password) {
        if ($password == null) {
            return "Please enter <strong>Password</strong>";
        } else if (!preg_match('/^\w+$/', $password)) {
            return "<strong>Password </strong> contain only [alphabet] [digit] [underscore]";
        }
}

function Vconfirm($password,$confirm) {
        if ($confirm == null) {
            return "Please enter <strong>Confirm Password</strong>";
        } else if ($confirm != $password) {
            return '<strong>Confirm Password </strong> must match with the password';
        }
}


/*--------------------------------------------------------*/

function LogInAccident() {
    echo "<div class='Ercontainer'>";
    echo "<div class='Erwrap'>";
    echo "<div class='Erforgot'>";
    echo '<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-exclamation-circle-fill error" viewBox="0 0 16 16">';
    echo '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>';
    echo '</svg>';
    echo "<h2 class='Ertitle'>Error</h2>";
    echo "<p>Error Entry This Page</p>";
    echo "<p>You can't access this page until you've logged in. Please click BACK to <span style='color:#0000ab;font-size:17px;'>Log In Page</span>!</p>";

    echo "</div>";

    echo "<div class='fsubmit'>";
    echo '<a href="LogIn.php" class="Erbutton">BACK</a>';
    echo "</div>";

    echo "</div>";
    echo "</div>";
}

function LogInAccident_Member() {
    echo "<div class='Ercontainer'>";
    echo "<div class='Erwrap'>";
    echo "<div class='Erforgot'>";
    echo '<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-exclamation-circle-fill error" viewBox="0 0 16 16">';
    echo '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>';
    echo '</svg>';
    echo "<h2 class='Ertitle'>Error</h2>";
    echo "<p>Error Entry This Page</p>";
    echo "<p>You can't access this page until you've choose one student. Please click Member List to <span style='color:#0000ab;font-size:17px;'>Member List Page</span>!</p>";

    echo "</div>";

    echo "<div class='fsubmit'>";
    echo '<a href="backEnd-member.php" class="Erbutton">Member List</a>';
    echo "</div>";

    echo "</div>";
    echo "</div>";
}

?>

