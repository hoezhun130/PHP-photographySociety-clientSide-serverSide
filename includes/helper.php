<?php

///////////////////////////////////////////////////////////////////////////////
// Database connection details ////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////

// Constants. Please change accordingly.
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'assignment');

///////////////////////////////////////////////////////////////////////////////
// Lookup tables //////////////////////////////////////////////////////////

function getSubject() {
    return array(
        '' => '-- Selected One --',
        'PT' => 'Photography',
        'VE' => 'Video Edting',
        'PS' => 'Photoshop',
        'AT' => ' Advertising',
    );
}

function getChoosen() {
    return array(
        'Y' => 'Yes',
        'N' => 'No'
    );
}





$SUBJECT = getSubject();
$CHOOSEN = getChoosen();


function htmlSelect($name, $items, $selectedValue = '', $default = '')
{
    printf('<select name="%s" id="%s">' . "\n",
           $name, $name);

    if ($default != null)
    {
        printf('<option value="">%s</option>', $default);
    }

    foreach ($items as $value => $text)
    {
        printf('<option value="%s" %s>%s</option>' . "\n",
               $value,
               $value == $selectedValue ? 'selected="selected"' : '',
               $text);
    }
    
    echo "</select>\n";
}

// Print a <input type="text"> element.
function htmlInputText($name, $value = '', $maxlength = '')
{
    printf('<input type="text" name="%s" id="%s" value="%s" maxlength="%s" />' . "\n",
           $name, $name, $value, $maxlength);
}

// Print a <input type="password"> element.
function htmlInputPassword($name, $value = '', $maxlength = '')
{
    printf('<input type="password" name="%s" id="%s" value="%s" maxlength="%s" />' . "\n",
           $name, $name, $value, $maxlength);
}

// Print a <input type="hidden"> element.
function htmlInputHidden($name, $value = '')
{
    printf('<input type="hidden" name="%s" id="%s" value="%s" />' . "\n",
           $name, $name, $value);
}

// Print a group of <input type="radio"> elements.
function htmlRadioList($name, $items, $selectedValue = '', $break = false)
{
    foreach ($items as $value => $text)
    {
        printf('
            <input type="radio" name="%s" id="%s" value="%s" %s />
            <label for="%s">%s</label>' . "\n",
            $name, $value, $value,
            $value == $selectedValue ? 'checked="checked"' : '',
            $value, $text);

        if ($break)
            echo "<br />\n";
    }
}


// Check if Student ID already exist.
// Used by function validateStudentID().
function isStudentIDExist($id)
{
    $exist = false;

    $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $id  = $con->real_escape_string($id);
    $sql = "SELECT * FROM Student WHERE StudentID = '$id'";

    if ($result = $con->query($sql))
    {
        if ($result->num_rows > 0)
        {
            $exist = true;
        }
    }
    
}


?>

<style>

    .error, .info
    {
        padding:10px 0px 10px 0px ;
        margin:auto;
        font-size: 0.9em;
        list-style-position: inside;
        width:800px;
        text-align:center;
        border-radius: 10px;
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