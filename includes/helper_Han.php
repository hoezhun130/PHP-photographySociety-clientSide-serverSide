<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'assignment');

/* ----------------------------------------------Back End-Member List------------------------------------------ */

function getGenders() {
    return array(
        'M' => 'Male',
        'F' => 'Female'
    );
}

$GENDERS = getGenders();

/* ----------------------------------------------Login Done--------------------------------------------------- */

function adminSuccess() {
    echo "<div class='container'>";
    echo "<div class='wrap'>";
    echo "<div class='forgot'>";
    echo '<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">';
    echo '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>';
    echo '</svg>';
    echo "<h2 class='title'>Admin Log In</h2>";
    echo "<p>Login successful!</p>";
    echo "<p>Next, you will enter the <strong>Admin Page</strong>. Please click OK to enter!</p>";

    echo "</div>";

    echo "<div class='fsubmit'>";
    echo '<a href="./backEnd/backEnd-homepage.php" class="button">OK</a>';
    echo "</div>";

    echo "</div>";
    echo "</div>";
}

function userSuccess() {
    echo "<div class='container'>";
    echo "<div class='wrap'>";
    echo "<div class='forgot'>";
    echo '<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">';
    echo '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>';
    echo '</svg>';
    echo "<h2 class='title'>User Log In</h2>";
    echo "<p>Login successful!</p>";
    echo "<p>Next, you will enter the <strong>Home Page</strong>. Please click OK to enter!</p>";

    echo "</div>";

    echo "<div class='fsubmit'>";
    echo '<a href="homepage.php" class="button">OK</a>';
    echo "</div>";

    echo "</div>";
    echo "</div>";
}

function LogInFase() {
    echo "<div class='Uncontainer'>";
    echo "<div class='Unwrap'>";
    echo "<div class='Unforgot'>";
    echo '<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-x-circle-fill wrong" viewBox="0 0 16 16">';
    echo '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>';
    echo '</svg>';
    echo "<h2 class='Untitle'>Log In False</h2>";
    echo "<p>Login Unsuccessful!</p>";
    echo "<p>Due to incorrect email or password, you will go back to <strong>Log In Page</strong>. Please click OK to enter!</p>";

    echo "</div>";

    echo "<div class='fsubmit'>";
    echo '<a href="LogIn.php" class="Unbutton">OK</a>';
    echo "</div>";

    echo "</div>";
    echo "</div>";
}

function LogInAccident() {
    echo "<div class='Ercontainer'>";
    echo "<div class='Erwrap'>";
    echo "<div class='Erforgot'>";
    echo '<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-exclamation-circle-fill error" viewBox="0 0 16 16">';
    echo '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>';
    echo '</svg>';
    echo "<h2 class='Ertitle'>Error</h2>";
    echo "<p>Error Entry This Page</p>";
    echo "<p>You can't access this page until you've logged in. Please click BACK to <strong>Log In Page</strong>!</p>";

    echo "</div>";

    echo "<div class='fsubmit'>";
    echo '<a href="LogIn.php" class="Erbutton">BACK</a>';
    echo "</div>";

    echo "</div>";
    echo "</div>";
}

/* ----------------------------------------------Sign Up--------------------------------------------------- */

$sucessName = 0;
$sucessGender = 0;
$sucessPhoneNew = 0;
$sucessPassword = 0;
$sucessConfirm = 0;
$sucessAddress = 0;

function name() {
    global $name;
    if (isset($_POST['user_name'])) {
        $name = strtoupper(trim($_POST['user_name']));
        if ($name == null) {
            $errorName = "Please enter <strong>Name</strong>";
            printf("<div class='wrong'>%s</div>", $errorName);
        } else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $name)) {
            $errorName = "<strong>Name </strong>is only can [characters] [space] [@] [,] ['] [-] [/]";
            printf("<div class='wrong'>%s</div>", $errorName);
        } else {
            global $sucessName;
            $sucessName = 1;
            return $sucessName;
        }
    }
}

