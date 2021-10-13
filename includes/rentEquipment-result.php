<?php
function detectInputError() {
    // Use the global variables.
    global $name, $phone, $gender;

    // For holding error messages.
    $error = array();


    // name
    if ($name == null) {
        $error['name'] = 'Nameless? Please enter your <strong>name</strong>.';
    }
    // EXTRA: To prevent hacks.
    else if (strlen($name) > 30) {
        $error['name'] = 'Your <strong>name</strong> is too long. It must be less than 30 characters.';
    } else if (!preg_match('/^[A-Za-z @,\'\.\-\/]+$/', $name)) {
        $error['name'] = 'There are invalid characters in your <strong>name</strong>.';
    }

    // phone
    if ($phone == null) {
        $error['phone'] = 'Please enter your <strong>mobile phone</strong> number.';
    }
    // EXTRA: To prevent hacks.
    else if (!preg_match('/^01\d-\d{7}$/', $phone)) {
        $error['phone'] = 'Your <strong>mobile phone</strong> number is invalid. Format: 999-9999999 and starts with 01.';
    }

    return $error;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <title>Clubs Result</title>
        <link type="text/css" href="css/style.css" rel="stylesheet" />
    </head>
    <body style="font-size: 1.2em">

<?php
if (isset($_POST['submit'])) { // POST with submit button pressed.
    // Trim unwanted whitespaces.
    $gender = trim($_POST['gender']);
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $error = detectInputError();

    if (empty($error)) { // If there is no error.
        printf('
                        <h1>Thank You for Visit Our Website!</h1>
                        <p>
                            <strong style="font-size: larger">%s. %s</strong><br />
                            
                        </p>',
                ($gender == 'M' ? 'Mr' : 'Ms'), $name);
        echo'You have successfully rent the equipment.';
    } else { // If error detected.
        printf('
                        <h1>OOPS... There are input errors</h1>
                        <ul style="color: red"><li>%s</li></ul>
                        <p>[ <a href="javascript:history.back()">Back</a> ]</p>',
                implode('</li><li>', $error));
    }
} else { // GET or hacks.
    // JavaScript to redirect user to the right page.
    echo '
                <script type="text/javascript">
                location = "appointment.php";
                </script>
                ';
}
?>

    </body>
</html>