function email() {
    global $email;
    if (isset($_POST['user_email'])) {
        $email = trim($_POST['user_email']);
        if ($email == null) {
            $errorEmail = "Please enter <strong>Email</strong>";
            printf("<div class='wrong'>%s</div>", $errorEmail);
        } else if (!preg_match('/^[a-zA-Z0-9.-]+@[a-z]{7}.[a-z]{4}.[a-z]{3}.[a-z]{2}$/', $email)) {
            $errorEmail = "<strong>Email </strong>format is [xxxxxx-wm20@student.tarc.edu.my] ";
            printf("<div class='wrong'>%s</div>", $errorEmail);
        } else if (isEmailExist($email)) {
            $errorEmail = "<strong>Email </strong>already got. Please try another one ";
            printf("<div class='wrong'>%s</div>", $errorEmail);
        } else {
            global $sucessEmail;
            $sucessEmail = 1;
            return $sucessEmail;
        }
    }
}

function isEmailExist($email) {
    $exist = false;

    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $email = $con->real_escape_string($email);
    $sql = "SELECT * FROM memberlist WHERE Email = '$email'";

    if ($result = $con->query($sql)) {
        if ($result->num_rows > 0) {
            $exist = true;
        }
    }

    $result->free();
    $con->close();

    return $exist;
}

function gender() {
    global $gender;
    if (isset($_POST['user_gender'])) {
        
        $gender = trim($_POST['user_gender']);

        if ($gender == null) {
            $errorGender = '<strong>Gender </strong>cannot empty';
            printf("<div class='wrong'>%s</div>", $errorGender);
        } else if (!preg_match('/^[MF]$/', $gender)) {
            $error['gender'] = '<strong>Gender </strong> can only be [M] [F]';
            printf("<div class='wrong'>%s</div>", $errorGender);
        } else {
            global $sucessGender;
            $sucessGender = 1;
            return $sucessGender;
        }
    } else {
        $gender = '';
    }
}

function phone() {
    global $phone;
    if (isset($_POST['user_phone'])) {
        $phone = trim($_POST['user_phone']);
        if ($phone == null) {
            $errorPhone = "Please enter <strong>Phone Number</strong>";
            printf("<div class='wrong'>%s</div>", $errorPhone);
        } else if (!preg_match('/^01\d-\d{7}$/', $phone)) {
            $errorPhone = "<strong>Phone Number </strong>format is: [999-9999999] and starts with [01]";
            printf("<div class='wrong'>%s</div>", $errorPhone);
        } else if (isPhoneExist($phone)) {
            $errorPhone = "<strong>Phone Number </strong>already got. Please try another one";
            printf("<div class='wrong'>%s</div>", $errorPhone);
        } else {
            global $sucessPhone;
            $sucessPhone = 1;
            return $sucessPhone;
        }
    }
}

function isPhoneExist($phone) {
    $exist = false;

    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $phone = $con->real_escape_string($phone);
    $sql = "SELECT * FROM memberlist WHERE Phone = '$phone'";

    if ($result = $con->query($sql)) {
        if ($result->num_rows > 0) {
            $exist = true;
        }
    }

    $result->free();
    $con->close();

    return $exist;
}

function phoneNew() {
    global $phone;
    if (isset($_POST['user_phone'])) {
        $phone = trim($_POST['user_phone']);
        $stuIdI = strtoupper(trim($_POST['user_studentId']));
        if ($phone == null) {
            $errorPhone = "Please enter <strong>Phone Number</strong>";
            printf("<div class='wrong'>%s</div>", $errorPhone);
        } else if (!preg_match('/^01\d-\d{7}$/', $phone)) {
            $errorPhone = "<strong>Phone Number </strong>format is: [999-9999999] and starts with [01]";
            printf("<div class='wrong'>%s</div>", $errorPhone);
        } else if (isPhoneExistNew($stuIdI, $phone)) {
            $errorPhone = "<strong>Phone Number </strong>already got. Please try another one";
            printf("<div class='wrong'>%s</div>", $errorPhone);
        } else {
            global $sucessPhoneNew;
            $sucessPhoneNew = 1;
            return $sucessPhoneNew;
        }
    }
}

function isPhoneExistNew($id, $phone) {
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

function studentid() {
    global $stuId;

    if (isset($_POST['user_studentId'])) {
        $stuId = strtoupper(trim($_POST['user_studentId']));
        if ($stuId == null) {
            $errorStud = "Please enter <strong>Student ID</strong>";
            printf("<div class='wrong'>%s</div>", $errorStud);
        } else if (!preg_match('/^\d{2}[A-Za-z]{3}\d{5}$/', $stuId)) {
            $errorStud = "<strong>Studetn ID </strong>format is: [99XXX99999]";
            printf("<div class='wrong'>%s</div>", $errorStud);
        } else if (isStudentIDExist($stuId)) {
            $errorStud = "<strong>Studetn ID </strong>already got. Please try another one";
            printf("<div class='wrong'>%s</div>", $errorStud);
        } else {
            global $sucessStudentID;
            $sucessStudentID = 1;
            return $sucessStudentID;
        }
    }
}

function isStudentIDExist($stuId) {
    $exist = false;

    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $stuId = $con->real_escape_string($stuId);
    $sql = "SELECT * FROM memberlist WHERE StudentID = '$stuId'";

    if ($result = $con->query($sql)) {
        if ($result->num_rows > 0) {
            $exist = true;
        }
    }

    $result->free();
    $con->close();

    return $exist;
}

function aDDRESS() {
    global $address;
    if (isset($_POST['user_adds'])) {
        $address = trim($_POST['user_adds']);
        if ($address == null) {
            $errorads = "Please enter <strong>Address</strong>";
            printf("<div class='wrong'>%s</div>", $errorads);
        } else {
            global $sucessAddress;
            $sucessAddress = 1;
            return $sucessAddress;
        }
    }
}

function password() {
    global $password;
    if (isset($_POST['user_psw'])) {
        $password = trim($_POST['user_psw']);
        if ($password == null) {
            $errorPsw = "Please enter <strong>Password</strong>";
            printf("<div class='wrong'>%s</div>", $errorPsw);
        } else if (!preg_match('/^\w+$/', $password)) {
            $errorPsw = "<strong>Password </strong> contain only [alphabet] [digit] [underscore]";
            printf("<div class='wrong'>%s</div>", $errorPsw);

            return $password;
        } else {
            global $sucessPassword;
            $sucessPassword = 1;
            return $sucessPassword;
        }
    }
}

function confirm() {
    global $confirm, $password;
    if (isset($_POST['conf_psw'])) {
        $confirm = trim($_POST['conf_psw']);
        if ($confirm == null) {
            $errorConfirm = "Please enter <strong>Confirm Password</strong>";
            printf("<div class='wrong'>%s</div>", $errorConfirm);
        } else if ($confirm != $password) {
            $errorConfirm = '<strong>Confirm Password </strong> must match with the password';
            printf("<div class='wrong'>%s</div>", $errorConfirm);
        } else {
            global $sucessConfirm;
            $sucessConfirm = 1;
            return $sucessConfirm;
        }
    }
}

function successful() {
    if (isset($_POST['submit'])) {
        $nameS = name();
        $genderS = gender();
        $emailS = email();
        $phoneS = phone();
        $addressS = aDDRESS();
        $studentidS = studentid();
        $passwordS = password();
        $confirmS = confirm();

        $stuIdI = strtoupper(trim($_POST['user_studentId']));
        $nameI = strtoupper(trim($_POST['user_name']));
        $genderI = trim($_POST['user_gender']);
        $phoneI = trim($_POST['user_phone']);
        $addressI = trim($_POST['user_adds']);
        $emailI = strtolower(trim($_POST['user_email']));
        $passwordI = trim($_POST['user_psw']);
        $position = 'Student';

        if ($nameS == 1 && $genderS == 1 && $emailS == 1 && $phoneS == 1 && $studentidS == 1 & $passwordS == 1 && $confirmS == 1 && $addressS == 1) {

            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $sql = 'INSERT INTO memberlist (StudentID, Name, Gender, Phone, Address, Email, Password, Position) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
                   ';
            $stm = $con->prepare($sql);
            $stm->bind_param('ssssssss', $stuIdI, $nameI, $genderI, $phoneI, $addressI, $emailI, $passwordI, $position);
            $stm->execute();

            if ($stm->affected_rows > 0) {
                echo "<div style='background-color:#e6ffe6;color:#084a08'>";
                echo "<h1>Successful</h1>";
                printf('Congratulations!! <strong>%s</strong> is done the sign up.', $nameI);
                echo "</div>";
            } else {
                echo '
                     <div class="error">
                     Opps. Database issue. Record not inserted.
                     </div>
                     ';
            }
            $stm->close();
            $con->close();
        } else {
            echo "<h1 style='background-color:#ffcccc;color:#ad1400'>Unsuccessful</h1>";
        }
    }
}

?>

